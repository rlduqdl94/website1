<?php
include './databaselog.php';


$depart_no = $_POST['depart_no'];

$sql = "SELECT * FROM dbo.depart_role WHERE depart_no = $depart_no";

// 1. 데이터베이스에서 데이터를 가져옴
if ($result = sqlsrv_query($con, $sql , $params, $options)) {
    // 2. 데이터베이스로부터 반환된 데이터를
    // 객체 형태로 가공함
    $o = array();

    while ($row = sqlsrv_fetch_object($result)) {
        $t = new stdClass();
        $t->role_no = $row->role_no;
        $t->depart_role = $row->depart_role;

        $o[] = $t;
        unset($t);
    }
} else {
    $o = array( 0 => 'empty');
}
// var_dump($o);
// 3, 4 최종 결과 데이터를 JSON 스트링으로 변환 후 출력
  echo json_encode($o)
// echo json_encode(array("result_val"=>$o),JSON_UNESCAPED_UNICODE);


 ?>
