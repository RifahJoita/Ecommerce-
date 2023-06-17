<?php
       include "middleware/authentication.php";
       include "config/validation.php";
       include "top.php";
        if (!isset($_SESSION['id'])) {
        header("location:login.php");
        }
    ?>

<?php
$user_ID = $_SESSION["id"];

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_ID'") or die('query failed');
    header('location:cart.php');
}

?>
<div class="shopping-cart">

<table class="cart-table">
    <thead class="th-box">
        <th colspan="2">Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
    </thead>
    <tbody>
        <?php
          $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_ID'") or die('query failed');
          $grand_total = 0;
          if (mysqli_num_rows($cart_query) > 0) {
              while ($item = mysqli_fetch_assoc($cart_query)) {
          ?>
                <tr class="table-row">
                    <td><img src="<?php echo $item['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $item['name']; ?></td>

                    <!-- <td><?php echo $item['price']; ?>tk</td> -->
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>">
                            <input type="number" min="1" name="cart_quantity" class="quantity-input" value="<?php echo $item['quantity']; ?>">
                            <input type="submit" name="update_cart" value="change" class="option-btn">
                        </form>
                    </td>
                    <td><?php echo $sub_total = ($item['price'] * $item['quantity']); ?>/-</td>
                    <td><a href="cart.php?remove=<?php echo $item['id']; ?>" class="delete-btn"><i class="fa-regular fa-trash-can fa-lg" ></i></a></td>
                </tr>
        <?php
                  $grand_total += $sub_total;
              }
          } else {
              echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="5">no item added</td></tr>';
          }
          ?>
        <tr class="table-bottom">
            <td colspan="3" class="total">Total :</td>
            <td><?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="fa-regular fa-trash-can fa-lg" ></a></td>
        </tr>
    </tbody>
</table>

<div class="checkout">
    <a href="checkout.php" class="t-a <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Checkout</a>
</div>

</div>

</div>

<?php
include "footer.php";
?>