<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li>Tài khoản</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="customer_login mt-60">
    <div class="container">
        <div class="row">
            <?php if (isset($thongbao) && !empty($thongbao)) : ?>
                <p><?php echo $thongbao; ?></p>
            <?php endif; ?>
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>Đăng Nhập</h2>
                    <form action="index.php?act=dangnhap" method="post">
                        <p>
                            <label>Tên tài khoản<span>*</span></label>
                            <input name="username">
                        </p>
                        <p>
                            <label>Mật khẩu<span>*</span></label>
                            <input type="password" name="password">
                        </p>
                        <div class="login_submit">
                            <a href="#">Quên mật khẩu</a>
                            <!-- <button name="dangnhap" type="submit">Đăng nhập</button> -->
                            <input type="submit" style="background-color: #09c6ab;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Đăng nhập" name="dangnhap">

                        </div>

                    </form>
                    <!-- thử test  -->
                    <!-- <form action="index.php?act=dangnhap" method="post" class="border border-dark-subtle rounded p-5 justify-content-center ">
                    <h2>Login</h2>
                    <div class="mb-3 mt-3">
                      <label  class="form-label">Tên đăng nhập:</label>
                      <input class="form-control" name="username"  >
                    </div>
                    <div class="mb-3">
                      <label for="pwd" class="form-label">Password:</label>
                      <input type="password" class="form-control " name="password">
                      <a href="" class="text-yellowhung nav-link">Forgot Password ?</a>
                    </div> 
                  <input type="submit" style="background-color: red;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Đăng nhập" name="dangnhap">
                    <p class="mt-3">
                        
                        <a href="index.php?act=dangky" class="text-yellowhung nav-link"> Don't have an account?Sign up</a>
                    </p>
                  </form> -->
                </div>
            </div>
            <!--  -->


            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Đăng kí</h2>
                    <form action="index.php?act=dangky" method="post">
                        <!-- <p>
                            <label>Email<span>*</span></label>
                            <input type="email">
                        </p> -->
                        <p>
                            <label>Tên tài khoản<span>*</span></label>
                            <input type="text" name="username">
                        </p>

                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" name="password">
                        </p>
                        <!-- <p>
                            <label>Số điện thoại <span>*</span></label>
                            <input type="number">
                        </p> -->
                        <div class="login_submit">
                        <input type="submit" style="background-color: #09c6ab;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Đăng Ký" name="dangky">
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>