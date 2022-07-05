<?php
session_start();
$cartid = $_SESSION["userid"];
$gm = $_POST["gameID"];
if (isset($_POST["delete"])){
   

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
dGame($conn, $cartid, $gm);

}