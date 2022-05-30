<?php

$dbhost ="localhost:3306";
$dbuser = "user";
$dbpass= "admin";
$db = "trialbio";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die("Impossibile connettersi al server: %s\n". $conn -> error);