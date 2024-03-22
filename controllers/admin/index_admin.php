<?php
session_start();
ob_start();
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
    }
} else {
    include "../admin/home.php";
}

include "../admin/footer.php";
