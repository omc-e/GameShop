<?php 
$serverName = "localhost";
$dbUserName = "root";
$dbPass = "";
$dbName = "game_shop";

$conn = mysqli_connect($serverName, $dbUserName, $dbPass, $dbName);

if(!$conn){
die("Connection falied: " . mysqli_connect_error ());
}
