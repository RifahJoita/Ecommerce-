<?php 
include "middleware/authentication.php";
include "config/validation.php";
?>
<?php require('top.php'); ?>
<?php
$product_id=mysqli_real_escape_string($con, $_GET['id']);
if($product_id>0){
    $get_product=get_product($con, '', '', $product_id);
}
else{
     ?>
    <script>
        window.location.href='cart.php';
    </script>
    <?php
}
?>
 <?php
   if (isset($_SESSION['id'])) {
     $user_ID = $_SESSION["id"];
   }

    // $category = $_GET["category"];
    $name = "";
    if (isset($_GET["name"])) {
        $name = $_GET["name"];
    }
    $all = getQuery($conn, "select * from product where name like '%$name%'");
    if (isset($_POST["addtocart"])) {

        if (!isset($_SESSION['id'])) {
            header("location:login.php");
        }


        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_image = $_POST["product_image"];
        $product_quantity = $_POST["quantity"];
        

        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name'
            AND user_id = '$user_ID'") or die('query failed');

        if (mysqli_num_rows($select_cart) > 0) {
            $message[] = "product already added to cart!";
        } else {
            mysqli_query($conn, "INSERT INTO `cart`(user_id,name,price,image,quantity)VALUES
        ('$user_ID','$product_name','$product_price','$product_image','$product_quantity')") or die('query failed');
            $message[] = "product added to cart!";
        }
    }
    ?>

<!-- -----------------
product details
------------------ -->

<div class="small-container single-product">
        <div class="row">
            <div class="col-1">
            <img src="<?php echo $get_product['0']['image'] ?>" alt="product image">
            </div>
            <div class="col-2">
                <p><a href="index.php">Home</a>/<a href="categories.php?id=<?php echo $get_product['0']['categories_id']?>"><?php echo $get_product['0']['categories']?></a></p>
                <h2 style="color: black;"><?php echo $get_product['0']['name']?></h2>
                <span class="delete"><del><?php echo $get_product['0']['mrp']?></del></span>
                <span class="price"><?php echo $get_product['0']['price']?></span>
                <form action="product.php" method="post">
                <p><span>Quantity:</span>
                <select name="quantity" id="qty">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
                </p>
            <input type="hidden" name="product_name" value="<?php echo  $get_product['0']["name"]; ?>">
            <input type="hidden" name="product_price" value="<?php echo $get_product['0']["price"]; ?>">
            <input type="hidden" name="product_image" value="<?php echo $get_product['0']["image"]; ?>">
            <button class="btn" type="submit" name="addtocart" id="addtocart">Add to Cart</button>
        </form>
                <h3>Product Details</h3>
                <p><?php echo $get_product['0']['description']?></p>
            </div>
        </div>
        
    </div>                  
    
<?php require('footer.php')
?>
<style>
    /* ---------------------------
    Extra for product details
------------------------------ */
.row{
    width: 70%;
    margin: auto;
    margin-top: 2rem;
    margin-bottom: 10rem;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    font-family: Arial, Helvetica, sans-serif;
}
.col-2{
   display: flex;
   flex-direction: column;
   justify-content: center;
}
.single-product .col-2{
    padding: 20px;
}
.single-product h4{
    margin: 0 20px;
    font-size: 22px;
}
.single-product input{
    width: 40px;
    height: 28px;
    padding-left: 10px;
    font-size: 20px;
    margin-right: 10px;
    border: 1px solid rgb(210, 208, 208);
}
input:focus{
    outline: none;
}
.row h3{
    margin-top: 20px;
}
.row a{
    text-decoration: none;
    color: rgb(104, 99, 99);
}
.row a:hover{
    color: black;
}
.col-2 .btn{
    width: 10%;
    border-radius: 20px;
    padding: 0.5rem;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 1rem;
    background-color: black;
    color: rgb(253, 213, 226);
    border: 0;
    margin: 8px 0px;
    cursor: pointer;
}

.col-2 .btn:hover{
    background-color: rgb(253, 213, 226);
    color: black;
    font-weight: 500;
}
.col-2 #addtocart{
    width: 8.2rem;
}
.col-2 .price{
    margin: 0;
    text-align: left;
    padding: 0;
}
.col-2 p, .col-2 h2, .col-2 .delete, .col-2 .price, .col-2 input, .col-2 #addtocart, .col-2 h3{
    margin-bottom: 0.8rem;
}
</style>