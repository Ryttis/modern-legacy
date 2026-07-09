<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'modernis');
define('DB_PASSWORD', 'jMtES6YajGFs');
define('DB_NAME', 'modernis');

define('SESSION_ID', 'KAUNOSALEPGPGP');

function Database() {
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($link === false) {
        //die("[KLAIDA] MySQL Prisijungti negalėjo - " . mysqli_connect_error());
        die("[KLAIDA] MySQL Prisijungti negalėjo.");
    }
    return $link;
}
