document.addEventListener('DOMContentLoaded', () => {
    const chatMessages = document.getElementById('chatMessages');
    const messageInput = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');
    const locationButton = document.getElementById('locationButton');
    const poiSearchButton = document.getElementById('poiSearchButton');
  
    // Function to add messages to the chat
    function addMessage(message, type = 'sent') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}`;
        messageDiv.textContent = message;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
  
    // Event listener for the send button
    sendButton.addEventListener('click', () => {
        const message = messageInput.value.trim();
        if (message) {
            addMessage(message, 'sent');
            messageInput.value = '';
        }
    });
  
    // JANGAN UBAH APAPUN DISINI
    // Mengambil lokasi dari server
    locationButton.addEventListener('click', async () => {
        try {
            const response = await fetch('http://localhost/finalprojek/restful/server.php');
            const data = await response.json();
  
            if (data.status === 'success' && data.data.length > 0) {
                const locationDetails = data.data[0];
  
                // Pesan lokasi
                const locationMessage = `📍 ${locationDetails.nama_lokasi} - (${locationDetails.latitude}, ${locationDetails.longitude})`;
  
                // Tambahkan pesan lokasi ke chat
                addMessage(locationMessage, 'sent');
  
                // Tambahkan teks "Lokasi berhasil terkirim" sebagai elemen baru
                const successMessage = document.createElement('div');
                successMessage.className = 'success-message'; // Tambahkan class CSS untuk styling jika diperlukan
                successMessage.textContent = 'Lokasi berhasil terkirim';
                chatMessages.appendChild(successMessage);
            } else {
                alert('No location data available');
            }
        } catch (error) {
            console.error('Error fetching data from RESTful server:', error);
            alert('Failed to fetch location');
        }
    });
    // SAMPAI SINI JANGAN DIUBAH
  
    // Event listener for the POI search button
    poiSearchButton.addEventListener('click', async () => {
        try {
            // Fetch POI data from server
            const response = await fetch('http://localhost/finalprojek/restful/server.php');
            const data = await response.json();
  
            // Check if data is available
            if (data) {
                // Create a formatted message for each POI
                const poiMessage = 
                `🏞️ Informasi Wisata:
                Nama: ${data.nama}
                Deskripsi: ${data.deskripsi}
                Kategori: ${data.kategori}
                Rating: ${data.rating}
                Waktu Buka: ${data.waktu_buka}
                Kontak: ${data.kontak}`;
  
                // Add POI message to chat
                addMessage(poiMessage, 'received');
            } else {
                addMessage('Tidak ada data wisata yang ditemukan.', 'system');
            }
        } catch (error) {
            console.error('Error fetching POI data:', error);
            addMessage('Gagal mengambil data wisata.', 'system');
        }
    });
  
    // Event listener for pressing 'Enter' in the message input
    messageInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendButton.click();
        }
    });
  });