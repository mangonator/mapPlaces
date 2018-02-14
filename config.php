<?php
/* Database credentials. Pls don't abuse */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mikaeljm_admin');
define('DB_PASSWORD', 'XH{2x1qjjn9r');
define('DB_NAME', 'mikaeljm_places_db');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>