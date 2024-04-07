<?php
function taodonhang($iduser, $fullname_user, $diachi_user, $phone_user, $email_user, $tongtien_donhang, $madh, $ngaydathang, $phuongthucthanhtoan)
{
    $sql = "INSERT INTO bill_order (id_user,order_name, order_diachi, order_phone, order_email,tongtienthanhtoan,madh,ngaydathang,phuongthucthanhtoan)
            VALUES ('$iduser','$fullname_user','$diachi_user','$phone_user','$email_user','$tongtien_donhang','$madh','$ngaydathang','$phuongthucthanhtoan');";
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
    $list_bill_order = pdo_query_one($sql);
    return  $list_bill_order;
}
function load_bill_orde_all($id_user)
{
    $sql = "select * from bill_order where id_user=" . $id_user;
    $list_bill_order = pdo_query($sql);
    return  $list_bill_order;
}
function delete_order_user($id_donhang)
{
    $sql = "delete from bill_order where id_order=" . $id_donhang;
    pdo_execute($sql);
   
}
function bill_chitiet($id_order)
{
    $sql = "select * from bill_order where id_order=" . $id_order;
    $list_bill_order = pdo_query($sql);
    return  $list_bill_order;
}
function bill_order()
{
    $sql = "SELECT trangthaidonhang FROM `bill_order`";
    // Thực hiện truy vấn sử dụng pdo_query hoặc hàm tương đương
    $bill_order = pdo_query($sql);
    // rả về kết quả của truy vấn
    return $bill_order;
}

function update_trangthai($id_order,$edit_trangthai){
    $sql = "UPDATE bill_order SET trangthaidonhang = '" . $edit_trangthai . "' WHERE id_order=" . $id_order;      
    pdo_execute($sql); 
}


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
            $tt = "Chờ xác nhận";
            break;
    }
    return $tt;
}
function phuongThucThanhToan($p)
{
    switch ($p) {
        case '1':
            $pttt = "Thanh toán khi nhận hàng";
            break;
        case '2':
            $pttt = "Thanh toán qua thẻ ngân hàng";
            break;
      
        default:
            $pttt = "Thanh toán khi nhận hàng";
            break;
    }
    return $pttt;
}

function loadall_dsDonhang()
{
    $sql = "SELECT * FROM bill_order inner join bill_cart on bill_order.id_order = bill_cart.id_order ";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
}
function delete_order($id_order)
{
    $sql = "DELETE FROM bill_order WHERE id_order = ".$id_order;
    pdo_execute($sql);
}
function getOne_order($id_order){
    $sql = "SELECT * FROM bill_order where id_order =" .$id_order ;
    $getBill = pdo_query_one($sql);
    return $getBill;
}
function loadall_cart($id_donhang){
    // $sql=" SELECT donhangchitiet.id_dhct, donhangchitiet.madh,donhangchitiet.madh, sanpham.name,donhang.tongdonhang,sanpham.price, donhangchitiet.soluong FROM `donhangchitiet` 
    // LEFT JOIN donhang ON donhangchitiet.id_donhang = donhang.id_donhang
    // LEFT JOIN sanpham ON donhangchitiet.id_sp = sanpham.id_sp
    // WHERE  donhang.id_donhang=$id_donhang;";
    // $dh=pdo_query($sql);
    // return  $dh;
    $sql=" SELECT bill_cart.id_cart, bill_cart.madh,sanpham.name_sanpham,sanpham.gia_sanpham, bill_cart.soluong FROM `bill_cart` 
    LEFT JOIN bill_order ON bill_cart.id_cart = bill_order.id_order
    LEFT JOIN sanpham ON bill_cart.id_sanpham = sanpham.id_sanpham
    WHERE  bill_order.id_order=$id_donhang;";
    $dh=pdo_query($sql);
    return  $dh;

}

// function load_bill_order($id_user)
// { 
//     $sql = "SELECT * FROM bill_order inner join bill_cart on bill_order.id_order = bill_cart.id_order  WHERE id_user=" . $id_user;
//     // $sql = "SELECT * FROM sanpham inner join danhmuc on sanpham.id_danhmuc = danhmuc.id_danhmuc " ;
//     $list_bill_order = pdo_query($sql);
//     return  $list_bill_order;
// }
