<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/images/logo.png" type="logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Font Awesome-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <title>Games Shop | Web Design</title>
</head>
<body>

<div class="header">
    <video autoplay loop class="back-video" muted plays-inline>
        <source src="images/video.mp4" type="video/mp4">
    </video>  
    
   <nav>
       
       <ul class="nav-links">
           <img src="images/logo.png" class="logo"><?php 
           if (isset($_SESSION["userUID"])) {
           echo '<li><p>Welcome, '.  $_SESSION['userUID'] . '</li>';
           echo '<li class="li-one"><a href="home.php">Home</a> </li>';

        }else {
            echo '<li class="li-two"><a href="home.php">Home</a> </li>';
        }
           ?>

           <li><a href="about.php">About</a> </li>
           <li><a href="cart.php">Cart</a> </li>
           <?php
           if (isset($_SESSION["userUID"])){
            
            echo '<li><a href="profile.php">Profile</a> </li>';
               echo '<li><a href="includes/logout.inc.php">Logout</a> </li>';
           }
           else {
            echo '<li><a href="login.php">Sign In</a> </li>';   
           }
           ?>
        </ul>
   </nav> 
   <div class="content-search">
       <h1>Find Game</h1>
       <form action="">
           <input type="text" placeholder="&#x270e Enter the game" name="" id="gameSearch">
           <button type="submit">Search</button>
       </form>
   </div>

</div>
