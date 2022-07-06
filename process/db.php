<?php
/* Database credentials. Assuming we are running MySQL
server with default setting (user 'root' with no password) */
$SERVER = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DB_NAME = "eresource";
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DB_NAME);
 
// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>

