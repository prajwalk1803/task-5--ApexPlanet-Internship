<?php if(session_status() === PHP_SESSION_NONE){ session_start(); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkillSphere - Capstone Project</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<header class="navbar">
  <div class="logo">Skill<span>Sphere</span></div>
  <nav>
    <a href="index.php">Home</a>
    <a href="courses.php">Courses</a>
    <a href="jobs.php">Jobs</a>
    <?php if(isset($_SESSION['user_id'])): ?>
      <a href="dashboard.php">Dashboard</a>
      <a href="logout.php" class="btn">Logout</a>
    <?php else: ?>
      <a href="login.php" class="btn">Login</a>
    <?php endif; ?>
    <a href="admin/" class="btn btn-outline">Admin</a>
  </nav>
</header>
<main class="container">
