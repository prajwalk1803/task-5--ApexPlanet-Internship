<?php
include("config/db.php");
include("includes/header.php");

if(!isset($_SESSION['otp_email'])){
    header("Location: register.php");
    exit;
}

$email = $_SESSION['otp_email'];
$msg="";

if(isset($_POST['verify'])){
    $otp = $_POST['otp'];
    $res = $conn->query("SELECT otp FROM users WHERE email='$email'");
    $row = $res->fetch_assoc();

    if($row['otp']==$otp){
        $conn->query("UPDATE users SET is_verified=1 WHERE email='$email'");
        $msg="<div class='alert success'>OTP Verified Successfully! You can now login.</div>";
    }else{
        $msg="<div class='alert error'>Invalid OTP!</div>";
    }
}
?>
<div class="card">
<h2>Verify OTP</h2>
<p style="margin-top:8px;color:#444;">Demo OTP (for project): <b><?php echo $_SESSION['otp_demo']; ?></b></p>
<?php echo $msg; ?>
<form method="POST">
  <input class="input" type="text" name="otp" placeholder="Enter OTP" required>
  <button class="btn" type="submit" name="verify">Verify</button>
</form>
<br>
<a href="login.php">Go to Login</a>
</div>
<?php include("includes/footer.php"); ?>
