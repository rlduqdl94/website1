<?php
include './databaselog.php';

$no = $_POST['no'];
$acc_name = $_POST['acc_name'];
$acc_bu_no = $_POST['acc_bu_no'];
$acc_status = $_POST['acc_status'];
$acc_add1 = $_POST['acc_add1'];
$acc_add2 = $_POST['acc_add2'];
$acc_phone = $_POST['acc_phone'];
$acc_fax = $_POST['acc_fax'];
$file_name = $_POST['file_name'];




$sql = "UPDATE dbo.account SET acc_name = '$acc_name', acc_bu_no = '$acc_bu_no', acc_status = '$acc_status', acc_add1 = '$acc_add1', acc_add2 = '$acc_add2', acc_phone = '$acc_phone', acc_fax = '$acc_fax', acc_file = '$file_name' WHERE no = $no";



sqlsrv_query($con,$sql);
print_r($sql);
 ?>
