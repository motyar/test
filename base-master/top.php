<?php
// Show only errors, ignore notices and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    ini_set('display_errors', 1);

// Databse connection
    global $db;
    $db = new db($host, $database, $user, $password);
    $db->connect();

// Cleanig data for mysql
    $_REQUEST = array_map([$db->res, 'real_escape_string'], $_REQUEST);
    extract($_REQUEST);
