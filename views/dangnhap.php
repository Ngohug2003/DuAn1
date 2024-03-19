
<div class="container-fluid bg-light ">
        <div class="text-center p-5 ">
            <h1>LOGIN</h1>
            <span class="text-uppercase">Home - login </span>
        </div>
    </div>
            <div style="width: 900px;" class="mt-3 mx-auto p-2">
            <?php if (isset($thongbao) && !empty($thongbao)) : ?>
                    <p><?php echo $thongbao; ?></p>
                <?php endif; ?>
                <form action="index.php?act=dangnhap" method="post" class="border border-dark-subtle rounded p-5 justify-content-center ">
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
                  <input type="submit" class="btn bg-yellowhung text-uppercase text-white me-3" value="Đăng nhập" name="dangnhap">
                    <p class="mt-3">
                        
                        <a href="index.php?act=dangky" class="text-yellowhung nav-link"> Don't have an account?Sign up</a>
                    </p>
                  </form>
             </div>