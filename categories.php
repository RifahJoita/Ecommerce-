<?php 
include "middleware/authentication.php";
include "config/validation.php";
require('top.php');
$cat_id=mysqli_real_escape_string($con, $_GET['id']);
if($cat_id>0){
    $get_product=get_product($con, '', $cat_id);
}
else{
     ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
?>

<!------------
sorting html
------------->
<div class="filter-condition">
        <select name="" id="select">
            <option value="Default">Default</option>
            <option value="Lowtohigh">Low to high</option>
            <option value="Hightolow">High to low</option>
        </select>
</div>
<!-------------------
sorting html finishes
--------------------->
    <!-- -------Products--------- -->
<?php 
if(count($get_product)>0) {
?> 
    
    <div id="main">
            <!-- card -->
        <?php
        foreach($get_product as $list){
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
    <!------Here Card ENDS------>
    <?php require('footer.php');
?>
            <!-- <?php } else{ 
            echo "Data not found";
            require('footer.php');
            } ?> 
        

<style>
/* ----------------------------
     Sorting Box CSS
---------------------------- */
.filter-condition{
    padding: 10px 20px;
    height: 30px;
    font-size: 2rem;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    margin: 9px 6px 9px 1300px;
}
.filter-condition select{
    width: 120px;
    padding: 0 0 0 10px;
    border: none;
    outline: none;
    font-weight: bold;
    color: #c39fc9;
    background: transparent;
    cursor: pointer;
}
</style>