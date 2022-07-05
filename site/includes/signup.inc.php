<?php

if (isset($_POST["submit"])){

    $name = $_POST["firstName"];
    $lname = $_POST["lastname"];
    $uname = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passConfirm = $_POST["confirmPass"];

    require_once 'dbh.inc.php';
    require 'functions.inc.php';

    if (emptyInputSignUp($name, $email, $lname, $password, $uname, $passConfirm) !== false ) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
 
    if (invalidEmail($email) !== false ) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($passConfirm, $password) !== false ) {
        header("location: ../signup.php?error=passdontmatch");
        exit();
    }
    if (uidExists($conn, $uname, $email) !== false ) {
        header("location: ../signup.php?error=useralredyexist");
        exit();
    }

    createUser($conn, $name, $lname, $uname, $email, $password);

}
else {
    header("location: ../signup.php");
    exit();
}