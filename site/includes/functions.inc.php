<?php 

function emptyInputSignUp($name, $email, $lname, $password, $uname, $passConfirm){
$result = null;
if (empty($name) || empty($lname) || empty($email) || empty($password) || empty($uname) || empty($passConfirm) ){
    $result = true;
}
else {
    $result = false;
}
return $result;
}

function invalidEmail($email) { 

    $result = null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }{
        $result = false;
    }
    return $result;
}

function pwdMatch($passConfirm, $password){
    $result = null;

    if($password !== $passConfirm){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function uidExists($conn, $username, $email){

    $sql = "SELECT * FROM users WHERE userUserName = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfaild");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {

        return $row;

    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}



function createUser($conn, $name, $lname, $uname, $email, $password){

    $sql = "INSERT INTO users (userName, userLast, userUserName, userEmail, userPwd) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfaild");
        exit();
    }

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $lname, $uname, $email, $hashedPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
}

function emptyInputLogin($username, $pwd){
$result = null;
if(empty($username) || empty($pwd)){
    $result = true;
}
else{
    $result = false;
}
return $result;
}



function loginuser($conn, $username, $pwd){
    $uidExists =  uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd, $passwordHashed);
    if($checkPwd === false){
        header("location: ../login.php?error=incorrectpassword");
        exit(); 
    } else if ($checkPwd === true && $uidExists["role"] != null){
        session_start();
        $_SESSION["userid"] = $uidExists["userID"]; 
        $_SESSION["userUID"] = $uidExists["userUserName"];
        $_SESSION["korisnik"] = $uidExists["role"];
        $_SESSION["pw"] = $uidExists["userPwd"];
        header("location: ../admin.php");
        exit();

    }
    else if($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["userID"]; 
        $_SESSION["userUID"] = $uidExists["userUserName"];
        header("location: ../home.php");
        exit();
    }

}

function emptyInputGame($name, $rDate, $about, $price, $image){
    $result = null;
if (empty($name) || empty($rDate) || empty($about) || empty($price) || empty($image)){
    $result = true;
}
else {
    $result = false;
}
return $result;

}

function gameExist($conn, $name){

    $sql = "SELECT * FROM games WHERE game_name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../admin.php?error=stmtfaild");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {

        return $row;

    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function addGame($conn, $name, $rDate, $about, $price,$image) {

    $sql = "INSERT INTO games (game_name, relese_date, game_info, game_price, game_image) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../admin.php?error=lol");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssss", $name, $rDate, $about, $price,$image);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../admin.php?error=none");

}

function updatePrice($conn, $price, $name){
    $sql = "UPDATE games SET game_price = '$price' WHERE game_name = '$name';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../admin.php?error=lol");
        exit();
    }
  
    //  $stmt->bind_param("ss", $price,$name);

    //mysqli_stmt_bind_param($stmt, "ss", $price, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../games.php?error=none");

}
//delete game
function deleteGame($conn, $name){

    $sql = "DELETE FROM games WHERE game_name = '$name'";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../games.php?error=stmterrror");
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../games.php?gamedeleted");

}
//Adding in cart
function addToCart($conn, $cartID, $gameID){
    $sql = "INSERT INTO cart (cart_id, game_id) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql) ){
        header("location ../home.php?error=cannotadd");
    } 
    else {
    if(isset($_SESSION["userUID"])){
    mysqli_stmt_bind_param($stmt, "ss", $cartID,$gameID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../home.php?error=none");}
    else {
        header("location: ../home.php?error=login");
    }
    }
}

function  deleteGameFromCart($conn, $cartid){

    $sql = "DELETE FROM cart WHERE cart_id='$cartid';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location ../cart.php?error=ordernotsubmited");}
        
       
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../cart.php?ordered");
    

}

function dGame($conn, $cartid, $gameid){


    $sql = "DELETE FROM cart WHERE cart_id='$cartid' AND game_id='$gameid';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location ../cart.php?error=ordernotsubmited");}
        
       
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../cart.php?deleted");
    
}

function changePassword($conn,$newPW,$hash1,$userID,$oldpw1){

    $sql = "UPDATE users SET userPwd = '$newPW' WHERE userID = '$userID';";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../profile.php?error=lol");
        exit();
    }
    $password = $_SESSION["pw"];
   $passwordCheck = password_verify($oldpw1,$password);
    if(!$passwordCheck){
     
        header("location: ../profile.php?error=incorrectPW");
    }
    else{
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        header("location: ../profile.php?error=none");
    }
}