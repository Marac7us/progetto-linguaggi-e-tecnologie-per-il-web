<?php
session_start();

if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['session_id']);
    
    printf("Benvenuto %s, il tuo session ID è %s", $session_user, $session_id);
    echo "<br>";
    printf("%s", '<a href="logout.php">logout</a>');
} else {
    printf("Effettua il %s per accedere all'area riservata", '<a href="../login.html">login</a>');
}