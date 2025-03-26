<?php
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // 예외를 명시적으로 쓰겠다

// try {
//   $conn = new mysqli("127.0.0.1", "root", "root", "opentutorials", 8889);
//   echo "✅ 연결 성공!";
// } catch (mysqli_sql_exception $e) {
//   echo '❌ DB 연결 실패: ' . $e->getMessage();
// }

$sql = "
  insert into topic (
    title, description, created
  ) values (
    'MySQL', 'MySQL is ...', now()
  )
";
$result = mysqli_query($conn, $sql);
if ($result === false) {
  echo mysqli_error($conn);
}
