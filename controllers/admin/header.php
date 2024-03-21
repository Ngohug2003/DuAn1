<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang Admin</title>    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> -->
  </head>

  <body>
    <!-- =============== Navigation ================ -->
    <div class="container">
      <div class="navigation">
        <ul>
          <li>
            <a href="#">
              <span class="icon">
                <ion-icon name="logo-apple"></ion-icon>
              </span>
              <span class="title">Brand Name</span>
            </a>
          </li>

          <li>
            <a href="../index.php">
              <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
              </span>
              <span class="title">Trang chủ</span>
            </a>
          </li>

          <li>
            <a href="index_admin.php?act=danhmuc">
              <span class="icon">
                <ion-icon name="apps-outline"></ion-icon>
              </span>
              <span class="title">Quản lý danh mục</span>
            </a>
          </li>

          <li>
            <a href="quanlysanpham.html">
              <span class="icon">
                <ion-icon name="folder-open-outline"></ion-icon>
              </span>
              <span class="title">Quản lý sản phẩm</span>
            </a>
          </li>

          <li>
            <a href="quanlyuser.html">
              <span class="icon">
                <ion-icon name="person-circle-outline"></ion-icon>
              </span>
              <span class="title">Quản lý user</span>
            </a>
          </li>

          <li>
            <a href="quanlydonhang.html">
              <span class="icon">
                <ion-icon name="cart-outline"></ion-icon>
              </span>
              <span class="title">Quản lý đơn hàng</span>
            </a>
          </li>

          <li>
            <a href="quanlybinhluan.html">
              <span class="icon">
                <ion-icon name="chatbubble-outline"></ion-icon>
              </span>
              <span class="title">Quản lý bình luận</span>
            </a>
          </li>

          <li>
            <a href="#">
              <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>
              </span>
              <span class="title">Sign Out</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- ========================= Main ==================== -->
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>

          <div class="search">
            <label>
              <input type="text" placeholder="Search here" />
              <ion-icon name="search-outline"></ion-icon>
            </label>
          </div>

          <div class="user">
            <span>Xin chào Admin</span>
          </div>
        </div>