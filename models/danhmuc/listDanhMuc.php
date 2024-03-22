<?php

function getListDanhMuc(){
    $sql = "SELECT * FROM danhmuc ";
    $danhmuc = pdo_query($sql);
    return $danhmuc;
}
function getOneDanhMuc($id_sanpham){
    $sql = "SELECT id_danhmuc FROM sanpham WHERE id_danhmuc = ".$id_sanpham ;
    $getOneDanhMuc = pdo_query_one($sql);
    extract($getOneDanhMuc);
    return $id_danhmuc;
}

// function getListSanPham_noibat(){
//     $sql = "select * from sanpham  order by luotxem_sanpham desc limit 0,4";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
// function search_sanpham($keyword = ""){
    
//         $sql = "SELECT * FROM sanpham WHERE 1 ";
//         if ($keyword != "") {
//             $sql .= " and name_sanpham like '%" . $keyword . "%'";
//         }
//         // if ($id_danhmuc > 0) {
//         //     $sql .= " and id_danhmuc ='" . $id_danhmuc . "'";
//         // }
    
//         $sql .= " order by id_sanpham desc";
//         $dssp = pdo_query($sql);
//         return  $dssp;
    
// }



?>