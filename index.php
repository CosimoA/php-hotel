<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Hotel</title>
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

foreach ($hotels as $hotel) {
    echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;'>";
    echo "<h2>{$hotel['name']}</h2>";
    echo "<p><strong>Description:</strong> {$hotel['description']}</p>";
    echo "<p><strong>Parking:</strong> " . ($hotel['parking'] ? 'Yes' : 'No') . "</p>";
    echo "<p><strong>Vote:</strong> {$hotel['vote']}</p>";
    echo "<p><strong>Distance to Center:</strong> {$hotel['distance_to_center']} km</p>";
    echo "</div>";
}
?>

</body>
</html>