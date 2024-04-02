<?php  
function addBinhLuan($noidung_binhluan,$id_user,$id_sanpham,$ngaybinhluan){
    $sql = "INSERT INTO binhluan (noidung_binhluan,id_user,id_sanpham,ngaybinhluan) VALUES ('$noidung_binhluan','$id_user','$id_sanpham','$ngaybinhluan')";
    pdo_execute($sql);
}
function getBinhLuan($idsp){
 $sql  = "SELECT * FROM binhluan  JOIN sanpham ON binhluan.id_sanpham = sanpham.id_sanpham JOIN users ON binhluan.id_user = users.id_user WHERE sanpham.id_sanpham = '$idsp'";   
 $getBinhLuan = pdo_query($sql);
 return $getBinhLuan;
}
function getAllBinhLuan(){
    $sql  = "SELECT * FROM binhluan  JOIN sanpham ON binhluan.id_sanpham = sanpham.id_sanpham JOIN users ON binhluan.id_user = users.id_user ";   
    $getAllBinhLuan = pdo_query($sql);
    return $getAllBinhLuan;
   }
?>