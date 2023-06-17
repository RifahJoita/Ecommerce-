<?php
    include "middleware/authentication.php";
    include "config/validation.php";
    if ($authenticated) {
        header("location: profile.php");
    }
    $login_error_message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "select * from account where email = '$email' and password = '$password'";
        $result = getQuery($conn, $sql);
        $dataLen = count($result);
        if ($dataLen == 1) {
            $result = $result[0];
            $_SESSION["authenticated"] = true;
            $_SESSION["id"] = $result["id"];
            header("location: profile.php");
        } else {
            $_SESSION["authenticated"] = false;
            $login_error_message = "Please correct email and password";
        }
    }

    dbClose($conn);
    ?>
<?php 
require('top.php'); 
?>
      <div class="sign-up-form">
        
        <h1> Sign In </h1>
        <form method="POST" action="login.php">
            <input type="email" class="input-box" placeholder="Your Email" id="login_email" name="email" >
            <input type="password" class="input-box" placeholder="Your password" name="password" >
            <label for="" class="forgot" style="color: purple;"><?php echo $login_error_message ?></label>
            <?php if ($authenticated) { ?>
            <a href="profile.php" style="text-decoration:none; color: white" ><button class="login-btn">Sign In</button></a>
            <?php } else { ?>
            <a href="profile.php"  style="text-decoration:none; color: white" ><button class="login-btn">Sign In</button></a>
            <?php } ?>
            <p class="forgot">Forgot Password? <a href="#">Click here</a></p>
            <p class="or">OR</p>
            <p>Do not have an account?<a href="register.php"> Create one!</a></p>
            <!-- <a href="register.php" style=" text-decoration: none;"><button class="google-btn">Create an Account</button></a> -->
        </form>
      </div>

<?php
require('footer.php');
?>
