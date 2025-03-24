<?php
function print_title()
{
  if (isset($_GET['id'])) {
    echo $_GET['id'];
  } else {
    echo "Welcome";
  }
}
?>

<?php
function print_description()
{
  if (isset($_GET['id'])) {
    echo file_get_contents("data/" . $_GET['id']);
  } else {
    echo "Hello, PHP";
  }
}
?>

<?php
function print_list()
{
  $list = scandir('./data');
  $i = 0;
  while ($i < count($list)) {
    if ($list[$i] != '.' && $list[$i] != '..') {
      echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
    }
    $i = $i + 1;
  }
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
  <h1>
    <?php print_title() ?>
  </h1>
  <ol>
    <?php print_list() ?>
  </ol>
  <a href="create.php">create</a>
  <?php if (isset($_GET['id'])) { ?>
    <a href="update.php?id=<?= $_GET['id'] ?>">update</a>
  <?php } ?>
  <form action="update_process.php" method="post">
    <input type="hidden" name="old_title" value="<?= $GET['id'] ?>" />
    <p>
      <input type="text" name="title" placeholder="Title" value="<?php print_title() ?>" />
    </p>
    <p>
      <textarea name="description" id="" placeholder="Description" value="<?php print_description() ?>"></textarea>
    </p>
    <p>
      <input type=" submit" value="Submit" />
    </p>
  </form>
</body>

</html>