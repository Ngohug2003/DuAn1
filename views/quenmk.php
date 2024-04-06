<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Quên mật khẩu </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="customer_login mt-60" >
    <div class="container">
        <div class="row">
           
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>Quên mật khẩu</h2>
                    <form action="index.php?act=quenmk" method="post">
                        <p>
                            <label>Nhập email khôi phục mật khẩu<span>*</span></label>
                            <input name="email_user">
                            <span style="color: red"><?php echo isset($error["username_login"]) ? $error["username_login"] : '' ?></span>
                        </p>
        
                        <div class="login_submit">
                            <!-- <button name="dangnhap" type="submit">Đăng nhập</button> -->
                            <input type="submit" style="background-color: #09c6ab;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Gửi mật khẩu" name="quenmk">
                            <span style="color: red"><?php echo isset($error["password_login"]) ? $error["password_login"] : '' ?></span>
                        </div>
                        <?php if (isset($showmk) && !empty($showmk)) : ?>
                <p><?php echo $showmk; ?></p>
            <?php endif; ?>

                    </form>
    
                </div>
            </div>
        </div>
    </div>
</div>