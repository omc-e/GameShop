<?php
require_once 'dbh.inc.php';
require 'functions.inc.php';

$newPW = $_POST["new_password"];
session_start();
$hash1 = $_SESSION["pw"];
$oldpw1 = $_POST["old_password"];
$userID = $_SESSION["userid"];

if(isset($_POST["changePW"])){
    changePassword($conn,$newPW,$hash1,$userID, $oldpw1);
}