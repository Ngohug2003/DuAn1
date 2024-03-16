<?php
    $hideSlideshow = false; // Mặc định hiển thị slideshow

    // Kiểm tra nếu tham số act là dangnhap
    if(isset($_GET['act']) && $_GET['act'] == 'dangnhap') {
        $hideSlideshow = true; // Ẩn slideshow
    }
    if(isset($_GET['act']) && $_GET['act'] == 'dangki') {
        $hideSlideshow = true; // Ẩn slideshow
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/lib/bootstrap.min.css">
    <link rel="stylesheet" href="sty/sty.css">
    <script src="assets/lib/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/font-fontawesome-ae333ffef2.js"></script>
    <title>Laptop Shop</title>
</head>
<body>
    <!-- star header  -->
        <div class="container">
            <div>
                <div class="navbar navbar-expand  d-flex justify-content-between ">    
                    <ul class="navbar-nav text-black-50">
                        <li class="nav-item ms-2 link-opacity-100-hover"><a class="nav-link text-black-50" href="#"><i class="fa-solid fa-phone"></i> 09888838111</a></li>
                        <li class="nav-item ms-4"><a class="nav-link text-black-50" href="#"><i class="fa-solid fa-envelope"></i> ngohung@gmail.com</a></li>
                    </ul>
                    <ul class="navbar-nav text-black-50">
                        <li class="nav-item me-3"><a class="nav-link text-black-50" href="index.php?act=dangnhap"><i class="fa-solid fa-user"></i>Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="height: 1px;" class="container-fluid border " ></div>
        <!-- star menu  --> 
        <div class="container">
            <!-- <div class="collapse navbar-collapse "></div> -->
                <div class="navbar navbar-expand-lg text-black-50 d-flex justify-content-between">    
                    <a href="index.php"><img style="width: 70px;" class="img-thumbnail" src="assets/img/lgoo.jpg" alt="Logo"></a>
                   
                    <div class="navbar-nav ">
                        <ul class="navbar-nav ">
                            <li class="nav-item ms-2  ">
                                <a class="nav-link " href="">Menu</a>
                            </li>
                            <li class="nav-item ms-2  ">
                                <a class="nav-link " href="">Shop</a>
                            </li>
                            <li class="nav-item ms-2  ">
                                <a class="nav-link " href="">Blog</a>
                            </li>
                            <li class="nav-item ms-2  ">
                                <a class="nav-link " href="">About Us</a>
                            </li>
                            <li class="nav-item  ms-2 ">
                                <a class="nav-link " href="">Contact US</a>
                            </li>
                        </ul>
                    </div>
                    <div   class="navbar-nav me-4 ">
                        
                       <form  class="input-group me-4 rounded-5" >
                        <input class="form-control"  style=" height: 40px; " type="text" name="" id="">
                        <button class="btn border " style="width: 40px; height: 40px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                       </form>
                        <a style="position: relative;"  href="#" class="btn-lg border rounded-5  "><button class=" border rounded-5" style="width: 40px; height: 40px;"><i class="fa-solid fa-cart-shopping"></i> <span id="cartItemCount" style="position: absolute; top: -7px;" class="badge bg-secondary">0</span></button></a>
                        
                        
                    </div>
                </div>
             
        </div>
        <!-- end menu -->
    <!-- end header  -->
    <!-- star banner -->
    <?php if(!$hideSlideshow): ?>
    <!-- <div>
        <img src="img/hero-1.jpg" class="img-fluid" alt="...">
    </div> -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/img/banner1.jpg" alt="Los Angeles" class="d-block" style="width:100%">
          </div>
          <div class="carousel-item">
            <img src="assets/img/banner1.jpg" alt="Chicago" class="d-block" style="width:100%">
          </div>
          <div class="carousel-item">
            <img src="assets/img/banner1.jpg" alt="New York" class="d-block" style="width:100%">
          </div>
        </div>
        
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    <?php endif; ?>
    <!-- end banner -->