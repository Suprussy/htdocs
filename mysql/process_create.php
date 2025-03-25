<?php
$sql = "
  insert into topic (
    title, description, created
  ) values (
    '{$_POST['title']}',
    '{$_POST['description']}',
    now() 
  )
";
echo $sql;
