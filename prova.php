<!DOCTYPE html>
<html>
<head>
	<title>prova</title>
	<link rel="stylesheet" type="text/css" href="gen-style.css">
	<meta charset="utf-8">
</head>
<body>
<?php

$dbhost ="localhost:3306";
$dbuser = "user";
$dbpass= "admin";
$db = "trialbio";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);

$sql= 'SELECT * FROM prodotto';
$retval = mysqli_query($conn, $sql);

if(! $retval ) {
	die('Could not get data: ' . mysqli_error());
 }
  while($row= mysqli_fetch_array($retval)){
	echo " id :{$row['idprodotto']} <br>";
    echo "<img src='data:image/jpg;base64,".base64_encode($row['immmagine'])."'/>";}


?>
</body>
</html>