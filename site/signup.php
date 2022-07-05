<?php 
include_once './includes/header_signup.php'
?>

<section class="signup-form">


<div class="signup-form-form">
<form action="includes/signup.inc.php" class="form1" method="post"> 
    <h2>Sign Up</h2>
    <div class="signin">
    <label for="firstname">Name: </label>
    <input type="text" name="firstName" placeholder="Enter your first name"> <br>
    <label for="lastname">Last Name:</label>
    <input type="text" name="lastname" placeholder="Enter your last name"> <br>
    <label for="username">Username: </label>
    <input type="text" name="username" placeholder="Enter your username"> <br>
    <label for="email">E-mail: </label>
    <input type="text" name="email" placeholder="Enter your email"> <br>
    <label for="password">Password: </label>
    <input type="password" name="password" placeholder="Enter your password"> <br>
    <label for="confirmPass">Confirm password: </label>
    <input type="password" name="confirmPass" placeholder="Confirm your password"> <br>

    <button type="submit" name="submit">Sign Up</button>

    <?php 

if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput") {
        echo "<p> Fill in all fields </p>";
    }
    else if ($_GET["error"] == "invalidemail"){
        echo "<p>Invalid e-mail</p>";
    } 
    else if ($_GET["error"]=="passdontmatch"){
        echo "<p>Passwords doesnt match</p>";
    }
    else if($_GET["error"] == "useralredyexist"){
        echo "<p>User already exists</p>";
    }
    else if ($_GET["error"] == "stmtfaild"){
        echo "<p>Something went wrong</p>";
    }
    else if($_GET["error"]=="none"){
        echo'<p>You have signed up! Go log in -><a href="login.php">Login</a> </p>';
    }

}

?>




    </div>
    </form>
    </div>

</section>




<?php 
include_once './includes/footer.php'
?>
