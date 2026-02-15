<?php
include("config/db.php");
include("includes/header.php");

$msg="";
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $otp = rand(100000,999999);

    $check = $conn->query("SELECT id FROM users WHERE email='$email'");
    if($check->num_rows>0){
        $msg="<div class='alert error'>Email already registered!</div>";
    }else{
        $conn->query("INSERT INTO users(name,email,password,otp,is_verified) VALUES('$name','$email','$pass','$otp',0)");
        $_SESSION['otp_email']=$email;
        $_SESSION['otp_demo']=$otp;
        header("Location: verify_otp.php");
        exit;
    }
}
?>
<div class="card">
<h2>Create Account</h2>
<p style="margin-top:8px;color:#444;">OTP verification included (demo OTP shown after registration).</p>
<?php echo $msg; ?>
<form method="POST">
  <input class="input" type="text" name="name" placeholder="Full Name" required>
  <input class="input" type="email" name="email" placeholder="Email" required>
  <input class="input" type="password" name="password" placeholder="Password" required>
  <button class="btn" type="submit" name="register">Register</button>
</form>
</div>
<?php include("includes/footer.php"); ?>
