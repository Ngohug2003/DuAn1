<?php
function getListSanPham(){
    $sql = "SELECT * FROM sanpham inner join danhmuc on sanpham.id_danhmuc = danhmuc.id_danhmuc " ;
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function getOneSanPham($idsp){
    $sql = "SELECT * FROM sanpham WHERE id_sanpham = $idsp";
    $Onesanpham = pdo_query_one($sql);
    return $Onesanpham;
}
function getListSanPham_noibat(){
    $sql = "select * from sanpham  order by luotxem_sanpham desc limit 0,4";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function  getSanPham_DanhMuc($idsp,$id_danhmuc){
    $sql = "SELECT * FROM sanpham WHERE id_danhmuc = ".$id_danhmuc." AND id_sanpham<>".$idsp."";
    $getSanPham_DanhMuc = pdo_query($sql);
    return $getSanPham_DanhMuc;
}
function search_sanpham($keyword = "",$id_danhmuc = 0){
    
    $sql = "SELECT * FROM sanpham WHERE 1 ";
    if ($keyword != "") {
        $sql .= " and name_sanpham like '%" . $keyword . "%'";
    }
    if ($id_danhmuc > 0) {
        $sql .= " and id_danhmuc ='" . $id_danhmuc . "'";
    }

    $sql .= " order by id_sanpham desc";
    $dssp = pdo_query($sql);
    return  $dssp;
}



?>