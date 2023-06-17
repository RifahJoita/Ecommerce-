<?php
    include "middleware/authentication.php";
    if (!$authenticated) {
     header("location: login.php");
    }
dbClose($conn);
?>
<?php
require('top.php');
?>
<div class="profile">
   <div class="profile-form">
    <h1>Welcome to Delight Cosmetics</h1>
    <h2>Hey Joita!</h2>
    <div class="profile-form-btn">
        <a href="index.php"><button type="button" class="signup-btn">Want to shop more?</button></a>
        <a href="logout.php"><button type="button" class="signup-btn">Go to Cart</button></a>
        <a href="logout.php"><button type="button" class="signup-btn">Log me out</button></a>
    </div>
   </div>
</div>


<?php require('footer.php') ?>