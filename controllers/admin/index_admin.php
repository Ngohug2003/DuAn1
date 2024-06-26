<?php
session_start();
ob_start();

// include ".././../global.php";
include "../../models/connect.php";
include "../../models/pdo.php";
include "../../models/user/taikhoan.php";
include "../../models/sanpham/list_sanpham.php";
include "../../models/binhluan/binhluan.php";
include "../../models/danhmuc/listDanhMuc.php";
include "../../models/donhang/donhang.php";
include "../../models/thongke/thongke.php";
include "../admin/header.php";
$danhmuc =  getListDanhMuc();
$sanpham = getListSanPham();
$listsanpham = getListSanPham_noibat();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'danhmuc':
            $danhmuc =  getListDanhMuc();
            include "./danhmuc/danhmuc.php";
            break;
        case 'sanpham':
            $sanpham = getListSanPham();
            include "./danhsach/sanpham.php";
            break;

            // thêm danh mục
        case 'adddm':
            $error = [];
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $name_danhmuc = $_POST['name_danhmuc'];
                // Gọi hàm
                if ((empty($name_danhmuc))) {
                    $error['name_danhmuc'] = "Vui lòng nhập danh mục";
                }
                if(check_danhmuc($name_danhmuc)){
                    $error['name_danhmuc'] = "Không được trùng tên danh mục";
                }
                if(!$error){
                    insert_danhmuc($name_danhmuc);
                    $thongbao = "<script language='javascript'>alert('Thêm danh mục thành công');
                    window.location='index_admin.php?act=adddm';</script>";
                }
            }
            include "../admin/danhmuc/add_danhmuc.php";
            break;

            // xóa danh mục
        case 'delete':

            if (isset($_GET['id_danhmuc']) && $_GET['id_danhmuc'] > 0) {
                delete_danhmuc($_GET['id_danhmuc']);
            }
            $danhmuc =  getListDanhMuc();
            include "../admin/danhmuc/danhmuc.php";
            break;

            // gọi danh mục 
        case 'update_detail':
            if (isset($_GET['id_danhmuc']) && $_GET['id_danhmuc'] > 0) {
                $dm = loadone_danhmuc($_GET['id_danhmuc']);
            }
            include "../admin/danhmuc/edit.php";
            break;

            // update danh mục 
        case 'update':
            $error = [];
            if (isset($_POST['update']) && ($_POST['update'])) {
                $name_danhmuc = $_POST['name_danhmuc'];
                $id_danhmuc = $_POST['id_danhmuc'];

                if ((empty($name_danhmuc))) {
                    $error['name_danhmuc'] = "Vui lòng nhập danh mục";
                }
                if(check_danhmuc($name_danhmuc)){
                    $error['name_danhmuc'] = "Không được trùng tên danh mục";
                }
                if(!$error){
                    update_danhmuc($id_danhmuc, $name_danhmuc);
                    $dm = loadone_danhmuc($id_danhmuc);
                    $thongbao = "Cập nhật thành công";
                    echo "<script>var successMessage = '$thongbao';</script>";
                }
               
            }
            $dm = loadone_danhmuc($id_danhmuc);
            $danhmuc =  getListDanhMuc();
            include "../admin/danhmuc/edit.php";
            break;


            // end danh mục


            // bắt đầu sản phẩm  

        case 'sanpham':
            $sanpham = getListSanPham();
            include "./danhsach/sanpham.php";
            break;
        case 'add_sanpham':
            $error = [];
            if (isset($_POST['themsp']) && ($_POST['themsp'])) {
                $name_sanpham = $_POST['name_sanpham'];
                $gia_sanpham = $_POST['gia_sanpham'];
                $subtitle_sanpham = $_POST['subtitle_sanpham'];
                $description_sanpham = $_POST['description_sanpham'];
                $id = $_POST['id'];
                $filename = $_FILES['image_sanpham']['name'];
                $target_dir = "../../views/assets/img/product/";
                $target_file = $target_dir . basename($_FILES['image_sanpham']['name']);
                if (empty(trim($name_sanpham))) {
                    $error['name_sanpham']['required'] = "Không được bỏ trống tên sản phẩm ";
                } else {
                    if (strlen(trim($name_sanpham)) <  5) {
                        $error['name_sanpham']['required'] = "Sản phấm không dưới 5 kí tự";
                    }
                }
                if (empty($gia_sanpham)) {
                    $error['gia_sanpham']['required'] = "Không được bỏ trống giá";
                } 
                if (!is_numeric($gia_sanpham) || $gia_sanpham <= 0 || floor($gia_sanpham) != $gia_sanpham) {
                    $error['gia_sanpham']['required'] = "Giá tiền phải nguyên dương";
                }        
                if (empty($filename)) {
                 $error['image_sanpham']['required']  = "Chưa upload ảnh sản phẩm";
                } else {
                    if (move_uploaded_file($_FILES["image_sanpham"]["tmp_name"], $target_file)) {
                    } else {
                    }
                    add_sanpham($name_sanpham, $gia_sanpham, $filename, $subtitle_sanpham, $description_sanpham, $id);
                    $thongbao = "Thêm thành công";
                }
            }
            $danhmuc =  getListDanhMuc();
            include "./danhsach/add_sanpham.php";
            break;
        case 'delete_sanpham':
            if (isset($_GET['id_sanpham']) && $_GET['id_sanpham'] > 0) {
                delete_sanpham($_GET['id_sanpham']);
                echo '<script>alert("Xóa sản phẩm thành công!");</script>';
            }
            $sanpham = getListSanPham();
            include "./danhsach/sanpham.php";
            break;
        case 'detail_sanpham':
            if (isset($_GET['id_sanpham']) && $_GET['id_sanpham'] > 0) {
                $one_sp  = getOneSanPham($_GET['id_sanpham']);
            }
            $danhmuc =  getListDanhMuc();
            include "./danhsach/detail_sanpham.php";

            break;
        case 'update_sanpham':

            if (isset($_POST['update_sanpham']) && ($_POST['update_sanpham'])) {
                $id_sanpham  = $_POST['id_sanpham'];
                $name_sanpham = $_POST['name_sanpham'];
                $gia_sanpham = $_POST['gia_sanpham'];
                $filename = $_FILES['image_sanpham']['name'];
                $target_dir = "../../views/assets/img/product/";
                $target_file = $target_dir . basename($_FILES['image_sanpham']['name']);
                $subtitle_sanpham = $_POST['subtitle_sanpham'];
                $description_sanpham = $_POST['description_sanpham'];
                $danhmuc = $_POST['danhmuc'];             
                if (!empty($filename)) {
                    // Nếu có, di chuyển tệp mới vào thư mục và cập nhật tên file
                    move_uploaded_file($_FILES["image_sanpham"]["tmp_name"], $target_file);
                } else {
                    // Nếu không, giữ lại ảnh cũ bằng cách sử dụng tên file hiện tại
                    $filename = $_POST['current_image'];
                }
                update_sanpham($id_sanpham, $name_sanpham, $gia_sanpham, $filename, $subtitle_sanpham, $description_sanpham, $danhmuc);
                // $thongbao = "<script>alert('Update sản phẩm thành công!'); window.location.href = 'index_admin.php?act=sanpham';</script>";
                $thongbao = "Cập nhật sản phẩm thành công!";
                // Đưa ra thông báo bằng JavaScript
                echo "<script>alert('$thongbao'); window.location.href = 'index_admin.php?act=detail_sanpham&id_sanpham=$id_sanpham';</script>";
            }

            $sanpham = getListSanPham();
            include "./danhsach/sanpham.php";
            break;
            // end sản phẩm 


            // ----------- user --------------------
        case 'nguoidung':
            $user =  getListUser();
            include "./user/user.php";
            break;
        case 'add_user':
            $error = [];
            if (isset($_POST['themmoi_user']) && ($_POST['themmoi_user'])) {
                $username_user = $_POST['username_user'];
                $password_user = $_POST['password_user'];
                $fullname_user = $_POST['fullname_user'];
                $phone_user = $_POST['phone_user'];
                $email_user = $_POST['email_user'];
                $diachi_user = $_POST['diachi_user'];
                $filename = $_FILES['image_user']['name'];
                $target_dir = "../../views/assets/img/avatar/";
                $target_file = $target_dir . basename($_FILES['image_user']['name']);
                $role = $_POST['role'];
                if (empty($username_user)) {
                    $error['username_user'] = 'Vui lòng nhập tài khoản';
                }
                if (empty($password_user)) {
                    $error['password_user'] = 'Vui lòng nhập password';
                }
                if (empty($email_user)) {
                    $error['email_user'] = 'Vui lòng nhập email';
                } else if (!filter_var($email_user, FILTER_VALIDATE_EMAIL)) { // filter_var đi cùng với những hàm validate có sẵn trong php
                    $error['email_user'] = 'Email không đúng định dạng';
                }
                if (empty($phone_user)) {
                    $error['phone_user'] = 'Vui lòng nhập số điện thoại';
                } else if (!preg_match("/^[0-9]{10,11}$/", $phone_user)) {
                    $error['phone_user'] = 'Số điện thoại không hợp lệ';
                }
                if (check_username($username_user)) {
                    $error['username_user'] = 'Tài khoản đã tồn tại';
                }
                if (!$error) {
                    move_uploaded_file($_FILES["image_user"]["tmp_name"], $target_file);
                    addAllUser($username_user, $password_user, $fullname_user, $phone_user, $email_user, $diachi_user, $filename, $role);
                    echo '<script>alert("Thêm phẩm thành công!");</script>';
                }
            }
            include "./user/add_user.php";
            break;

        case 'delete_user':
            if (isset($_GET['id_user']) && $_GET['id_user'] > 0) {
                deleteUser($_GET['id_user']);
                echo '<script>alert("Xóa thành công!");</script>';
            }
            $user = getListUser();
            include "./user/user.php";
            break;

        case 'detail_user':
            if (isset($_GET['id_user']) && $_GET['id_user'] > 0) {
                $one_user = getOneUser($_GET['id_user']);
            }
            include "./user/detail_user.php";
            break;
        case 'edit_user':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id_user = $_POST['id_user'];
                $username_user = $_POST['username_user'];
                $password_user = $_POST['password_user'];
                $fullname_user = $_POST['fullname_user'];
                $phone_user = $_POST['phone_user'];
                $email_user = $_POST['email_user'];
                $diachi_user = $_POST['diachi_user'];
                $filename = $_FILES['image_user']['name'];
                $target_dir = "../../views/assets/img/avatar/";
                $target_file = $target_dir . basename($_FILES['image_user']['name']);
                $role = $_POST['role'];

                // Kiểm tra xem người dùng có tải lên một tệp mới không
                if (!empty($filename)) {
                    // Nếu có, di chuyển tệp mới vào thư mục và cập nhật tên file
                    move_uploaded_file($_FILES["image_user"]["tmp_name"], $target_file);
                } else {
                    // Nếu không, giữ lại ảnh cũ bằng cách sử dụng tên file hiện tại
                    $filename = $_POST['current_image'];
                }

                // Gọi hàm cập nhật người dùng
                updateUser($id_user, $username_user, $password_user, $fullname_user, $phone_user, $email_user, $diachi_user, $filename, $role);
                echo "<script language='javascript'>alert('Cập nhật tài khoản thành công');</script>";
            }
            // Lấy danh sách người dùng và bao gồm giao diện chỉnh sửa người dùng
            $user = getListUser();
            include "./user/user.php";
            break;


        case 'dsbinhluan':
            $getBinhLuan = getAllBinhLuan();
            include "./binhluan/binhluan.php";
            break;
        case 'delete_binhluan':
            if (isset($_GET['id_binhluan']) && $_GET['id_binhluan'] > 0) {
                delete_binhluan($_GET['id_binhluan']);
                echo '<script>alert("Xóa bình luận thành công!");</script>';
            }
            header('Location: index_admin.php?act=dsbinhluan');
            $getBinhLuan = getAllBinhLuan();
            // include "./binhluan/binhluan.php";
            break;

            // đơn hàng 

        case 'dsDonHang':
            $dsDonHang = loadall_dsDonhang();
            include "./donhang/donhang.php";
            break;
        case 'delete_order':
            if (isset($_GET['id_order']) && $_GET['id_order'] > 0) {
                delete_order($_GET['id_order']);
                echo '<script>alert("Xóa đơn hàngthành công!");</script>';
            }
            header('Location: index_admin.php?act=dsDonHang');
            $dsDonHang = loadall_dsDonhang();
            // include "./binhluan/binhluan.php";
            break;

        case 'chitiet_bill':
            if (isset($_GET['id_donhang']) && ($_GET['id_donhang'] > 0)) {

                $bill_chitiet = bill_chitiet($_GET['id_donhang']);
            }
            include "./donhang/trangthai.php";
            break;
        case 'edit_trangthai':
            if (isset($_POST['trangthai']) && ($_POST['trangthai'])) {
                $id_order = $_POST['id_order'];
                $edit_trangthai = $_POST['edit_trangthai'];
                update_trangthai($id_order, $edit_trangthai);
                $thongbao = "Cập nhật trạng thái thành công!";
                echo "<script>alert('$thongbao'); window.location.href = 'index_admin.php?act=dsDonHang';</script>";
            }
            include "./donhang/trangthai.php";
            break;
            // thống kê 
        case 'thongke':
            $thongke = loadAll_thongke();
            include "./thongke/thongke.php";
            break;
        case 'bieudo':
            $thongke = loadAll_thongke();
            include "./bieudo/bieudo.php";
            break;
        case 'thongke_doanhthu':
            $thongke_doanhthu = loadall_doanhthu();
            include "./thongke/doanhthu.php";
            break;
        case 'bieudo_doanhthu':
            $thongke_doanhthu = loadall_doanhthu();
            include "./bieudo/bieudo_doanhthu.php";
            break;
    }
} else {
    include "../admin/home.php";
}

include "../admin/footer.php";
