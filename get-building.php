<?php

require_once('config.php'); 

$link = Database();

$id = $_GET['id'] ?? null;
$lang = $_GET['lang'] ?? 'lt';

if (!is_numeric($id)) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid ID"]);
    exit;
}

$table = ($lang === 'en')
    ? 'buildings_en'
    : 'buildings_lt';

$sql = "SELECT buildingName, buildingDescription, buildingAddress, imageSrc, buildingAuthor FROM $table WHERE id = ?";
$stmt = mysqli_prepare($link, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    echo json_encode([
        "buildingName" => $row['buildingName'],
        "buildingDescription" => $row['buildingDescription'],
        "buildingAddress" => $row['buildingAddress'],
        "image" => $row['imageSrc'],
        "buildingAuthor" => $row['buildingAuthor'],
    ]);
} else {
    echo json_encode(["error" => "Not found"]);
}

mysqli_stmt_close($stmt);
