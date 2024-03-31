<?php
session_start();
ob_start();
include "./models/connect.php";
include "./models/user/taikhoan.php";
include "./models/sanpham/list_sanpham.php";
include "./models/danhmuc/listDanhMuc.php";
include "./models/binhluan/binhluan.php";
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
        case 'user':
            if (isset($_GET['id_user']) && $_GET['id_user'] > 0) {
                $one_user = getOneUser($_GET['id_user']);
            }

            if (isset($_POST['luu_thongtin']) && $_POST['luu_thongtin']) {
                $password_user = $_POST['password_user'];
                $fullname_user = $_POST['fullname_user'];
                $phone_user = $_POST['phone_user'];
                $email_user = $_POST['email_user'];
                $diachi_user = $_POST['diachi_user'];
                $filename = $_FILES['image_user']['name'];
                $target_dir = "./views/assets/img/avatar/";
                $target_file = $target_dir . basename($_FILES['image_user']['name']);
                if (empty($filename)) {
                    $error['image_user'] = "chưa có ảnh";
                } else {
                    move_uploaded_file($_FILES["image_user"]["tmp_name"], $target_file);
                    updateUser($id_user, $username_user, $password_user, $fullname_user, $phone_user, $email_user, $diachi_user,$filename, $role);
                    echo "<script language='javascript'>alert('Cập nhật tài khoản thành công');</script>";
                }
            }
            include "./views/user.php";
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
                        header('Location:controllers/admin/index_admin.php');
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
                $email = $_POST['email'];
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
                } elseif ($password != $password_confirm) {
                    $error['password_confirm'] = 'Mật khẩu nhập lại không khớp';
                }
                if (check_username($username)) {
                    $error['username'] = 'Tài khoản đã tồn tại';
                }
                if (!$error) {
                    addUser($username, $password, $email);
                    $thongbao = "<script language='javascript'>alert('Đăng kí tài khoản thành công')
                        window.location='index.php?act=dangnhap';</script>";
                }
            }
            include "./views/dangnhap.php";
            break;
        case 'quenmk':
            if (isset($_POST['quenmk']) && $_POST['quenmk']) {
                $email_user = $_POST['email_user'];
                $checkemail = check_user_email($email_user);
                if (is_array($checkemail)) {
                    $showmk = "Mật khẩu của bạn là :" . $checkemail['password_user'];
                } else {
                    $showmk = "EMail không tồn tại";
                }
            }
            include "./views/quenmk.php";
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
                $getBinhLuan = getBinhLuan($_GET['idsp']);
                $SanPhamCungLoai = getSanPham_DanhMuc($_GET['idsp'], $chitietSanPham['id_danhmuc']);
                include "./views/chitietsp.php";
            } else {
                include "./views/home.php";
            }


            break;
        case 'binhluan':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $chitietSanPham = getOneSanPham($_GET['idsp']);
                $SanPhamCungLoai = getSanPham_DanhMuc($_GET['idsp'], $chitietSanPham['id_danhmuc']);
                
                if(isset($_POST['luu_binhluan']) && ($_POST['luu_binhluan'])){
                    $noidung_binhluan = $_POST['noidung_binhluan'];
                    $id_sanpham = $_GET['idsp'];
                    $ngaybinhluan = $_POST['ngaybinhluan'];
                    
                        addBinhLuan($noidung_binhluan,$id_user,$id_sanpham,$ngaybinhluan);
                       header('location:index.php?act=chitietsanpham&idsp='.$id_sanpham);
                        
                 
                }

                include "./views/chitietsp.php";
            } 
            include "./views/chitietsp.php";
            break;
            // giỏ hàng 
            // 
        case 'giohang':
            if(isset($_POST['addgiohang'])  && $_POST['addgiohang']){
                $quantity = $_POST['quantity'];
                $name_sanpham = $_POST['name_sanpham'];
                $gia_sanpham = $_POST['gia_sanpham'];
                $image_sanpham = $_POST['image_sanpham'];

                

            }
            include "./views/giohang.php";
            break;
        default:
            include "./views/home.php";
            break;
    }
} else {
    include "./views/home.php";
}
include "./views/footer.php";
