<?php
require_once('database.php');
$username = $_POST['username'];
$sicurezza = $_POST['sicurezza'];
$password = $_POST['password'];
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db) or die( "Unable to connect");
$mysqli->select_db($db) or die( "Unable to select database");
mysqli_set_charset($mysqli,"utf8");
$query="SELECT email FROM utenti WHERE username = '$username' AND password = '$password'";
$result = $mysqli->query($query) or die( "Utente non registrato");
$num = mysqli_num_rows($result);

if ($num < 1) {
$erroreNonEsiste = "1";
echo 'Nessuna mail corrisponde a questo username e password';
echo "<a href='../login/recupero.html'> <button> Riprova </button></a>"; 
} 
 if($num >= 1){
    $query2="SELECT sicurezza FROM utenti WHERE username = '$username' AND password = '$password'";
    $result2 = $mysqli->query($query2) or die( "Unable to query");
    $num2 = mysqli_num_rows($result2);
    $logdb = mysqli_fetch_row($result2);
    $numero =current($logdb);
    $sicurezza2 = current($logdb);
       if($sicurezza == $sicurezza2){
         $query = "UPDATE utenti SET password = '$password' WHERE username = '$username' AND email = '$email'";
         $result = $mysqli->query($query) or die( "Unable to query");
         echo "Password modificata con successo.<hr>";
         echo "<a href='../login/accedi.html'> <button> Esegui il login </button></a><hr>";
         }
    if($sicurezza != $sicurezza2){
         echo "Risposta domanda di sicurezza errata.<hr>";
         echo "<a href='../login/recupero.html'> <button> Riprova </button></a><hr>";
         }
$mysqli->close();
}