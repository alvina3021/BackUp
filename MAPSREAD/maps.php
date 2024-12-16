<!DOCTYPE html>
<html>
<head>
    <title>POI Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body> 
<div class="input-group mt-3 mb-3">
    <form action="read.php" method="get">
    <input type="text" name="search" class="form-control" placeholder="Cari lokasi atau POI..." aria-label="Cari lokasi atau POI" aria-describedby="button-addon2" id="messageInput">
    <div class="input-group-append">
        <button class="btn btn-primary" type="submit" id="poiSearchButton">Cari</button>
    </div>
    </form>
</div>
        <div class="row">
            <div class="col-12">
                <div id="mapid" style="height: 600px;"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Data Tabel</h2>
        <table>
            <thead>
                <tr>
                    <?php
                    // If $data is not empty, generate table headers from the keys of the first row
                    if (!empty($data)) {
                        foreach ($data[0] as $key => $value) {
                            echo "<th>" . htmlspecialchars($key) . "</th>";
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the data and generate a table row for each entry
                foreach ($data as $row) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
