<?php
session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];
ob_start();
include "./models/connect.php";
include "./models/pdo.php";
include "./models/user/taikhoan.php";
include "./models/sanpham/list_sanpham.php";
include "./models/danhmuc/listDanhMuc.php";
include "./models/binhluan/binhluan.php";
include "./models/donhang/donhang.php";
include "./models/thongke/thongke.php";
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
                $listDonHang =  load_bill_orde_all($_SESSION['username']['id_user']);
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
                // if (empty($filename)) {
                //     $error['image_user'] = "chưa có ảnh";
                // } else {
                //     move_uploaded_file($_FILES["image_user"]["tmp_name"], $target_file);
                //     updateUser($id_user, $username_user, $password_user, $fullname_user, $phone_user, $email_user, $diachi_user, $filename, $role);
                //     echo "<script language='javascript'>alert('Cập nhật tài khoản thành công');</script>";
                // }
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
        case 'sanpham':
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

            // phân trang 
           
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

                if (isset($_POST['luu_binhluan']) && ($_POST['luu_binhluan'])) {
                    $noidung_binhluan = $_POST['noidung_binhluan'];
                    $id_sanpham = $_GET['idsp'];
                    $ngaybinhluan = $_POST['ngaybinhluan'];

                    addBinhLuan($noidung_binhluan, $id_user, $id_sanpham, $ngaybinhluan);
                    header('location:index.php?act=chitietsanpham&idsp=' . $id_sanpham);
                }
                include "./views/chitietsp.php";
            }
            include "./views/chitietsp.php";
            break;
            // giỏ hàng 
            //
        case 'giohang':

            include "./views/giohang.php";
            break;
        case 'addToCart':
            if (isset($_POST['addgiohang']) && $_POST['addgiohang']) {
                $id_sanpham  = $_POST['id_sanpham'];
                $quantity = $_POST['quantity'];
                $name_sanpham = $_POST['name_sanpham'];
                $gia_sanpham = $_POST['gia_sanpham'];
                $image_sanpham = $_POST['image_sanpham'];

                // Kiểm tra xem giỏ hàng đã được khởi tạo chưa
                if (isset($_SESSION['giohang'])) {
                    $found = false;
                    // Duyệt qua từng sản phẩm trong giỏ hàng
                    foreach ($_SESSION['giohang'] as &$item) {
                        if ($item[2] === $name_sanpham) {
                            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                            $item[1] += $quantity;
                            $found = true;
                            break;
                        }
                    }
                    unset($item); // Loại bỏ reference sau khi vòng lặp kết thúc

                    // Nếu sản phẩm không tồn tại trong giỏ hàng, thêm mới sản phẩm vào giỏ hàng
                    if (!$found) {
                        $_SESSION['giohang'][] = array($id_sanpham, $quantity, $name_sanpham, $gia_sanpham, $image_sanpham);
                    }
                } else {
                    // Nếu giỏ hàng chưa được khởi tạo, tạo mới giỏ hàng và thêm sản phẩm vào đó
                    $_SESSION['giohang'][] = array($id_sanpham, $quantity, $name_sanpham, $gia_sanpham, $image_sanpham);
                }
            }
            include "./views/giohang.php";
            break;
        case 'giohang':

            include "./views/giohang.php";
            break;
        case 'addToCart':
            if (isset($_POST['addgiohang']) && $_POST['addgiohang']) {
                $id_sanpham  = $_POST['id_sanpham'];
                $quantity = $_POST['quantity'];
                $name_sanpham = $_POST['name_sanpham'];
                $gia_sanpham = $_POST['gia_sanpham'];
                $image_sanpham = $_POST['image_sanpham'];

                // Kiểm tra xem giỏ hàng đã được khởi tạo chưa
                if (isset($_SESSION['giohang'])) {
                    $found = false;
                    // Duyệt qua từng sản phẩm trong giỏ hàng
                    foreach ($_SESSION['giohang'] as &$item) {
                        if ($item[2] === $name_sanpham) {
                            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                            $item[1] += $quantity;
                            $found = true;
                            break;
                        }
                    }
                    unset($item); // Loại bỏ reference sau khi vòng lặp kết thúc

                    // Nếu sản phẩm không tồn tại trong giỏ hàng, thêm mới sản phẩm vào giỏ hàng
                    if (!$found) {
                        $_SESSION['giohang'][] = array($id_sanpham, $quantity, $name_sanpham, $gia_sanpham, $image_sanpham);
                    }
                } else {
                    // Nếu giỏ hàng chưa được khởi tạo, tạo mới giỏ hàng và thêm sản phẩm vào đó
                    $_SESSION['giohang'][] = array($id_sanpham, $quantity, $name_sanpham, $gia_sanpham, $image_sanpham);
                }
            }
            include "./views/giohang.php";
            break;
        case 'capnhapsl':
            if (isset($_POST['updateSL']) && $_POST['updateSL']) {
                $newquantity = $_POST['newquantity'];
                $id_sanpham = $_POST['id_sanpham'];
                if (isset($_SESSION['giohang'])) {
                    // Duyệt qua từng sản phẩm trong giỏ hàng
                    foreach ($_SESSION['giohang'] as &$item) {
                        if ($item[0] === $id_sanpham) {
                            // Cập nhật số lượng sản phẩm
                            $item[1] = $newquantity;
                            break;
                        }
                    }
                    unset($item); // Loại bỏ reference sau khi vòng lặp kết thúc
                }

                // Redirect hoặc thực hiện các xử lý khác sau khi cập nhật giỏ hàng
                // Ví dụ:
                header("Location: index.php?act=giohang");
                exit();
            }
            include "./views/giohang.php";
            break;
        case 'thanhtoan':

            if (isset($_POST['thanhtoan']) && $_POST['thanhtoan']) {
                // $id_user = $_POST['id_user'];
                if (isset($_SESSION['username'])) $iduser = $_SESSION['username']['id_user'];
                else $id_user = 0;
                $tongtien_donhang = $_POST['tongtien_donhang'];
                $fullname_user = $_POST['fullname_user'];
                $diachi_user = $_POST['diachi_user'];
                $phone_user = $_POST['phone_user'];
                $email_user = $_POST['email_user'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydathang = date('Y-m-d H:i:s');


                $madh = "DAM" . rand(0, 9999999);
                $quantitynew = $_POST['quantitynew'];
                $phuongthucthanhtoan = $_POST['phuongthucthanhtoan'];
                // var_dump($fullname_user);
                $iddh = taodonhang($iduser, $fullname_user, $diachi_user, $phone_user, $email_user, $tongtien_donhang, $madh, $ngaydathang, $phuongthucthanhtoan);
                // array($id_sanpham, $quantity, $name_sanpham, $gia_sanpham, $image_sanpham);

                foreach ($_SESSION['giohang'] as $cart) {
                    itemcart($_SESSION['username']['id_user'], $iddh, $cart[0], $madh, $quantitynew, $cart[3], $cart[2], $cart[4]);
                }
                unset($_SESSION['giohang']);
                $thongbao = "<script>alert('Đặt hàng thành công, vui lòng đợi xác nhận đơn hàng!'); window.location.href = 'index.php?act=user&id_user=" . $iduser . "';</script>";
            }
            include "./views/thanhtoan.php";
            break;

        case 'donhang':
            // $listDonHang =  load_bill_order($_SESSION['username']['id_user']); 
            if (isset($_GET['id_donhang']) && ($_GET['id_donhang'] > 0)) {
                $listCart =  load_bill_cart($_GET['id_donhang']);
                $listDonHang =  load_bill_order($_SESSION['username']['id_user']);
            }
            include "./views/donhang.php";
            break;

        case 'huydonhang':
            // $listDonHang =  load_bill_order($_SESSION['username']['id_user']); 

            if (isset($_GET['id_donhang']) && $_GET['id_donhang'] > 0) {
                $id_donhang = $_GET['id_donhang'];
                delete_order_user($id_donhang);
                if (isset($_SESSION['username'])) $iduser = $_SESSION['username']['id_user'];
                header("Location: index.php?act=user&id_user=" . $iduser);
                exit();
                // $listCart =  load_bill_cart($_GET['id_donhang']);
                $listDonHang =  load_bill_order($_SESSION['username']['id_user']);
            }
            include "./views/donhang.php";
            break;


            // xóa giỏ hàng 
        case 'delToCart':
            if (isset($_GET['i']) && ($_GET['i'] > 0)) {
                if (count($_SESSION['giohang']) > 1) {
                    array_splice($_SESSION['giohang'], $_GET['i'], 1);
                    header('location:index.php?act=giohang');
                } else {
                    unset($_SESSION['giohang']);
                    header('location:index.php?act=giohang');
                }
            } else {
                if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
                header('location:index.php?act=giohang');
            }

            // include "./views/giohang.php";
            break;
            // thống kê
           
        default:
            include "./views/home.php";
            include "./views/header.php";
            break;
    }
} else {
    include "./views/home.php";
}
include "./views/footer.php";
