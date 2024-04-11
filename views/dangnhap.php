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
                            <span style="color: red"><?php echo isset($error["username_login"]) ? $error["username_login"] : '' ?></span>
                        </p>
                        <p>
                            <label>Mật khẩu<span>*</span></label>
                            <input type="password" name="password">
                            <span style="color: red"><?php echo isset($error["password_login"]) ? $error["password_login"] : '' ?></span>
                        </p>
                        <div class="login_submit">
                            <a href="index.php?act=quenmk">Quên mật khẩu</a>
                            <!-- <button name="dangnhap" type="submit">Đăng nhập</button> -->
                            <input type="submit" style="background-color: #09c6ab;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Đăng nhập" name="dangnhap">
                            <span style="color: red"><?php echo isset($error["thongbao_login"]) ? $error["thongbao_login"] : '' ?></span>
                        </div>

                    </form>
    
                </div>
            </div>
            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Đăng kí</h2>
                    <form action="index.php?act=dangky" method="post">
                        <p>
                            <label>Email<span>*</span></label>
                            <input name="email" type="email">
                            <span style="color: red"><?php echo isset($error["email"]) ? $error["email"] : '' ?></span>
                        </p>
                        <p>
                            <label>Tên tài khoản<span>*</span></label>
                            <input type="text" name="username">
                            <span style="color: red"><?php echo isset($error["username"]) ? $error["username"] : '' ?></span>
                        </p>

                        <p>
                            <label>Mật khẩu <span>*</span></label>
                            <input type="password" name="password">
                            <span style="color: red"><?php echo isset($error["password"]) ? $error["password"] : '' ?></span>
                        </p>
                        <p>
                            <label>Xác nhận mật khẩu <span>*</span></label>
                            <input type="password" name="password_confirm">
                            <span style="color: red"><?php echo isset($error["password_confirm"]) ? $error["password_confirm"] : '' ?></span>
                        </p>
                       
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