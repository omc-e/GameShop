<?php 

if (isset($_POST["submit"])){
    $username = $_POST["emailorpusername"];
    $pwd = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false ) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginuser($conn, $username, $pwd);
}
else {
    header("location: ../login.php");
        exit();
}