<?php

require_once('../functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selectedCancel = explode(',', $_POST['selectedCancel']);

    $link = Database();

    foreach ($selectedCancel as $timeSpot) {
        list($token) = explode(',', $timeSpot);

        $stmt = $link->prepare("DELETE FROM reservations WHERE `token` = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: ../index.php");
}

?>