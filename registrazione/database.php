<?php

$dbhost ="localhost:3306";
$dbuser = "root";
$dbpass= "0000";
$db = "utenti";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die("Impossibile connettersi al server: %s\n". $conn -> error);