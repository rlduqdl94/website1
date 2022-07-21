<?php
include './databaselog.php';


$id = $_POST['id'];
$passwd = $_POST['passwd'];

$sql = "SELECT TOP(1)* FROM dbo.login WHERE id = '$id' AND pw = '$passwd'";

$result = sqlsrv_query($con,$sql,$params,$options);
$total = sqlsrv_num_rows($result);

if($total >0){
$row = sqlsrv_fetch_array($result);
$emp_no = $row['emp_no'];
if($emp_no == 9999){
  $total = 6;
}else{
  $sql = "SELECT TOP(1) * FROM dbo.employee WHERE emp_no = $emp_no";
  $result = sqlsrv_query($con,$sql);
  $row = sqlsrv_fetch_array($result);
  $total = $row['depart_no'];
}


}else{
  $total = $total;
}

  echo json_encode($total)
 ?>
