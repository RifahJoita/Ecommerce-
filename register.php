<?php
    include "middleware/authentication.php";
    include "config/validation.php";
    if ($authenticated) {
        header("location: profile.php");
    }
    $username = "";
    $email = "";
    $password = "";
    $confirm_password = "";
    $error_message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        if ($password != $confirm_password) {
            $error_message = "Ops! Passwords don't match";
        } else if (isEmailExist($conn, $email)) {
            $error_message = "Email already exist";
        }else {
            $sql = "INSERT INTO account (username, email, password) values ('$username', '$email', '$password')";
            $result = insertQuery($conn, $sql);
            if ($result) {
                $_SESSION["authenticated"] = true;
                $_SESSION["id"] = $result;
                header("location: profile.php");
            } else {
                $_SESSION["authenticated"] = false;
            }
        }
    }

    dbClose($conn);
    ?>
<?php
require('top.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
    .password-toggle {
      position: relative;
    }

    .password-toggle .toggle-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
  <script>
    function togglePasswordVisibility() {
      var passwordField = document.getElementById("password");
      var toggleIcon = document.getElementById("toggleIcon");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
      }
    }
  </script>
<div class="sign-up-form">
       <h1> Sign Up Now </h1>
        <form method="POST" action="register.php">
            <input type="text" class="input-box" name="username" id="username" placeholder="Enter Name" value="<?php echo  $username; ?>" required />
            <input type="email" class="input-box" name="email" id="email" placeholder="Enter Email" value="<?php echo  $email; ?>" required />
            <div class="password-toggle">
            <input type="password" class="input-box" name="password" id="password" placeholder="Enter password" value="<?php echo  $password; ?>" required />
            <i id="toggleIcon" class="fas fa-eye toggle-icon" onclick="togglePasswordVisibility()"></i>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
            <input type="password" class="input-box" name="confirm_password" id="password" placeholder="Confirm password" value="<?php echo  $confirm_password; ?>" required />
            <label for="" style="color: purple;"><?php echo $error_message ?></label>
            <button type="submit" class="signup-btn">Sign Up</button>
            <p>Already have an account?<a href="login.php">Click here</a></p>
        </form>
</div>
<?php
require('footer.php');
?>
