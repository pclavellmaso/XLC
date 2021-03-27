<?php

$serverName = 'localhost';
$userName = 'root';
$password = 'surrounD1';
$dbName = 'XLC';

//create connection
$bd = new mysqli($serverName, $userName, $password, $dbName);

if (mysqli_connect_errno()) {
    echo 'Failed to connect!';
    exit();
}

?>