<?php
include "middleware/authentication.php";
include "config/validation.php";
?>
<?php require ('top.php'); ?>
<?php
$category = "";

if (isset($_SESSION['id'])) {
    $user_ID = $_SESSION["id"];
}

$name = "";
if (isset($_GET["name"])) {
    $name = $_GET["name"];
}
$all = getQuery($conn, "select * from product where name like '%$name%' ");

?>


    <!-- -------Products--------- -->


<?php    
    if(count($all)>0) {
?>
    
    <div id="main">
            <!-- card -->
        <?php
        foreach($all as $list){
        ?>
        <!----------------
        This is card html 
        ------------------>
        <div class="card">
            <div class="item">
                <a href="product.php?id=<?php echo $list['id'] ?>"><img src="<?php echo $list['image'] ?>"></a>
                <span id="shade" style="color: black;"><?php echo $list['name'] ?></span>
                <span class="delete"><del><?php echo $list['mrp'] ?></del></span>
                <span class="price"><?php echo $list['price'] ?></span>
                <a href="product.php?id=<?php echo $list['id'] ?>" style="text-decoration: none;" class="card-btn">Buy</a>
                <a href="product.php?id=<?php echo $list['id'] ?>" style="text-decoration: none;" class="card-btn" id="addtocart">Add to Cart</a>
            </div>
        </div>
        <!-----------------
         Card html finishes 
        ------------------->
        <?php } ?>  
    </div>
    <!-- ----Here Card ENDS----     -->
            <!-- <?php } else{ 
            echo "Data not found";
        } ?>
        -->

    
    <!-- ---------foooter--------- -->


    <?php require('footer.php'); ?>