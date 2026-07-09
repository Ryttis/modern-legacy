<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION)) {
    @session_start();
}

require_once "config.php";

function userLogged() {    
    if(isset($_SESSION[SESSION_ID]["loggedin"]) && $_SESSION[SESSION_ID]["loggedin"] === true) {
        return true;
    }
    return false;
}

function getLoginError($errorId) {
    $login_errors = array(
        "Neįvestas vartotojo vardas.",
        "Neįvestas slaptažodis.",
        "Neteisingi prisijungimo duomenys.",
        "Nepavyko prisijungti prie LDAP, kreiptis į administratorių.",
        "Jūsų paskyra neaktyvi."
    );

    if(isset($login_errors[$errorId])) {
        return $login_errors[$errorId];
    } else {
        return 'Įvyko prisijungimo klaida.';
    }
}

function getReserveError($errorId) {
    $reserve_errors = array(
        "Pasirinktu laiku jau esate užsirezervavęs kitą vietą.",
        "Ši vieta jau užimta.",
    );

    if(isset($reserve_errors[$errorId])) {
        return $reserve_errors[$errorId];
    } else {
        return 'Įvyko rezervacijos klaida.';
    }
}

function getUserInfo($username, $key) {
    $userInfo = unserialize(file_get_contents(dirname(dirname(__DIR__)) . "/bendri/struktura/vartotojai_pagal_padalini.txt"));
	// $userInfo = unserialize(file_get_contents("https://mes.kaunas.lt/it-pagalba/content.txt"));
    $newInfo = array_reduce($userInfo, 'array_merge', array());

    if(strlen($newInfo[$username][$key]) > 1)
        return $newInfo[$username][$key];
}