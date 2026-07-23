<?php

require_once __DIR__ . '/../includes/env.php';

define('DB_SERVER', env_required('DB_HOST'));
define('DB_USERNAME', env_required('DB_USER'));
define('DB_PASSWORD', env_required('DB_PASSWORD'));
define('DB_NAME', env_required('DB_NAME'));

define('SESSION_ID', 'KAUNOSALEPGPGP');

function Database() {
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($link === false) {
        //die("[KLAIDA] MySQL Prisijungti negalėjo - " . mysqli_connect_error());
        die("[KLAIDA] MySQL Prisijungti negalėjo.");
    }
    return $link;
}
