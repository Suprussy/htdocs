<?php
$user = "root";
$pass = "root";
$host = "127.0.0.1"; // 포트는 따로 지정할 것
$port = 8889; // MAMP MySQL 포트
$db = "opentutorials"; // 연결할 DB 없으면 비워도 됨

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_query($conn, "
  insert into topic (
    title, description, created
  ) values (
    'MySQL', 'MySQL is ...', now()
  )
");
