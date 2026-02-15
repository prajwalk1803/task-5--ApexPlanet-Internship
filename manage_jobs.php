<?php
include("../config/db.php");
session_start();
if(!isset($_SESSION['admin'])){ header("Location: index.php"); exit; }

if(isset($_POST['add'])){
  $title=$_POST['title'];
  $company=$_POST['company'];
  $loc=$_POST['location'];
  $desc=$_POST['description'];
  $conn->query("INSERT INTO jobs(title,company,location,description) VALUES('$title','$company','$loc','$desc')");
}
$res=$conn->query("SELECT * FROM jobs ORDER BY id DESC");
?>
<!DOCTYPE html>
<html><head>
<title>Manage Jobs</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
<div class="card">
<h2>Manage Jobs</h2>
<form method="POST">
  <input class="input" name="title" placeholder="Job Title" required>
  <input class="input" name="company" placeholder="Company" required>
  <input class="input" name="location" placeholder="Location" required>
  <input class="input" name="description" placeholder="Short Description" required>
  <button class="btn" name="add">Add Job</button>
</form>
</div>

<div class="card">
<h3>All Jobs</h3>
<table class="table">
<tr><th>Title</th><th>Company</th><th>Location</th></tr>
<?php while($row=$res->fetch_assoc()): ?>
<tr>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['company']; ?></td>
<td><?php echo $row['location']; ?></td>
</tr>
<?php endwhile; ?>
</table>
</div>
<a href="dashboard.php">⬅ Back</a>
</div>
</body></html>
