<?php
$conn = new mysqli("127.0.0.1", "root", "root", "opentutorials", 8889);

echo "<h1>single row</h1>";
$sql = "select * from topic where id = 11";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<h2>' . $row['title'] . '</h2>';
echo $row['description'];

echo "<h1>multi row</h1>";
$sql = "select * from topic";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
  echo '<h2>' . $row['title'] . '</h2>';
  echo $row['description'];
}
