<?php

include './ajax/databaselog.php';
$today = Date('Y-m-d H:i:s');

$month = Date('Ym');
$month = substr($month,2);
$se_month = $month.'-';
$sql = "SELECT TOP(1)* FROM dbo.regist_table WHERE regist_no LIKE '%$se_month%' ORDER BY no desc";
$result = sqlsrv_query($con,$sql,$params,$options);

$row = sqlsrv_fetch_array($result);
$regist_no = $row['regist_no'];
// 
// $regist_no = explode('-',$regist_no);
//
// $regist_no = $regist_no[1];
//
// $total = (int)$regist_no + 1;
// $regist_no = $se_month.$total;
print_r($regist_no);




 ?>
