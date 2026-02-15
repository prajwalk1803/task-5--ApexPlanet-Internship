<?php
include("../config/db.php");
$q = isset($_GET['q']) ? $_GET['q'] : "";
$q = $conn->real_escape_string($q);

$sql = "SELECT * FROM jobs WHERE title LIKE '%$q%' OR company LIKE '%$q%' ORDER BY id DESC";
$res = $conn->query($sql);

echo "<table class='table'><tr><th>Job</th><th>Company</th><th>Location</th><th>Action</th></tr>";
while($row=$res->fetch_assoc()){
  echo "<tr>
    <td><b>".$row['title']."</b><br><small>".$row['description']."</small></td>
    <td>".$row['company']."</td>
    <td>".$row['location']."</td>
    <td><a class='btn' href='../jobs.php?apply=".$row['id']."'>Apply</a></td>
  </tr>";
}
echo "</table>";
?>