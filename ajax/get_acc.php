<?php
include './databaselog.php';


$acc_name = $_POST['acc_name'];

$sql = "SELECT * FROM dbo.account WHERE acc_name = '$acc_name'";

// 1. 데이터베이스에서 데이터를 가져옴
if ($result = sqlsrv_query($con, $sql , $params, $options)) {
    // 2. 데이터베이스로부터 반환된 데이터를
    // 객체 형태로 가공함
    $o = array();

    while ($row = sqlsrv_fetch_object($result)) {
        $t = new stdClass();
        $t->acc_name = $row->acc_name;

        $sql2 = "SELECT TOP(1) * FROM dbo.account_status WHERE status_no = $row->acc_status";
        $result2= sqlsrv_query($con,$sql2);
        $row2= sqlsrv_fetch_array($result2);
        $status_name = $row2['status_name'];
        $t->acc_bu_no = $row->acc_bu_no;

        $t->no = $row->acc_no;
        $t->acc_status = $status_name;


        $t->acc_add1 = $row->acc_add1;
        $t->acc_add2 = $row->acc_add2;
        $t->acc_phone = $row->acc_phone;
        $t->acc_fax = $row->acc_fax;

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
