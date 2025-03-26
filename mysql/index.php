<?php
$conn = new mysqli("127.0.0.1", "root", "root", "opentutorials", 8889);

$sql = "select * from topic";
$result = mysqli_query($conn, $sql);
$list = '';

while ($row = mysqli_fetch_array($result)) {
  $list = $list . "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>"; // 기존 $list에 누적
}

$article = array(
  'title' => 'Welcome',
  'description' => 'Hello, web'
);

$update_link = '';
$delete_link = '';

if (isset($_GET['id'])) {
  $sql = "select * from topic where id={$_GET['id']}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = $row['title'];
  $article['description'] = $row['description'];

  $update_link = '<a href="update.php?id=' . $_GET['id'] . '">update</a>';
  $delete_link = '
    <form action="process_delete.php" method="post">
      <input type="hidden" name="id" value="' . $_GET['id'] . '">
      <input type="submit" value="delete">
    </form>
  ';
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
  <?= $update_link ?>
  <?= $delete_link ?>
  <h2><?= $article['title'] ?></h2>
  <?= $article['description'] ?>
</body>

</html>