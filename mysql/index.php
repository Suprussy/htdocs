<?php
$conn = new mysqli("127.0.0.1", "root", "root", "opentutorials", 8889);

$article = array(
  'title' => 'Welcome',
  'description' => 'Hello, web'
);

$sql = "select * from topic";
$result = mysqli_query($conn, $sql);
$list = '';

while ($row = mysqli_fetch_array($result)) {
  $escaped_title = htmlspecialchars($row['title']);
  $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>"; // 기존 $list에 누적
}
if (isset($_GET['id'])) {
  $sql = "select * from topic where id={$_GET['id']}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB</title>
</head>

<body>
  <h1><a href="index.php">WEB</a></h1>
  <ol><?= $list ?></ol>
  <a href="create.php">create</a>
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
</body>

</html>