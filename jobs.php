<?php
include("config/db.php");
include("includes/header.php");

if(isset($_GET['apply']) && isset($_SESSION['user_id'])){
  $jid=intval($_GET['apply']);
  $uid=$_SESSION['user_id'];
  $conn->query("INSERT IGNORE INTO job_applications(user_id,job_id,status) VALUES($uid,$jid,'Applied')");
  echo "<div class='alert success'>Applied Successfully!</div>";
}
?>
<div class="card">
<h2>Jobs</h2>
<input class="input" id="jobSearch" placeholder="Search jobs (AJAX)...">
<div id="jobResults"></div>
</div>

<script>
function loadJobs(q=""){
  fetch("ajax/search_jobs.php?q="+encodeURIComponent(q))
  .then(res=>res.text())
  .then(html=>{ document.getElementById("jobResults").innerHTML=html; });
}
document.getElementById("jobSearch").addEventListener("keyup", function(){
  loadJobs(this.value);
});
loadJobs();
</script>
<?php include("includes/footer.php"); ?>
