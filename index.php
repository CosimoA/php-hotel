<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Hotel</title>
    <!-- BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
            margin-top: 20px;
        }

        table {
            border-radius: 10px;
            padding-bottom: 20px;
            overflow: hidden;
        }

        tr:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <?php
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    // Filtri
    $parkingFilter = isset($_GET['parking']) ? $_GET['parking'] : null;
    $voteFilter = isset($_GET['vote']) ? $_GET['vote'] : null;
    ?>

    <!-- foreach ($hotels as $hotel) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;'>";
            echo "<h2>{$hotel['name']}</h2>";
            echo "<p><strong>Description:</strong> {$hotel['description']}</p>";      
            echo "<p><strong>Parking:</strong> " . ($hotel['parking'] ? 'Yes' : 'No') . "</p>";
            echo "<p><strong>Vote:</strong> {$hotel['vote']}</p>";
            echo "<p><strong>Distance to Center:</strong> {$hotel['distance_to_center']} km</p>";
            echo "</div>"; 
        }  -->

    <!-- Form per i filtri -->
    <div class="container mt-3">
        <form method="get" action="">
            <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="parking">Parcheggio</label>
                    <select id="parking" name="parking" class="form-control">
                        <option value="">Qualsiasi</option>
                        <option value="1" <?php if ($parkingFilter === 1) echo 'selected'; ?>>Con parcheggio</option>
                        <option value="0" <?php if ($parkingFilter === 0) echo 'selected'; ?>>Senza parcheggio</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="vote">Voto</label>
                    <select id="vote" name="vote" class="form-control">
                        <option value="">Qualsiasi</option>
                        <option value="1">1 stella</option>
                        <option value="2">2 stelle</option>
                        <option value="3">3 stelle</option>
                        <option value="4">4 stelle</option>
                        <option value="5">5 stelle</option>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary mt-4">Filtra</button>
                </div>

            </div>
        </form>
    </div>

    <?php


    // Filtra gli hotel in base ai criteri specificati
    $filteredHotels = array_filter($hotels, function ($hotel) use ($parkingFilter, $voteFilter) {
        // Filtra per parcheggio
        if ($parkingFilter !== "" && $hotel['parking'] != $parkingFilter) {
            return false; // Non corrisponde al filtro parcheggio
        }

        // Filtra per voto
        if ($voteFilter !== "" && $hotel['vote'] != $voteFilter) {
            return false; // Non corrisponde al filtro voto
        }

        return true; // Passa tutti i filtri
    });

    ?>

    <div class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($filteredHotels as $hotel) {
                    echo "<tr>";
                    echo "<td>$hotel[name]</td>";
                    echo "<td>$hotel[description]</td>";
                    echo "<td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>$hotel[vote]</td>";
                    echo "<td>$hotel[distance_to_center] km</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>