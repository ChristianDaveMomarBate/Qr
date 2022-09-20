<?php
$username = "root"; 
$password = "";
$hostname = "localhost";
$databasename = 'qr_code'; 
 
$connecDB = mysqli_connect($hostname, $username, $password, $databasename)or die('Could not connect to the database');
?>