<?php 

if (isset($_POST["submit"])){

$name = $_POST["gameName"];
$rDate = $_POST["relDate"];
$about = $_POST["about"];
$price = $_POST["price"];
$image = $_FILES['slika']['name'];
$tname = $_FILES["files"]["tmp_name"];

$uploads_dir = '/images';
move_uploaded_file($tname, $uploads_dir.'/'.$pname);


require_once 'dbh.inc.php';
require 'functions.inc.php';



if (emptyInputGame($name, $rDate, $about, $price, $image) !== false ) {
    header("location: ../admin.php?error=emptyinput");
    exit();
}



if (gameExist($conn, $name) !== false ) {
    header("location: ../admin.php?error=gameExists");
    exit();
}

addGame($conn, $name, $rDate, $about, $price,$image);


}