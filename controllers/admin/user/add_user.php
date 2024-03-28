
<div class="container">
    <h1 class="text-center mt-5">Thêm User</h1>
    <form action="index_admin.php?act=add_user" method="post" enctype="multipart/form-data">
        <div>
            <label class="form-label " for="">Tài khoản</label>
            <input class="form-control " type="text" name="username_user" id="">
            <span style="color: red"><?php echo isset($error["username_user"]) ? $error["username_user"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Password</label>
            <input class="form-control " type="text" name="password_user" id="">
            <span style="color: red"><?php echo isset($error["password_user"]) ? $error["password_user"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Email</label>
            <input class="form-control " type="text" name="email_user" id="">
            <span style="color: red"><?php echo isset($error["email"]) ? $error["email"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Họ và tên</label>
            <input class="form-control " type="text" name="fullname_user" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">SĐT</label>
            <input class="form-control " type="text" name="phone_user" id="">
            <span style="color: red"><?php echo isset($error["phone_user"]) ? $error["phone_user"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Địa chỉ</label>
            <input class="form-control " type="text" name="diachi_user" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Avatar</label>
            <input class="form-control " type="file" name="image_user" id="">
       
        </div>
        <div>
            <label class="form-label " for="">Role</label>
            <input class="form-control " type="text" name="role" id="" placeholder="1 là Admin , 2 là user ">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div class="mt-4">
            <input class="btn btn-success " type="submit" name="themmoi_user" id="" value="Thêm ">
            <!-- <a class="btn btn-secondary " href="index_admin.php?act=danhmuc">Danh mục</a> -->
           <div>
           <span style="color: red"><?php echo isset($thongbao) ? $thongbao : '' ?></span>
           </div>
        </div>
    </form>
</div>