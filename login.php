<?php
include("config/db.php");
include("includes/header.php");
$msg="";
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $res=$conn->query("SELECT * FROM users WHERE email='$email'");
    if($res->num_rows==1){
        $row=$res->fetch_assoc();
        if($row['is_verified']==0){
            $msg="<div class='alert error'>Please verify OTP first.</div>";
        }else if(password_verify($password,$row['password'])){
            $_SESSION['user_id']=$row['id'];
            $_SESSION['user_name']=$row['name'];
            header("Location: dashboard.php");
            exit;
        }else{
            $msg="<div class='alert error'>Wrong password!</div>";
        }
    }else{
        $msg="<div class='alert error'>Account not found!</div>";
    }
}
?>
<div class="card">
<h2>Login</h2>
<?php echo $msg; ?>
<form method="POST">
  <input class="input" type="email" name="email" placeholder="Email" required>
  <input class="input" type="password" name="password" placeholder="Password" required>
  <button class="btn" type="submit" name="login">Login</button>
</form>
<br>
<a href="register.php">Create new account</a>
</div>
<?php include("includes/footer.php"); ?>
