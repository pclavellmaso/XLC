  
<?php

<<<<<<< HEAD
$serverName = 'database';
$userName = 'root';
$password = 'tiger';
$dbName = 'docker';

//create connection
$bd = new mysqli($serverName, $userName, $password, $dbName);
=======
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

>>>>>>> ddf965dee9cbc1b13c879ea540283072a2481f18
$bd->set_charset("utf8");


if (mysqli_connect_errno()) {
    echo 'Failed to connect!';
    exit();
}

?>