<?php
session_start();
ob_start();
include "../models/connect.php";
include "../models/user/taikhoan.php";
include "../models/sanpham/list_sanpham.php";
include "../views/header.php";
$sanpham = getListSanPham();
$listsanpham = getListSanPham_noibat();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $check_user = check_user($username, $password);
                if (is_array($check_user)) {
                    $_SESSION['username'] = $check_user;
                    // check role để vào admin 
                    if ($check_user['role'] == 1) {
                        header('Location:admin/index.html');
                    } else {
                        header('Location:index.php');
                    }
                } else {
                    $thongbao = "<script>alert('Username hoặc password không chính xác! Vui lòng kiểm tra lại.')</script>";
                }
            }
            include "../views/dangnhap.php";
            break;
        case 'dangxuat':
            dangxuat();
            include "../views/home.php";
            break;

        case 'dangky':
            $error =  [];
            if(isset($_POST['dangky']) && $_POST['dangky']){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $passowrd_comfirm = $_POST['passowrd_comfirm'];

                if(empty($username)){
                    $error['username'] = "vui lòng nhập tài khoản";
                }
                if(empty($password)){
                    $error['password'] = "vui lòng nhập mật khẩu";
                }
                if($password != $passowrd_comfirm ){
                    $error = "Mật khẩu không khớp";
                }
                if(!$error){
                    addUser($username, $password);
                    $thongbao = "<script language='javascript'>alert('Đăng kí tài khoản thành công')
                        window.location='index.php?act=dangnhap';</script>";
                }

            }
            include "../views/dangky.php";
            break;
        case 'timkiem':
            if (isset($_POST['keyword']) && $_POST['keyword'] != 0) {
                $keyword = $_POST['keyword'];
            } else {
                $keyword = "";
            }
            // if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)) {
            //     $id_danhmuc = $_GET['id_danhmuc'];
            //     // $listsp= loadall_sanpham_dm();
            // } else {
            //     $id_danhmuc = 0;
            // }
            $dssp_search = search_sanpham($keyword);
            include "../views/search_sanpham.php";
            break;


        default:
            include "../views/home.php";
            break;
    }
} else {
    include "../views/home.php";
}
include "../views/footer.php";
