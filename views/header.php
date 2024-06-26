<?php

$hideSlideshow = false; // Mặc định hiển thị slideshow

// Kiểm tra nếu tham số act là dangnhap
if (isset($_GET['act']) && ($_GET['act'] == 'dangnhap' || $_GET['act'] == 'chitietsanpham' || $_GET['act'] == 'dangky' || $_GET['act'] == 'user' || $_GET['act'] == 'quenmk'  || $_GET['act'] == 'addToCart' || $_GET['act'] == 'donhang' || $_GET['act'] == 'thanhtoan' ) ) {
    $hideSlideshow = true; // Ẩn slideshow
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DAM COMPUTER</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon " type="image/png" href="./views/assets/img/logo/logo_computer.png">

    <!-- CSS 
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="./views/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="./views/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="./views/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="./views/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="./views/assets/css/font.awesome.css">
    <!--ionicons min css-->
    <link rel="stylesheet" href="./views/assets/css/ionicons.min.css">
    <!--material design min css-->
    <link rel="stylesheet" href="./views/assets/css/material.design.min.css">
    <!--animate css-->
    <link rel="stylesheet" href="./views/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="./views/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="./views/assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="./views/assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="./views/assets/css/style.css">

    <!--modernizr min js here-->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <link rel="stylesheet" href="./views/assets/css/font.awesome.css">

 

</head>

<body>

    <header>
        <div style="background-color: #D4F6FF;" class="main_header">
            <div style="background-color: #D4F6FF;" class="header_container sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="index.php"><img style="height: 60px;" src="./views/assets/img/logo/logo_computer.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="header_container_right">
                                <!--main menu start-->
                                <div class="main_menu menu_position">
                                    <nav>
                                        <ul>
                                            <li><a href="index.php">Trang Chủ</a>

                                            </li>
                                            <li><a href="index.php?act=sanpham">Sản Phẩm</a>
                                              
                                            </li>
                                            <li><a href="#">Tin tức</a>
                                            </li>
                                            <li><a href="index.php?act=gioithieu">Giới Thiệu</a></li>
                                            <li><a href="index.php?act=lienhe">Liên Hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!--main menu end-->
                                <div class="header_right_info">
                                    <ul>
                                        <li class="search_box"><a href="javascript:void(0)"><img src="./views/assets/img/icon/icon-search.png" alt=""></a>
                                            <div class="search_widget">
                                                <form action="index.php?act=sanpham" method="post">
                                                    <input name="keyword" placeholder="Tìm kiếm sản phẩm.." type="text">
                                                    <button name="search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </li>
                                        <li class="header_account"><a href="javascript:void(0)"><img src="./views/assets/img/icon/icon-account.png" alt=""></a>
                                            <div class="dropdown_account">
                                                <div class="dropdown_account-list">
                                                    <ul>
                                                        <li>
                                                            <?php
                                                            if (isset($_SESSION['username'])) {
                                                                extract($_SESSION['username']);
                                                                echo '<a href="index.php?act=user&id_user=' . $id_user . '">' . $username_user . '</a>';
                                                            }
                                                            else {
                                                            ?>
                                                        <li class="nav-item me-3"><a href="index.php?act=dangnhap">Login</a></li>
                                                    <?php
                                                            }
                                                    ?>

                                        </li>
                                        <li><a href="index.php?act=giohang">Giỏ Hàng</a></li>
                                        <li><a href="index.php?act=dangxuat">Logout</a></li>

                                    </ul>

                                </div>
                            </div>
                            </li>
                            <li class="mini_cart_wrapper"><a href="index.php?act=giohang"><img src="./views/assets/img/icon/icon-cart.png" alt=""> <span class="item_count"></span></a>
                                <!--mini cart-->
                                <!--mini cart end-->

                            </li>
                            <?php
                            if (isset($_SESSION['username'])) {

                                echo '';
                            } else {
                            ?>
                                <li class="logina">
                                    <a href="index.php?act=dangnhap"><i class="bi bi-person-circle fs-3 mt-2"></i></a>
                                </li>
                            <?php
                            }
                            ?>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
    <!--header area end-->

    <!--slider area start-->
    <?php if (!$hideSlideshow) : ?>
        <section class="slider_section">
            <div class="slider_area slider_one_area owl-carousel">
                <div class="single_slider d-flex align-items-center" data-bgimg="./views/assets/img/slider/banner_mackook.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-7">
                                <div class="slider_content content_left">
                                    <!-- <h1 style="color:#ffff"> Perfect fitting custom</h1>
                                    <h2 style="color:#ffff">Men's suits & shirts</h2>
                                    <a class="button" href="shop.html">đọc thêm</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="single_slider single_slider2 d-flex align-items-center" data-bgimg="./views/assets/img/slider/banner_mackook.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 offset-lg-5 col-md-7 offset-md-5 col-sm-7 offset-sm-5">
                                <div class="slider_content content_right">
                                    <!-- <h1 style="color:#ffff"> Bayern Lookbook</h1>
                                    <h2>30% of all Women's</h2>
                                    <a class="button" href="shop.html">đọc thêm</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--slider area end-->
    <?php endif ?>