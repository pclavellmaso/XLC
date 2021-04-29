<?php

$serverName = 'database';
$userName = 'root';
$password = 'tiger';
$dbName = 'docker';

//create connection
$bd = new mysqli($serverName, $userName, $password, $dbName);

if (mysqli_connect_errno()) {
    echo 'Failed to connect!';
    exit();
}

?>