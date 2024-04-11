<?php  
$mysqli = new mysqli("localhost","root","","duan1_nhom1");

if($mysqli->connect_errno){
    echo "kết nối lỗi" . $mysqli->connect_error;
    exit();
}





?>