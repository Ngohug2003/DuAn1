<?php
include "./header.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangnhap':
            include "./dangnhap.php";
            break;
        case 'dangki':
            include "./dangki.php";
            break;

        default:
            # code...
            break;
    }
} else {
    include "./home.php";
}
include "./footer.php";
