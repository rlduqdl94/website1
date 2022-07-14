<?php
include './databaselog.php';
$TABLENAME = $_POST["TABLENAME"];  //테이블이름
$WHERENAME = $_POST["WHERENAME"];  //where 조건
$VALUENAME = $_POST["VALUENAME"];   //where 조건값들 배열임


$value_length = count($VALUENAME);


$value = "(";
for ($i=0; $i < $value_length ; $i++) {
  if($i == $value_length-1){
   $value .= "'$VALUENAME[$i]'".")";

   break;
  }
  $value .= "'$VALUENAME[$i]'".",";

}



$sql = "DELETE FROM [dbo].$TABLENAME WHERE $WHERENAME in $value";


print_r($sql);
sqlsrv_query($con, $sql, $params, $options);  // $sql 에 저장된 명령 실행

sqlsrv_close($con);
 ?>
