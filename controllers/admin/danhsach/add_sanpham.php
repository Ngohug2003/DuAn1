<div class="container">
    <h1 class="text-center mt-5">Thêm sản phẩm</h1>
    <form action="index_admin.php?act=add_sanpham" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label " for="">Sản Phẩm</label>
            <input class="form-control " type="text" name="name_sanpham" id="">
        </div>
        <div class="mb-3">
            <label class="form-label " for="">Giá</label>
            <input class="form-control " type="text" name="gia_sanpham" id="">
        </div>
        <div class="mb-3">
            <label for="">Ảnh</label>
            <input name="image_sanpham" value="" type="file" class="form-control" aria-label="file example" >
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Subtitle</label>
            <textarea name="subtitle_sanpham" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description_sanpham" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div>
            <label class="form-label " for="">Danh Mục</label>
            <select class="form-select" aria-label="Default select example">
                <?php foreach ($danhmuc as $dm) : ?>
                    <option name="id" value="<?php echo $dm['id_danhmuc'] ?>"><?php echo $dm['name_danhmuc'] ?></option>
                <?php endforeach ?>
            </select>
        </div>


        <!-- sumbit  -->
        <div class="mt-4">
            <input class="btn btn-success " type="submit" name="add_sanpham" id="" value="Thêm ">
            <a class="btn btn-secondary " href="index_admin.php?act=sanpham">Danh Sách</a>
        </div>
    </form>
</div>