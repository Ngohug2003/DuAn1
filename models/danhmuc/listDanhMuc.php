<?php

function getListDanhMuc(){
    $sql = "SELECT * FROM danhmuc";
    $danhmuc = pdo_query($sql);
    return $danhmuc;
}
function getOneDanhMuc($id_sanpham){
    $sql = "SELECT id_danhmuc FROM sanpham WHERE id_danhmuc = ".$id_sanpham ;
    $getOneDanhMuc = pdo_query_one($sql);
    extract($getOneDanhMuc);
    return $id_danhmuc;
}
function loadone_danhmuc($id_danhmuc) {
    $sql="select * from danhmuc where id_danhmuc=".$id_danhmuc;
    $dm = pdo_query_one($sql); 
    return $dm;
}
function insert_danhmuc($name_danhmuc) {
    $sql="insert into danhmuc(name_danhmuc) values('$name_danhmuc')";
    pdo_execute($sql);   
}
function delete_danhmuc($id_danhmuc) {
    $sql = "DELETE FROM danhmuc WHERE id_danhmuc =".$id_danhmuc;
    pdo_execute($sql); 
}
function update_danhmuc($id_danhmuc, $name_danhmuc) {
    $sql="update danhmuc set name_danhmuc='".$name_danhmuc."' where id_danhmuc=".$id_danhmuc;
    pdo_execute($sql);
}
function check_danhmuc($name_danhmuc){
    $sql = "SELECT * FROM danhmuc WHERE  name_danhmuc = '$name_danhmuc'";
    $check_danhmuc = pdo_query_one($sql);
    return $check_danhmuc ;
    if(mysqli_num_rows($check_danhmuc) > 0){
        return true ;
    }else{
        return false ;
    }
    }


?>