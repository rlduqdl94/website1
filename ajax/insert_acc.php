<?php
include './databaselog.php';


$acc_name = $_POST['acc_name'];
$acc_bu_no = $_POST['acc_bu_no'];
$acc_status = $_POST['acc_status'];
$acc_add1 = $_POST['acc_add1'];
$acc_add2 = $_POST['acc_add2'];
$acc_phone = $_POST['acc_phone'];
$acc_fax = $_POST['acc_fax'];
$file_name = $_POST['file_name'];



$sql = "INSERT INTO dbo.account (acc_name,acc_bu_no,acc_status,acc_add1,acc_add2,acc_phone,acc_fax,acc_file) VALUES('$acc_name','$acc_bu_no',$acc_status,'$acc_add1','$acc_add2','$acc_phone','$acc_fax','$file_name')";

sqlsrv_query($con,$sql);
print_r($sql);
 ?>
