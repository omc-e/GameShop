<?php 
include_once 'includes/header_admin.php';
include_once 'includes/dbh.inc.php';
?>
    <h1>Update Game     </h1>
<section class="main-section">
<div class="card-grid">
<?php 
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
    <form action="includes/updateGame.php" method="POST">
    <input class="inputForName" name="name" value="' .$row["game_name"]. '">

    <input name="price" value="' .$row["game_price"]. '$">

        <button type="submit" name="submit" class="btn-card">Update Price</button>
        <div class="delete-button">
        <button type="submit" name="delete" class="btn-card-delete"><i class="icon ion-trash-a"></i></button>
        </div>
        </div>
    </form>
</div>

        ';
    }
}

?>
</div>
</section>
<?php 
include_once 'includes/footer.php';
?>