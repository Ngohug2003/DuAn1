<div class="container">
    <h1 class="text-center mt-5">Update sản phẩm</h1>
    <form action="index_admin.php?act=update_sanpham" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label " for="">Sản Phẩm</label>
            <input value="<?= $one_sp['name_sanpham'] ?>" class="form-control " type="text" name="name_sanpham" id="">
            <span style="color: red"><?php echo isset($error['name_sanpham']['required']) ?  $error['name_sanpham']['required'] : '' ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label " for="">Giá</label>
            <input value="<?= $one_sp['gia_sanpham'] ?>" class="form-control " type="text" name="gia_sanpham" id="">
            <span style="color: red"><?php echo isset($error['gia_sanpham']['required']) ? $error['gia_sanpham']['required'] : '' ?></span>
        </div>
        <div style="height: 100px;" class="mb-3">
            <label for="">Ảnh</label>
            <!-- <input name="image_sanpham" value="" type="text" class="form-control" aria-label="file example" > -->
            <img class="mw-100 mh-100 " src="../../views/assets/img/product/<?= $one_sp['image_sanpham'] ?>" alt="ảnh sản phẩm">
        </div>
        <div class="mb-3">
            <label for="">Ảnh</label>
            <input name="image_sanpham" value="" type="file" class="form-control" aria-label="file example">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Subtitle</label>
            <textarea name="subtitle_sanpham" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $one_sp['subtitle_sanpham'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description_sanpham" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $one_sp['description_sanpham'] ?></textarea>
        </div>
        <div>
            <label class="form-label " for="">Danh Mục</label>
            <select name="id_danhmuc" class="form-select" aria-label="Default select example">
                <?php foreach ($danhmuc as $dm) : ?>
                    <?php if ($dm['id_danhmuc'] == $one_sp['id_danhmuc']) : ?>
                        <option value="<?= $dm['id_danhmuc'] ?>" selected><?= $dm['name_danhmuc'] ?></option>
                    <?php else : ?>
                        <option value="<?= $dm['id_danhmuc'] ?>"><?= $dm['name_danhmuc'] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mt-2"> <span style="color: green"><?php echo isset($thongbao) ? $thongbao : '' ?></span></div>
        <!-- sumbit  -->
        <div class="mt-4">
            <input type="hidden" value="<?= $one_sp['id_sanpham'] ?>" name="id_sanpham" id="">
            <input class="btn btn-success " type="submit" name="    " id="" value="Update ">
            <a class="btn btn-secondary " href="index_admin.php?act=sanpham">Danh Sách</a>
        </div>
    </form>
</div>