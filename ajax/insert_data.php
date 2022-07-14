<?php
include './databaselog.php';


$file_name	= $_FILES['image']['name'];




$upfile_tmp_name = $_FILES['image']['tmp_name'];
$uploaded_file = '../data/'.$file_name;

move_uploaded_file($upfile_tmp_name, $uploaded_file);
print_R($file_name);

 ?>
