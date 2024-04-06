<?php
function taodonhang($iduser, $username_user, $diachi_user, $phone_user, $email_user, $tongtien_donhang, $madh, $ngaydathang, $phuongthucthanhtoan)
{
    $sql = "INSERT INTO bill_order (id_user,order_name, order_diachi, order_phone, order_email,tongtienthanhtoan,madh,ngaydathang,phuongthucthanhtoan)
            VALUES ('$iduser','$username_user','$diachi_user','$phone_user','$email_user','$tongtien_donhang','$madh','$ngaydathang','$phuongthucthanhtoan');";
    return pdo_LastInsertId($sql);
}
// array($id_sanpham, $quantity, $name_sanpham, $gia_sanpham, $image_sanpham);
//   itemcart($iddh,$madh,$cart[0],$cart[2],$cart[3],$cart[4],$cart[1]);
function itemcart($id_user, $iddh, $id_sanpham, $madh, $quantitynew, $gia_sanpham, $name_sanpham, $image_sanpham)
{
    $sql = "INSERT INTO bill_cart (id_user,id_order ,id_sanpham ,madh,soluong,dongia,name_sanpham,image_sanpham)
    VALUES ('$id_user','$iddh','$id_sanpham','$madh','$quantitynew','$gia_sanpham','$name_sanpham','$image_sanpham');";
    pdo_execute($sql);
}
function load_bill_order($id_user)
{
    $sql = "select * from bill_order where id_user=" . $id_user;
    $list_bill_order = pdo_query($sql);
    return  $list_bill_order;
}
// function load_bill_order($id_user)
// { 
//     $sql = "SELECT * FROM bill_order inner join bill_cart on bill_order.id_order = bill_cart.id_order  WHERE id_user=" . $id_user;
//     // $sql = "SELECT * FROM sanpham inner join danhmuc on sanpham.id_danhmuc = danhmuc.id_danhmuc " ;
//     $list_bill_order = pdo_query($sql);
//     return  $list_bill_order;
// }
function load_bill_cart($id_order)
{
    $sql = "select * from bill_cart where id_order=" . $id_order;
    $list_bill_cartr = pdo_query($sql);
    return  $list_bill_cartr;
}
function trangThaiDonHang($n)
{
    switch ($n) {
        case '0':
            $tt = "Chờ xác nhận";
            break;
        case '1':
            $tt = "Đã xác nhận";
            break;
        case '2':
            $tt = "Đang vận chuyển";
            break;
        case '3':
            $tt = "Giao hàng thành công";
            break;
        default:
            $tt = "Đã xác nhận";
            break;
    }
    return $tt;
}
