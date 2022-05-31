<?php
require_once('database.php');
$username = $_POST['username'];
$email = $_POST['email'];
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db) or die( "Unable to connect");
$mysqli->select_db($db) or die( "Unable to select database");
mysqli_set_charset($mysqli,"utf8");
$query="SELECT password FROM utenti WHERE username = '$username' AND email = '$email'";
$result = $mysqli->query($query) or die( "Unable to query");
$num = mysqli_num_rows($result);
$logdb = mysqli_fetch_row($result);
$mysqli->close();

if ($num < 1) {
$erroreNonEsiste = "1";
echo 'email ed username inesistenti'; 
} else {
    
}
echo "<hr><a href='../home/home con login.html'> <button> Esegui il logoni </button></a>";
