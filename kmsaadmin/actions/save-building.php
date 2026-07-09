<?php

require_once('../functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = Database();

    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $address = $_POST['address'] ?? '';
    $author = $_POST['author'] ?? '';
    $latitude = $_POST['latitude'] ?? '';
    $longitude = $_POST['longitude'] ?? '';
    $imageUrl = ''; 

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../ehl-pastatai/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileTmp = $_FILES['image']['tmp_name'];
        $fileName = basename($_FILES['image']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $safeName = uniqid() . '.' . strtolower($fileExt);
        $destination = $uploadDir . $safeName;

        if (move_uploaded_file($fileTmp, $destination)) {
            $imageUrl = $destination;
        } else {
            die("Error moving uploaded file.");
        }
    } else {
        die("Image upload failed.");
    }

    $stmt = $link->prepare("INSERT INTO `buildings_en` (`buildingName`, `buildingAuthor`, `buildingDescription`, `buildingAddress`, `imageSrc`, `latitude`,`longitude`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $author, $description, $address, $imageUrl, $latitude, $longitude);

    if ($stmt->execute()) {
        echo "Pridėta.";
        header("Location: ../buildings.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
$stmt->close();
$link->close();