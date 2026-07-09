<?php
// Path to the JSON file
$file = 'coordinates.json';

// Check if file exists
if (!file_exists($file)) {
    die("File not found.");
}

// Read the JSON file
$jsonData = file_get_contents($file);

// Decode JSON data into PHP array
$coordinates = json_decode($jsonData, true);

// Check if decoding was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Failed to decode JSON.");
}

// Reverse the coordinates within each bracket
foreach ($coordinates as &$coordinatePair) {
    if (is_array($coordinatePair) && count($coordinatePair) == 2) {
        // Reverse the latitude and longitude
        $coordinatePair = array_reverse($coordinatePair);
    }
}

// Encode the modified array back to JSON
$modifiedJsonData = json_encode($coordinates, JSON_PRETTY_PRINT);

// Check if encoding was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Failed to encode JSON.");
}

// Save the modified coordinates to a new JSON file
file_put_contents('reversed_within_coordinates.json', $modifiedJsonData);

echo "Coordinates within each bracket reversed and saved to 'reversed_within_coordinates.json'.";
?>