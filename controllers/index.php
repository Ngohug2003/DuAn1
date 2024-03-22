<?php
session_start();
ob_start();
include "./models/connect.php";
include "./models/user/taikhoan.php";
include "./models/sanpham/list_sanpham.php";
include "./models/danhmuc/listDanhMuc.php";
include "./views/header.php";
$sanpham = getListSanPham();
$listsanpham = getListSanPham_noibat();
$danhmuc = getListDanhMuc();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'login_signUp':

            include "./views/dangnhap.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $check_user = check_user($username, $password);
                if (is_array($check_user)) {
                    $_SESSION['username'] = $check_user;
                    // check role để vào admin 
                    if ($check_user['role'] == 1) {
                        header('Location:admin/index_admin.php');
                    } else {
                        header('Location:index.php');
                    }
                } else {
                    $thongbao = "<script>alert('Username hoặc password không chính xác! Vui lòng kiểm tra lại.')</script>";
                }
            }
            include "./views/dangnhap.php";
            break;
        case 'dangxuat':
            dangxuat();
            include "./views/home.php";
            break;

        case 'dangky':
            $error =  [];
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email= $_POST['email'];
                $password_confirm = $_POST['password_confirm'];
                if (empty($username)) {
                    $error['username'] = 'Vui lòng nhập tài khoản';
                }
                if (empty($password)) {
                    $error['password'] = 'Vui lòng nhập password';
                }
                if (empty($email)) {
                    $error['email'] = 'Vui lòng nhập email';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // filter_var đi cùng với những hàm validate có sẵn trong php
                    $error['email'] = 'Email không đúng định dạng';
                }elseif ($password != $password_confirm){
                    $error['password_confirm'] = 'Mật khẩu nhập lại không khớp';
                }
                if(check_username($username)){
                    $error['username'] = 'Tài khoản đã tồn tại';
                }
                if (!$error) {
                    addUser($username, $password,$email);
                    $thongbao = "<script language='javascript'>alert('Đăng kí tài khoản thành công')
                        window.location='index.php?act=dangnhap';</script>";
                }
            }
            include "./views/dangnhap.php";
            break;
        case 'timkiem':
            if (isset($_POST['keyword']) && $_POST['keyword'] != 0) {
                $keyword = $_POST['keyword'];
            } else {
                $keyword = "";
            }
            if (isset($_GET['id_danhmuc']) && ($_GET['id_danhmuc'] > 0)) {
                $id_danhmuc = $_GET['id_danhmuc'];
                // $listsp= loadall_sanpham_dm();
            } else {
                $id_danhmuc = 0;
            }
            $dssp = search_sanpham($keyword, $id_danhmuc);
            include "./views/search_sanpham.php";
            break;
        case 'chitietsanpham':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $chitietSanPham = getOneSanPham($_GET['idsp']);
                $SanPhamCungLoai = getSanPham_DanhMuc($_GET['idsp'], $chitietSanPham['id_danhmuc']);
                include "./views/chitietsp.php";
            } else {
                include "./views/home.php";
            }


            break;


        default:
            include "./views/home.php";
            break;
    }
} else {
    include "./views/home.php";
}
include "./views/footer.php";
