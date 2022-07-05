<?php 
include_once 'includes/header_signup.php';
$id = $_SESSION["userid"];
include_once 'includes/dbh.inc.php';

?> 

<section class="profile-section">

<?php 
$sql = "SELECT * FROM users WHERE userID = $id ;";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $name = $row["userName"];
        $lname = $row["userLast"];
        $username = $row["userUserName"];
        $mail = $row["userEmail"];
      
    }}

    ?>

    <div class="container2">
        <div class="div1">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>" id="" readonly>
    </div>
    <div class="div1">
    <label for="name">Last name:</label>
    <input type="text" value="<?php echo $lname; ?>" name="lname" id="" readonly>
    </div>
    <div class="div1">
    <label for="name">Username:</label>
    <input type="text" value="<?php echo $username; ?>" name="username" id="" readonly>
    </div>
    <div class="div1">
    <label for="name">E-mail:</label>
    <input type="text" value="<?php echo $mail; ?>" name="email" id="" readonly>
    </div>
    <div class="dvi2">
    <button class="btn1" onclick="myFunction()">Change Password</button>
    </div>
    <div id="showpw">
        <form action="includes/change.php" method="post">
        <label for="">Old Password</label>
        <input type="text"  name="old_password">
        <label for="">New Pasword:</label>
        <input type="password" name="new_password" id="" >
        <button type="submit" name="changePW">UPDATE</button>
        </form>
    </div>

    </div>

<script>
    function myFunction() {
  var x = document.getElementById("showpw");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
    


</section>

<?php 
include_once 'includes/footer.php';
?>