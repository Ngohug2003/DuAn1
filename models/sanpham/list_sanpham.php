<?php
function getListSanPham(){
    $sql = "SELECT * FROM `sanpham` WHERE 1";
    $sanpham = pdo_query($sql);
    return $sanpham;
}
function getListSanPham_noibat(){
    $sql = "select * from sanpham  order by luotxem_sanpham desc limit 0,4";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function search_sanpham($keyword = ""){
    
        $sql = "SELECT * FROM sanpham WHERE 1 ";
        if ($keyword != "") {
            $sql .= " and name_sanpham like '%" . $keyword . "%'";
        }
        // if ($id_danhmuc > 0) {
        //     $sql .= " and id_danhmuc ='" . $id_danhmuc . "'";
        // }
    
        $sql .= " order by id_sanpham desc";
        $dssp = pdo_query($sql);
        return  $dssp;
    
}



?>