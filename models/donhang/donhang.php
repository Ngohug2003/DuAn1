<?php  
function taodonhang($username_user,$diachi_user,$phone_user,$email_user,$tongtien_donhang,$madh,$ngaydathang,$phuongthucthanhtoan)
{
    $sql = "INSERT INTO bill_order (order_name, order_diachi, order_phone, order_email,tongtienthanhtoan,madh,ngaydathang,phuongthucthanhtoan)
            VALUES ('$username_user','$diachi_user','$phone_user','$email_user','$tongtien_donhang','$madh','$ngaydathang','$phuongthucthanhtoan');";
            return pdo_LastInsertId($sql);
          
   
}
  // array($id_sanpham, $quantity, $name_sanpham, $gia_sanpham, $image_sanpham);
//   itemcart($iddh,$madh,$cart[0],$cart[2],$cart[3],$cart[4],$cart[1]);
function itemcart($id_user,$iddh,$id_sanpham,$madh,$quantitynew,$gia_sanpham,$name_sanpham,$image_sanpham){
    $sql = "INSERT INTO bill_cart (id_user,id_order ,id_sanpham ,madh,soluong,dongia,name_sanpham,image_sanpham)
    VALUES ('$id_user','$iddh','$id_sanpham','$madh','$quantitynew','$gia_sanpham','$name_sanpham','$image_sanpham');";
    pdo_execute($sql);
}



?>