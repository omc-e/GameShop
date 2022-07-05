



<?php
include_once './includes/header_home.php';
if (isset($_SESSION["userUID"])){
  $userid = $_SESSION["userid"];
}
else {
  $userid = "";
}

?>

<!--Main Section -->
 
 <section class="main-section" id="main-section"> <div class="card-grid">



<?php 
include_once 'includes/dbh.inc.php';

$sql = "Select * From games;";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $image = $row['game_image'];
        echo '
        <div class="card">
    <div class="card-header card-image"> 
        <img src="images/'.$row["game_image"].'" > </div>
    <div class="card-body">
    <p  >'.$row["game_info"].'</p>
    </div>
    <div class="card-footer">
    <form action="includes/add.toCart.inc.php" method="POST">
    <input type="hidden" name="game_id" value="' .$row["game_id"]. '"> 
    <input type="hidden" name="userid" value="' .$userid. '">  
    <input class="inputForName" name="name" value="' .$row["game_name"]. '">

    <input value="$'.$row["game_price"]. '"readonly/>

        <button name="submit" class="btn-card">Add to Cart</button>
    </div>
    </form>
</div>
        ';
    }
}

?>






</div>
</section>

<script>
$(document).ready(function(){
  $("#gameSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#main-section .card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<!--Footer-->
<?php 
include_once './includes/footer.php'
?>

