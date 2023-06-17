<?php 
include "middleware/authentication.php";
include "config/validation.php";
?>
<?php require('top.php')?>
<div id="bairerdiv">
        <div id="shop">
            <span><a href="categories.php?id=1">25% Off Summer</a></span>
            <span><a href="categories.php?id=1">Must Haves</a></span>
            <a href="categories.php?id=1" class="btn">Shop Now</a>
        </div>    
</div>
<div class="new">
    <div class="heading">
            NEW ARRIVALS..
    </div>
        <?php
        $get_product=get_product($con, 4); //setting the limit for showing products, only 4
        foreach($get_product as $list){
        ?>
        <!--This is card-1 -->
        <div class="card">
            <div class="item">
                <a href="product.php?id=<?php echo $list['id'] ?>"><img src="<?php echo $list['image'] ?>"></a>
                <a href="product.php?id=<?php echo $list['id'] ?>" style="text-decoration:none;" id="shade"><span ><?php echo $list['name'] ?></span></a>
                <span class="delete"><del><?php echo $list['mrp'] ?></del></span>
                <span class="price"><?php echo $list['price'] ?></span>
                <button class="btn">Buy</button>
                <button class="btn" id="addtocart">Add to Cart</button>
            </div>
        </div>
        <!-- ----Here Card ENDS----     -->
        <?php } ?>  
</div>
<div class="new">
            <div class="heading">
                BEST-SELLERS..
            </div>
            <div id="main">
                <!-- card-1 -->
                <div class="card">
                    <div class="item">
                    <img src="media/m7.jpg">
                        <span id="shade">Lipstick Set of 04</span>
                        <span class="delete"><del>BDT 999/-</del></span>
                        <span class="price">BDT 870/-</span>
                        <button class="btn">Buy</button>
                        <button class="btn" id="addtocart">Add to Cart</button>
                    </div>
                </div>
                <!-- card-1 -->
                <div class="card">
                    <div class="item">
                    <img src="media/m12.jpg">
                        <span id="shade">Lipstick Set of 04</span>
                        <span class="delete"><del>BDT 999/-</del></span>
                        <span class="price">BDT 870/-</span>
                        <button class="btn">Buy</button>
                        <button class="btn" id="addtocart">Add to Cart</button>
                    </div>
                </div>
                <!-- card-1 -->
                <div class="card">
                    <div class="item">
                    <img src="media/m20.jpg" class="resize">
                        <span id="shade">Lipstick Set of 04</span>
                        <span class="delete"><del>BDT 999/-</del></span>
                        <span class="price">BDT 870/-</span>
                        <button class="btn">Buy</button>
                        <button class="btn" id="addtocart">Add to Cart</button>
                    </div>
                </div>
                <!-- card-1 -->
                <div class="card">
                    <div class="item">
                    <img src="media/m11.jpg">
                        <span id="shade">Lipstick Set of 04</span>
                        <span class="delete"><del>BDT 999/-</del></span>
                        <span class="price">BDT 870/-</span>
                        <button class="btn">Buy</button>
                        <button class="btn" id="addtocart">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="new">
            <div class="heading">
                OFFERS..
            </div>
            <div id="main">
                <!-- card-1 -->
                <div class="card">
                    <div class="item">
                    <img src="media/m17.jpg">
                        <span id="shade">Lipstick Set of 04</span>
                        <span class="delete"><del>BDT 999/-</del></span>
                        <span class="price">BDT 870/-</span>
                        <button class="btn" class="cart-btn">Buy</button>
                        <button class="btn" id="addtocart">Add to Cart</button>
                    </div>
                </div>
                <!-- card-1 -->
                <div class="card">
                    <div class="item">
                    <img src="media/m13.jpg">
                        <span id="shade">Lipstick Set of 04</span>
                        <span class="delete"><del>BDT 999/-</del></span>
                        <span class="price">BDT 870/-</span>
                        <button class="btn">Buy</button>
                        <button class="btn" id="addtocart" class="cart-btn">Add to Cart</button>
                    </div>
                </div>
                <!-- card-1 -->
                <div class="card">
                    <div class="item">
                    <img src="media/m4.jpg">
                        <span id="shade">Lipstick Set of 04</span>
                        <span class="delete"><del>BDT 999/-</del></span>
                        <span class="price">BDT 870/-</span>
                        <button class="btn">Buy</button>
                        <button class="btn" id="addtocart" class="cart-btn">Add to Cart</button>
                    </div>
                </div>
                <!-- card-1 -->
                <div class="card">
                    <div class="item">
                    <img src="media/m2.jpg">
                        <span id="shade">Lipstick Set of 04</span>
                        <span class="delete"><del>BDT 999/-</del></span>
                        <span class="price">BDT 870/-</span>
                        <button class="btn">Buy</button>
                        <button class="btn" id="addtocart" class="cart-btn">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    <?php require('footer.php')?>