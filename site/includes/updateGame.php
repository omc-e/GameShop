<?php

require_once 'dbh.inc.php';
require 'functions.inc.php';

if(isset($_POST["submit"])){
$price = $_POST["price"];
$name = $_POST["name"];

updatePrice($conn, $price, $name);

}

if(isset($_POST["delete"])){
    $name = $_POST["name"];

    deleteGame($conn, $name);
}
