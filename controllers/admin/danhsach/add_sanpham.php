<div class="container">
    <h1 class="text-center mt-5">Thêm sản phẩm</h1>
    <form action="index_admin.php?act=add_sanpham" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label " for="">Sản Phẩm</label>
            <input class="form-control " type="text" name="name_sanpham" id="">
            <span style="color: red"><?php echo isset( $error['name_sanpham']['required']) ?  $error['name_sanpham']['required'] : '' ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label " for="">Giá</label>
            <input class="form-control " type="text" name="gia_sanpham" id="">
            <span style="color: red"><?php echo isset($error['gia_sanpham']['required']) ? $error['gia_sanpham']['required'] : '' ?></span>
        </div>
        <div class="mb-3">
            <label for="">Ảnh</label>
            <input name="image_sanpham" value="" type="file" class="form-control" aria-label="file example" >
            <span style="color: red"><?php echo isset($error['image_sanpham']['required']) ? $error['image_sanpham']['required'] : '' ?></span>

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
            <select  name="id" class="form-select" aria-label="Default select example">
                <?php foreach ($danhmuc as $dm) : ?>
                    <option value="<?php echo $dm['id_danhmuc'] ?>"><?php echo $dm['name_danhmuc'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mt-2"> <span  style="color: green"><?php echo isset($thongbao) ? $thongbao : '' ?></span></div>


        <!-- sumbit  -->
        <div class="mt-4">
        <a class="btn btn-secondary " href="index_admin.php?act=sanpham">Danh Sách</a>
            <input class="btn btn-success " type="submit" name="themsp" id="" value="Thêm ">
          
        </div>
    </form>
</div>