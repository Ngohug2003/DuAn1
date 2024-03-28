<?php
session_start();
ob_start();
include ".././../global.php";
include "../../models/connect.php";
include "../../models/user/taikhoan.php";
include "../../models/sanpham/list_sanpham.php";
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
                $thongbao = "Cập nhật thành công"; // Success message
                // Set JavaScript variable containing the success message
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
    }
} else {
    include "../admin/home.php";
}

include "../admin/footer.php";

