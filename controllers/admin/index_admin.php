<?php
session_start();
ob_start();
include "../../models/connect.php";
include "../../models/user/taikhoan.php";
include "../../models/sanpham/list_sanpham.php";
include "../../models/danhmuc/listDanhMuc.php";
include "../admin/header.php";
$sanpham = getListSanPham();
$danhmuc =  getListDanhMuc();
$listsanpham = getListSanPham_noibat();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'danhmuc':
            include "./danhmuc/danhmuc.php";
            break;
        case 'sanpham':
            include "./danhsach/sanpham.php";
            break;
    }
} else {
    include "../admin/home.php";
}

include "../admin/footer.php";
