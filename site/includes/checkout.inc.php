<?php
session_start();
$cartid = $_SESSION["userid"];

if (isset($_POST["submit"])){
    
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
 deleteGameFromCart($conn, $cartid);
}