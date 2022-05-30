<?php
require_once('database.php');
$nome = $_POST['nome'];
$username = $_POST['username'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$cap = $_POST['cap'];
$indirizzo = $_POST['indirizzo'];
$civico = $_POST['civico'];
if($password != $password2){
    echo('password non coincidono     ');
    echo('<a href=registrazione.html> Clicca qui per riprovare </a>');
}else{
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db) or die( "Unable to connect");
    $mysqli->select_db($db) or die( "Unable to select database");
    mysqli_set_charset($mysqli,"utf8");
    $query="SELECT * FROM utenti WHERE email = '$email'";
    $result = $mysqli->query($query) or die( "Impossibile utilizzare la query");
    $num = mysqli_num_rows($result);

    if ($num > 0) {
    $erroreMailUsata = "1";
    echo('Esiste già una registrazione con questa email ');
    echo('<a href=registrazione.html> Clicca qui per riprovare </a>');
    } else {
        $password = md5($password);
        $query= "INSERT INTO utenti (email, password, nome, cognome, username, cap, indirizzo, civico) VALUES ('$email','$password', '$nome','$cognome', '$username','$cap','$indirizzo','$civico')";
        $mysqli->query($query) or die( "Unable to query");
        echo "registrazione effettuata";
}
echo "<hr><a href='../login/accedi.html'> <button> vai alla pagina di accesso </button></a>";


$mysqli->close();
}
   
      
       


