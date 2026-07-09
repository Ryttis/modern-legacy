<?php

require_once('../functions.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $link = Database();

    $id = intval($_POST['id']);
    $name = $_POST['name'] ?? '';
    $author = $_POST['author'] ?? '';
    $description = $_POST['description'] ?? '';
    $address = $_POST['address'] ?? '';
    $latitude = $_POST['latitude'] ?? '';
    $longitude = $_POST['longitude'] ?? '';
    $imageUrl = ''; 

    $result = $link->query("SELECT imageSrc FROM `buildings_lt` WHERE id = $id");
    $existing = $result->fetch_assoc();
    $currentImage = $existing['imageSrc'] ?? '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../ehl-pastatai/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileTmp = $_FILES['image']['tmp_name'];
        $fileExt = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $newFileName = uniqid() . '.' . $fileExt;
        $destination = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmp, $destination)) {
            $imageUrl = $destination;
        } else {
            die("Klaida su nuotrauka.");
        }
    } else {
        $imageUrl = $currentImage; 
    }

    $stmt = $link->prepare("UPDATE `buildings_en` SET buildingName=?, buildingAuthor=?, buildingAddress=?, buildingDescription=?, imageSrc=?, latitude=?, longitude=? WHERE id=?");
    $stmt->bind_param("sssssssi", $name, $author, $address, $description, $imageUrl, $latitude, $longitude, $id);

    if ($stmt->execute()) {
        echo "Sėkmingai atnaujinta.";
        header("Location: ../buildings.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$link->close();