<?php 
include_once './includes/header_signup.php'
?>

<section class="login-form">

    
    <form action="includes/login.inc.php" class="form1" method="post">
        <h2>Login</h2>
    <label for="emailorpusername">Username or e-mail:</label>   
    <input type="text" name="emailorpusername" placeholder="Enter your email or username"> <br>
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Enter your password"><br>
    <button type="submit" name="submit">Login</button> 
    <button type="submit"> <a href="signup.php">Sign Up</a></button> 
    </form>

    <?php 

if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput") {
        echo "<p> Fill in all fields </p>";
    }
    else if ($_GET["error"] == "wronglogin"){
        echo "<p>Invalid username or e-mail</p>";
    } 
    else if ($_GET["error"]=="incorrectpassword"){
        echo "<p>Incorrect password</p>";
    }
    

}

?>

</section>



<?php 
include_once './includes/footer.php'
?>
