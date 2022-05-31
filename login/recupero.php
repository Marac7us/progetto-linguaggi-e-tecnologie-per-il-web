<?php
require_once('database.php');
$username = $_POST['username'];
$email = $_POST['email'];
$sicurezza = $_POST['sicurezza'];
$password = $_POST['password1'];
$password2 = $_POST['password2'];
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db) or die( "Unable to connect");
$mysqli->select_db($db) or die( "Unable to select database");
mysqli_set_charset($mysqli,"utf8");
$query="SELECT password FROM utenti WHERE username = '$username' AND email = '$email'";
$result = $mysqli->query($query) or die( "Unable to query");
$num = mysqli_num_rows($result);
$query2="SELECT sicurezza FROM utenti WHERE username = '$username' AND email = '$email'";
$result2 = $mysqli->query($query2) or die( "Unable to query");
$num2 = mysqli_num_rows($result2);
$logdb = mysqli_fetch_row($result2);
$numero =count($logdb);
$sicurezza2 = current($logdb);

if ($num < 1) {
$erroreNonEsiste = "1";
echo 'email ed username inesistenti';
echo "<a href='../login/recupero.html'> <button> Riprova </button></a>"; 
} 
if($password != $password2){
    echo "Le password non coincidono.<hr>";
    echo "<a href='../login/recupero.html'> <button> Riprova </button></a><hr>"; 
}
if($sicurezza == $sicurezza2){
    $password = md5($password);
    $query = "UPDATE utenti SET password = '$password' WHERE username = '$username' AND email = '$email'";
    $result = $mysqli->query($query) or die( "Unable to query");
    echo "Password modificata con successo.<hr>";
    echo "<a href='../login/accedi.html'> <button> Esegui il login </button></a><hr>";
}
if($sicurezza != $sicurezza2){
    echo "Risposta domanda di sicurezza errata.<hr>";
    echo "<a href='../login/recupero.html'> <button> Riprova </button></a><hr>";
}

    



