<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('config.php');

$link = Database();

$sqlFile = __DIR__ . '/buildings_en_from_docx_address_fixed_br.sql';

$sql = file_get_contents($sqlFile);

if ($sql === false) {
    die('Cannot read SQL file');
}

if ($link->multi_query($sql)) {

    do {
        if ($result = $link->store_result()) {
            $result->free();
        }
    } while ($link->more_results() && $link->next_result());

    echo "Import completed successfully";
} else {
    echo "Import error: " . $link->error;
}
