<?php
include './databaselog.php';


$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$description = $_POST['description'];
$depart = $_POST['depart'];
$role = $_POST['role'];
$today = Date('Y-m-d');
$base64 = $_POST['base64'];

$base64 = explode('url(',$base64);
$base64 = $base64[1];
$base64 = explode(')',$base64);
$base64 = $base64[0];
// $base64 =
$sql = "SELECT TOP(1) * FROM dbo.employee WHERE emp_no != 9999 order by emp_no desc";
$result = sqlsrv_query($con,$sql,$params,$options);
$row = sqlsrv_fetch_array($result);

$total = $row['emp_no'];

$total = (int)$total + 1;



$sql = "INSERT INTO dbo.employee (name,email,description,address1,address2,phone,emp_no,depart_no,role_no,photo,join_date) VALUES('$name','$email','$description','$address1','$address2','$phone','$total','$depart','$role','$base64','$today')";

sqlsrv_query($con,$sql);


$sql = "INSERT INTO dbo.login (emp_no,id,pw) VALUES('$total','$id','$pw')";
sqlsrv_query($con,$sql);


$sql = "INSERT INTO dbo.auth (auth_no) VALUES('$total')";
sqlsrv_query($con,$sql);

 ?>
