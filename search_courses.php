<?php
include("../config/db.php");
$q = isset($_GET['q']) ? $_GET['q'] : "";
$q = $conn->real_escape_string($q);

$sql = "SELECT * FROM courses WHERE title LIKE '%$q%' ORDER BY id DESC";
$res = $conn->query($sql);

echo "<table class='table'><tr><th>Course</th><th>Category</th><th>Price</th><th>Action</th></tr>";
while($row=$res->fetch_assoc()){
  echo "<tr>
    <td><b>".$row['title']."</b><br><small>".$row['description']."</small></td>
    <td>".$row['category']."</td>
    <td>₹".$row['price']."</td>
    <td><a class='btn' href='../courses.php?enroll=".$row['id']."'>Enroll</a></td>
  </tr>";
}
echo "</table>";
?>