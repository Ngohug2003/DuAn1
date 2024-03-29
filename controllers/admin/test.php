<?php
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