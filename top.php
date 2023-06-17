<?php
require('connection.inc.php');
require('functions.inc.php');
$cat_res=mysqli_query( $con, "select * from categories where status=1 ");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delight Cosmetics</title>
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- media -->
    <link rel="stylesheet" media="screen and (max-width: 1190px)" href="css/phone.css">
    <link rel="stylesheet" media="screen and (max-width: 710px)" href="css/small.css">
    <link rel="stylesheet" media="screen and (max-width: 490px)" href="css/smaller.css">
    
    
    <!-- Fonts  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,600&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Playfair+Display:ital,wght@1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text.css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div id="container">
        <span id="delight">Delight</span>
        <span id="cosmetics"> Cosmetics</span>
    </div>
    <nav id="navbar">
        <ul class="navbar-ul">
            <li><a href="index.php">Home</a></li>
         <?php
         foreach($cat_arr as $list){
           ?>
           <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>       
           <?php 
         }
         ?>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <!-- --search-- -->
        <div class="nav-search">
        <form action="search.php" method="get">
        <input type="text" name="name" id="search" placeholder="Search">
        </form>
        <!-- profile -->
        <?php if ($authenticated) { ?>
            <a href="profile.php"><img src="media/man.png" alt="profile" id="man"></a>
            <?php } else { ?>
        <a href="login.php"><img src="media/man.png" alt="Sign in" id="man"></a>
        <?php } ?>
        <a href="cart.php"><img src="media/cart.png" alt="Cart" id="cart"></a>
        </div>
    </nav>
    