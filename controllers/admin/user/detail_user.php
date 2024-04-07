<div class="container">
    <h1 class="text-center mt-5">Thêm User</h1>
    <form action="index_admin.php?act=edit_user" method="post" enctype="multipart/form-data">
        <div style="height: 100px;" class="mb-3">
         
            <input name="current_image" value="<?= $one_user['image_user'] ?>" type="hidden" class="form-control" aria-label="file example" >
            <img style="border-radius: 50%;" class="mw-100 mh-100 " src="../../views/assets/img/avatar/<?= $one_user['image_user'] ?>" alt="ảnh sản phẩm">
        </div>
        <div class="mb-3">
            <label for="">Ảnh</label>
            <input name="image_user" value="" type="file" class="form-control" aria-label="file example">
        </div>
        <div>
            <label class="form-label " for="">Tài khoản</label>
            <input value="<?= $one_user['username_user'] ?>" class="form-control " type="text" name="username_user" id="">
            <span style="color: red"><?php echo isset($error["username_user"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Password</label>
            <input value=" <?= $one_user['password_user'] ?>" class="form-control " type="text" name="password_user" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Email</label>
            <input value="<?= $one_user['email_user'] ?>" class="form-control " type="text" name="email_user" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Họ và tên</label>
            <input value="<?= $one_user['fullname_user'] ?>" class="form-control " type="text" name="fullname_user" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">SĐT</label>
            <input value="<?= $one_user['phone_user'] ?>" class="form-control " type="text" name="phone_user" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Địa chỉ</label>
            <input value="<?= $one_user['diachi_user'] ?>" class="form-control " type="text" name="diachi_user" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div>
            <label class="form-label " for="">Role</label>
            <input value="<?= $one_user['role'] ?>" class="form-control " type="text" name="role" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>

        <div class="mt-4">
            <input value="<?= $one_user['id_user'] ?>" type="hidden" name="id_user" id="">
            <input class="btn btn-success " type="submit" name="update" id="" value="Update ">
            <!-- <a class="btn btn-secondary " href="index_admin.php?act=danhmuc">Danh mục</a> -->
            <div>
                <span style="color: green"><?php echo isset($thongbao) ? $thongbao : '' ?></span>
            </div>
        </div>
    </form>
</div>