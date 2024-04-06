<?php
session_start();
ob_start();
<<<<<<< HEAD

=======
// include ".././../global.php";
>>>>>>> 862d1095f1325d4628ae5a2ae8a181eb230b025b
include "../../models/connect.php";
include "../../models/user/taikhoan.php";
include "../../models/sanpham/list_sanpham.php";
include "../../models/binhluan/binhluan.php";
include "../../models/danhmuc/listDanhMuc.php";
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
                } else {
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
                update_danhmuc($id_danhmuc, $name_danhmuc);
                $dm = loadone_danhmuc($id_danhmuc);
                $thongbao = "Cập nhật thành công"; 
                echo "<script>var successMessage = '$thongbao';</script>";
            }
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
                } else {
                    if (!is_numeric($gia_sanpham) || $sanpham <= 0 || floor($gia_sanpham) != $gia_sanpham) {
                        $error['gia_sanpham']['required'] = "Giá tiền phải nguyên dương";
                    }
                }
                if (empty($filename)) {
                    $error['image_sanpham'] = "chưa upload";
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
<<<<<<< HEAD
            if (isset($_POST['update']) && ($_POST['update'])) {
               $name_sanpham = $_POST['name_sanpham'];
               $id_sanpham = $_POST['id_sanpham'];
               $gia_sanpham = $_POST['gia_sanpham'];
               $subtitle_sanpham = $_POST['subtitle_sanpham'];
               $description_sanpham = $_POST['description_sanpham'];
               //update 
               $filename = $_FILES['image_sanpham']['name'];
               $target_dir = "../../views/assets/img/product/";
               $target_file = $target_dir . basename($_FILES['image_sanpham']['name']);
               if (empty($filename)) {
                   update_sanpham($id_sanpham, $name_sanpham, $gia_sanpham, $subtitle_sanpham, $description_sanpham,);
                   $thongbao = "Sua thanh cong";
               }
               else if (move_uploaded_file($_FILES["image_sanpham"]["tmp_name"], $target_file)) {
                       update_sanpham($id_sanpham, $name_sanpham, $gia_sanpham, $subtitle_sanpham, $description_sanpham,);
                       $thongbao = "<script>alert('Update sản phẩm thanh công'); window.location.href = 'index_admin.php?act=sanpham';</script>";   
                   }
               else {
                   $thongbao  = "Sua khong thanh cong";
               }
               
            }
            $sanpham = getListSanPham();
            include "./danhsach/sanpham.php";
            break;
=======
            if (isset($_POST['update_sanpham']) && ($_POST['update_sanpham'])) {
                $id_sanpham = $_POST['id_sanpham'];
                $name_sanpham = $_POST['name_sanpham'];
                $gia_sanpham = $_POST['gia_sanpham'];
                $subtitle_sanpham = $_POST['subtitle_sanpham'];
                $description_sanpham = $_POST['description_sanpham'];
                $danhmuc = $_POST['danhmuc'];
                $image_sanpham = $_POST['image_sanpham'];
                $filename = $_FILES['image_sanpham']['name'];
                $target_dir = "../../views/assets/img/product/";
                $target_file = $target_dir . basename($_FILES['image_sanpham']['name']);
                update_sanpham($id_sanpham,$name_sanpham, $gia_sanpham, $filename, $subtitle_sanpham, $description_sanpham, $danhmuc);
                    $thongbao = "Thêm thành công";
                }
            
            $sanpham = getListSanPham();
            include "../admin/danhsach/sanpham.php";
>>>>>>> 862d1095f1325d4628ae5a2ae8a181eb230b025b
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
                if(check_username($username_user)){
                    $error['username_user'] = 'Tài khoản đã tồn tại';
                }
                if (!$error) {
                    move_uploaded_file($_FILES["image_user"]["tmp_name"], $target_file);
                    addAllUser($username_user, $password_user, $fullname_user, $phone_user, $email_user, $diachi_user,$filename, $role);
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
                if (empty($filename)) {
                    $error['image_user'] = "chưa có name";
                } else {
                    move_uploaded_file($_FILES["image_user"]["tmp_name"], $target_file);
                    updateUser($id_user,$username_user, $password_user,$fullname_user,$phone_user,$email_user,$diachi_user,$filename,$role);
                    echo "<script language='javascript'>alert('Cập nhật tài khoản thành công');</script>";
                }
            }
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
    }
} else {
    include "../admin/home.php";
}

include "../admin/footer.php";

