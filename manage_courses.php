<?php
include("../config/db.php");
session_start();
if(!isset($_SESSION['admin'])){ header("Location: index.php"); exit; }

if(isset($_POST['add'])){
  $title=$_POST['title'];
  $cat=$_POST['category'];
  $desc=$_POST['description'];
  $price=$_POST['price'];
  $conn->query("INSERT INTO courses(title,category,description,price) VALUES('$title','$cat','$desc','$price')");
}
$res=$conn->query("SELECT * FROM courses ORDER BY id DESC");
?>
<!DOCTYPE html>
<html><head>
<title>Manage Courses</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
<div class="card">
<h2>Manage Courses</h2>
<form method="POST">
  <input class="input" name="title" placeholder="Course Title" required>
  <input class="input" name="category" placeholder="Category" required>
  <input class="input" name="description" placeholder="Short Description" required>
  <input class="input" name="price" placeholder="Price" required>
  <button class="btn" name="add">Add Course</button>
</form>
</div>

<div class="card">
<h3>All Courses</h3>
<table class="table">
<tr><th>Title</th><th>Category</th><th>Price</th></tr>
<?php while($row=$res->fetch_assoc()): ?>
<tr>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['category']; ?></td>
<td>₹<?php echo $row['price']; ?></td>
</tr>
<?php endwhile; ?>
</table>
</div>
<a href="dashboard.php">⬅ Back</a>
</div>
</body></html>
