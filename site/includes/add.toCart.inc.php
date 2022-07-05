<?php
$cartID = $_POST["userid"];
require_once 'dbh.inc.php';
require 'functions.inc.php';
$gameID = $_POST["game_id"];
session_start();

if(isset($_POST["submit"])){
    addToCart($conn,$cartID,$gameID);
}