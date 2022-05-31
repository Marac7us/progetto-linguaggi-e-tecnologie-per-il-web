<?php
session_start();
require_once('database.php');
$email = $_POST['email'];
$password = $_POST['password'];
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db) or die( "Unable to connect");
$mysqli->select_db($db) or die( "Unable to select database");
mysqli_set_charset($mysqli,"utf8");
$password = md5($password);
$query="SELECT username FROM utenti WHERE email = '$email' AND password = '$password'";
$result = $mysqli->query($query) or die( "Unable to query");
$num = mysqli_num_rows($result);
$logdb = mysqli_fetch_row($result);
$mysqli->close();
$username = "SELECT username FROM utenti WHERE email = '$email' AND password = '$password'";

if ($num < 1) {
$erroreNonEsiste = "1";
echo 'email o password non validi'; 
} else {
    setcookie("username", $username);
    echo "Benvenuto", $username;
}
echo "<hr><a href='../home/home con login.html'> <button> vai alla home </button></a>";


