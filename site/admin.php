<?php 
include_once './includes/header_admin.php'; ?> 

<section class="admin-form">
    <div class="">
        <form class="form-style-4" action="includes/add.game.inc.php" method="POST" enctype="multipart/form-data">

        <h2>Add Game</h2>
    <div class="addGame">
    <label for="gameName"><span> Name:</span> </label>
    <input type="text" name="gameName" placeholder="Enter game name"> <br>

    <label for="ReleseDate"><span>Relese Date:</span></label>
    <input type="date" name="relDate" placeholder="Enter game relese date"> <br>

    <label for="about"><span>About:</span> </label>
    <input type="text" name="about" placeholder="Enter information about the game"> <br>

    <label><span>Image:</span> </label>
    <input type="file"  name="slika" > <br>

    <label for="price"><span>Price:</span></label>
    <input type="text" name="price" placeholder="Confirm the game price"> <br>
    <div class="button-footer-admin">
    <button type="submit" name="submit" placeholder="Submit">Submit</button>
    </div>

        </form>
    </div>
</section>

<?php 
include_once 'includes/footer.php';
?>