<?php

$config = require_once __DIR__ . "/config.php";

$hostname = $config['hostname'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];


// connection to the database
$connection = new mysqli($hostname, $username, $password, $database);

if($connection->connect_error) {
    die("Database Error: " . $connection->connect_error);
}


