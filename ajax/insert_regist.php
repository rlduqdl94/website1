<?php
include './databaselog.php';

$acc_name = $_POST['acc_name'];
$due_date = $_POST['due_date'];
$regist_status1 = $_POST['regist_status1'];
$product_status = $_POST['product_status'];
$del_place = $_POST['del_place'];

$name_arr = $_POST['name_arr'];
$count_arr = $_POST['count_arr'];
$price_arr = $_POST['price_arr'];
$stand_arr = $_POST['stand_arr'];
$height_arr = $_POST['height_arr'];
$text_arr = $_POST['text_arr'];
$category_arr = $_POST['category_arr'];
$product_count = $_POST['product_count'];
$image_arr = $_POST['image_arr'];


$today = Date('Y-m-d H:i:s');

$month = Date('Ym');
$month = substr($month,2);

$sql = "SELECT  count(*) as 'total' FROM dbo.regist_table WHERE regist_no LIKE '%$month%'";
$result = sqlsrv_query($con,$sql,$params,$options);

$row = sqlsrv_fetch_array($result);
$total = $row['total'];
if($total == 0){
  $regist_no = $month."-1";
}else{
  $se_month = $month.'-';
  $sql = "SELECT TOP(1)* FROM dbo.regist_table WHERE regist_no LIKE '%$se_month%' ORDER BY no desc";
  $result = sqlsrv_query($con,$sql,$params,$options);

  $row = sqlsrv_fetch_array($result);
  $regist_no = $row['regist_no'];

  $regist_no = explode('-',$regist_no);

  $regist_no = $regist_no[1];

  $total = (int)$regist_no + 1;
  $regist_no = $se_month.$total;
}


$sql = "INSERT INTO dbo.regist_table (acc_name,due_date,regist_status1,product_status,del_place,regist_no,write_date,status) VALUES('$acc_name','$due_date','$regist_status1','$product_status','$del_place','$regist_no','$today','미승인')";

sqlsrv_query($con,$sql);


for ($i=0; $i < $product_count; $i++) {
  $sql = "INSERT INTO dbo.regist_data (regist_no,pro_name,pro_count,pro_price,pro_stand,pro_height,pro_text,pro_category,image_url) VALUES('$regist_no','$name_arr[$i]','$count_arr[$i]','$price_arr[$i]','$stand_arr[$i]','$height_arr[$i]','$text_arr[$i]','$category_arr[$i]','$image_arr[$i]')";
  sqlsrv_query($con,$sql);
}


 ?>
