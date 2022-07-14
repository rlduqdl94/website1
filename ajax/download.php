<?php
$file_name = $_GET['file_name'];
$file_path = "../data/".$file_name;

$ie = preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) ||
    (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0') !== false &&
        strpos($_SERVER['HTTP_USER_AGENT'], 'rv:11.0') !== false);

//IE인경우 한글파일명이 깨지는 경우를 방지하기 위한 코드
if( $ie ){
     $file_name = iconv('utf-8', 'euc-kr', $file_name);
}
// 파일 존재할 시 파일 다운로드 실행

if( file_exists($file_path) )
{
$fp = fopen($file_path,"rb");
  Header("Content-type: application/vnd.android.package-archive");
  Header("Content-Length: ".filesize($file_path));
  Header("Content-Disposition: attachment; filename=".$file_name);
  Header("Content-Transfer-Encoding: binary");
  Header("Content-Description: File Transfer");
  Header("Expires: 0");
}

if(!fpassthru($fp))
fclose($fp);


 ?>
