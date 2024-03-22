<?php if (isset($thongbao) && !empty($thongbao)) : ?>
                <p><?php echo $thongbao; ?></p>
            <?php endif; ?>
<div class="container">
    <form action="index_admin.php?act=adddm" method="post">
        <div>
            <label class="form-label " for="">ID</label>
            <input disabled class="form-control " type="text" name="" id="">
        </div>
        <div>
            <label class="form-label " for="">Thêm danh mục</label>
            <input class="form-control " type="text" name="name_danhmuc" id="">
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div class="mt-4">
            <input class="btn btn-success " type="submit" name="themmoi" id="" value="Thêm ">
            <a class="btn btn-secondary " href="index_admin.php?act=danhmuc">Danh mục</a>
        </div>
    </form>
</div>