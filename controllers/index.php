<?php
session_start();
ob_start();
include "../models/connect.php";
include "../models/user/taikhoan.php";
include "../views/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangnhap':
            if(isset($_POST['dangnhap']) && $_POST['dangnhap']){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $check_user = check_user($username,$password);
                if(is_array($check_user)){
                    $_SESSION['username'] = $check_user;
                    // check role để vào admin 
                    if($check_user['role'] == 1){
                        header('Location:admin/index.html');
                    }else{
                        header('Location:index.php');
                    }
                }else{
                    $thongbao = "<script>alert('Username hoặc password không chính xác! Vui lòng kiểm tra lại.')</script>";
                }
                
            }
            include "../views/dangnhap.php";
            break;
            case 'dangxuat':
                dangxuat();
                include "../views/home.php";
                break;

        case 'dangki':
            include "../views/dangki.php";
            break;

        default:
           include "../views/home.php";
            break;
    }
} else {
    include "../views/home.php";
}
include "../views/footer.php";
