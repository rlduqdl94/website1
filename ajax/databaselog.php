<?php
date_default_timezone_set('Asia/Seoul');

// $serverName = "211.250.242.31,1455";
$serverName = "106.10.107.2,1455";

$connectionOptions = array(
    "database" => "intra", // 데이터베이스명
    "uid" => "sa",   // 유저 아이디
    "pwd" => "sejoongDB9778@$",    // 유저 비번
    "CharacterSet" => "UTF-8"
);

// DB커넥션 연결
$con = sqlsrv_connect($serverName, $connectionOptions);

// 파람/옵션 설정 ..
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);


 ?>
