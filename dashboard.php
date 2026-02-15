<?php
include("config/db.php");
include("includes/header.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php"); exit;
}

$uid=$_SESSION['user_id'];

$enrollCount=$conn->query("SELECT COUNT(*) as c FROM enrollments WHERE user_id=$uid")->fetch_assoc()['c'];
$appCount=$conn->query("SELECT COUNT(*) as c FROM job_applications WHERE user_id=$uid")->fetch_assoc()['c'];
?>
<div class="card">
  <h2>Welcome, <?php echo $_SESSION['user_name']; ?> 👋</h2>
  <p style="margin-top:8px;color:#555;">Your personal dashboard</p>
</div>

<div class="grid3">
  <div class="card">
    <h3>📚 Enrollments</h3>
    <p><span class="badge"><?php echo $enrollCount; ?> Courses</span></p>
  </div>
  <div class="card">
    <h3>💼 Applications</h3>
    <p><span class="badge"><?php echo $appCount; ?> Jobs</span></p>
  </div>
  <div class="card">
    <h3>⚡ Quick Actions</h3>
    <a class="btn" href="courses.php">Browse Courses</a>
    <a class="btn btn-outline" href="jobs.php">Browse Jobs</a>
  </div>
</div>

<?php include("includes/footer.php"); ?>
