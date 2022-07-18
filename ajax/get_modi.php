<?php
include './databaselog.php';


$data = $_POST['data'];

$sql = "SELECT regist_no,A.pro_category as 'category_no', pro_count,A.pro_name AS 'pro_no', pro_price, pro_stand, pro_height, pro_text, image_url,B.category_name as 'pro_category', C.pro_name as 'pro_name' FROM dbo.regist_data A LEFT OUTER JOIN product_category B ON A.pro_category = B.pro_no LEFT OUTER JOIN product C ON A.pro_name = C.pro_no WHERE regist_no = '$data'";

// 1. 데이터베이스에서 데이터를 가져옴
if ($result = sqlsrv_query($con, $sql , $params, $options)) {
    // 2. 데이터베이스로부터 반환된 데이터를
    // 객체 형태로 가공함
    $o = array();

    while ($row = sqlsrv_fetch_object($result)) {
        $t = new stdClass();
        $t->pro_no = $row->pro_no;
        $t->regist_no = $row->regist_no;
        $t->category_no = $row->category_no;
        $t->pro_count = $row->pro_count;
        $t->pro_price = $row->pro_price;
        $t->pro_stand = $row->pro_stand;
        $t->pro_height = $row->pro_height;
        $t->pro_text = $row->pro_text;
        $t->image_url = $row->image_url;
        $t->pro_category = $row->pro_category;
        $t->pro_name = $row->pro_name;


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
