<?php
if (!(isset($_POST['loginButton']))) {
    header("Location: /");
}
else {
    $dbconn = pg_connect("host=localhost port=5433 dbname=EsempioLogin 
                user=postgres password=password") 
                or die('Could not connect: ' . pg_last_error());
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            if ($dbconn) {
                $email = $_POST['inputEmail'];
                $q1 = "select * from utente where email= $1";
                $result = pg_query_params($dbconn, $q1, array($email));
                if (!($line=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                    echo "<h1>Sorry, you are not a registered user</h1>
                        <a href=../registrazione/index.html> 
                            Click here to register
                        </a>";
                }
                else {
                    $password = md5($_POST['inputPassword']);
                    $q2 = "select * from utente where email = $1 and paswd = $2";
                    $result = pg_query_params($dbconn, $q2, array($email,$password));
                    if (!($line=pg_fetch_array($result, null, PGSQL_ASSOC))) {
                        echo "<h1> The password is erroneous</h1>
                            <a href=login.html> Click here to login </a>";
                    }
                    else {
                        $nome = $line['nome'];
                        echo "<a href=../welcome.php?name=$nome> Premi qui </a>
                            per inziare ad utilizzare il sito web";
                    }
                }
            }
        ?> 
    </body>
</html>