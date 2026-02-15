<?php
include("config/db.php");
include("includes/header.php");

if(isset($_GET['enroll']) && isset($_SESSION['user_id'])){
  $cid=intval($_GET['enroll']);
  $uid=$_SESSION['user_id'];
  $conn->query("INSERT IGNORE INTO enrollments(user_id,course_id) VALUES($uid,$cid)");
  echo "<div class='alert success'>Enrolled Successfully!</div>";
}
?>
<div class="card">
<h2>Courses</h2>
<input class="input" id="courseSearch" placeholder="Search courses (AJAX)...">
<div id="courseResults"></div>
</div>

<script>
function loadCourses(q=""){
  fetch("ajax/search_courses.php?q="+encodeURIComponent(q))
  .then(res=>res.text())
  .then(html=>{ document.getElementById("courseResults").innerHTML=html; });
}
document.getElementById("courseSearch").addEventListener("keyup", function(){
  loadCourses(this.value);
});
loadCourses();
</script>
<?php include("includes/footer.php"); ?>
