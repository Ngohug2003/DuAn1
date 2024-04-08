<?php  
$mysqli = new mysqli("localhost","root","","nhom1_duan1");

if($mysqli->connect_errno){
    echo "kết nối lỗi" . $mysqli->connect_error;
    exit();
}





?>