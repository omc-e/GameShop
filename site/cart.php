<?php 
include_once './includes/header_signup.php';
include_once './includes/dbh.inc.php';
if(isset($_SESSION["userid"])){
$cartID = $_SESSION["userid"];}
else {
    $cartID = null;
}
?>
  

<div class="container">

<?php
$price = 0;
if (isset($_SESSION["userid"])) {
$sql = "SELECT games.game_name, games.game_price, games.game_image, games.game_id, cart.cart_id 
from cart 
inner join games
on cart.game_id = games.game_id 
WHERE cart.cart_id = ".$_SESSION['userid'].";";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $price += $row["game_price"];
        $gameID = $row["game_id"];
        echo '
         <div class="game"><div> <form action="includes/deleteG.inc.php" method="post">
         
         <input type="hidden" name="gameID" value="' .$gameID. '">
         <input type="hidden" name="cartID" value="' .$cartID. '">
         <button type="submit" name="delete" class="btn-card-delete"><i style="font-size:35px; color:red;" class="icon ion-trash-a"></i></button>
</form>
</div> <div class="img-con"><img class="gmIMG" src="images/'.$row["game_image"].'" style="width: 120px; height:120px;" alt=""></div>
    <div class="game-info"><h3>'.$row["game_name"].'</h3> <h4>'.$row["game_price"].'$</h4></div>
</div>


        ';
        
    }
}
}
?>

<div class="checkout">
   <h4> Total: <?php echo $price; ?>$</h4>
    <div> <form  action="includes/checkout.inc.php" method="post">
        <input type="hidden" name="cartID" value="<?php $cartID ?>">
    <button class="chckBttn" name ="submit" type="submit">CheckOut</button>
    </form>
    </div>
</div>
</div> 
 
</div>

<?php 
include_once './includes/footer.php';
?>


