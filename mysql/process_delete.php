<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // 예외 모드 활성화

try {
  $conn = new mysqli("127.0.0.1", "root", "root", "opentutorials", 8889);

  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' => $_POST['id']
  );

  $sql = "
    DELETE
      FROM topic
    WHERE id = '{$filtered['id']}'
  ";

  $result = mysqli_query($conn, $sql);

  echo '성공했습니다. <a href="index.php">돌아가기</a>';
} catch (mysqli_sql_exception $e) {
  echo '삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
  error_log($e->getMessage()); // 서버 에러 로그에 상세 내용 기록
}
