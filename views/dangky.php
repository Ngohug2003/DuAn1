<div class="container-fluid bg-light ">
    <div class="text-center p-5 ">
        <h1>SIGN UP</h1>
        <span class="text-uppercase">Home - SIGN UP </span>
    </div>
</div>
<div style="width: 900px;" class="mt-3 mx-auto p-2">
    <form action="index.php?act=dangky" method="post" class="border border-dark-subtle rounded p-5 justify-content-center ">
        <h2>SIGN UP</h2>
        <div class="mb-3 mt-3">
            <label class="form-label">Username:</label>
            <input name="username" class="form-control">
            
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input name="password" type="password" class="form-control ">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Nhập lại password:</label>
            <input name="password_comfirm" type="password" class="form-control ">
        </div>
        <button name="dangky" type="submit" class="btn bg-yellowhung   text-uppercase text-white me-3 ">Sign Up</button>
    </form>
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
</div>