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