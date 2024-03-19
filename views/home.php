<div class="container">
    <h3 class="text-center mt-3">Sản phẩm nổi bật</h3>
    <div class="row">
    <?php foreach($listsanpham as $sptop):?>
        <div class="col-3">
            <!-- box hiển thị sản phẩm  -->
            <div class="border border rounded overflow-hidden  mt-3 mb-3">
                <!-- kv ảnh   -->
                <div style="height: 300px;" class="bg-light d-flex align-items-center justify-content-center">
                    <img src="../views/assets/img/product-10.jpg" class="mh-100 mw-100" alt=" ">
                </div>
                <!-- kv tên sản phẩm  -->
                <div class="m-2">
                    <h1 style="height: 20px;" class="h6"><?php echo $sptop['name_sanpham']?></h1>
                    <span><?php echo $sptop['subtitle_sanpham']?></span>
                    <!-- kv giá sản phẩm  -->
                    <div class="d-flex  justify-content-between "> 
                        <div style="color: red;"><?php echo $sptop['gia_sanpham']?> VND</div>
                    </div>
                    <!-- kv button tương tác -->

                    <a href="" class="btn btn-success w-100 rounded-pill">Thông tin chi tiết</a>
                </div>

            </div>

        </div>
        <?php endforeach?>


    </div>
</div>
<div class="container">
    <h3 class="text-center mt-3">Sản phẩm mới nhất</h3>
    <div class="row">
        <?php foreach($sanpham as $sp):?>
        <div class="col-3">
            <!-- box hiển thị sản phẩm  -->
            <div class="border border rounded overflow-hidden  mt-3 mb-3">
                <!-- kv ảnh   -->
                <div style="height: 300px;" class="bg-light d-flex align-items-center justify-content-center">
                    <img src="../views/assets/img/product-10.jpg" class="mh-100 mw-100" alt=" ">
                </div>
                <!-- kv tên sản phẩm  -->
                <div class="m-2">
                    <h1 style="height: 20px;" class="h6"><?php echo $sp['name_sanpham']?></h1>
                    <span><?php echo $sp['subtitle_sanpham']?></span>
                    <!-- kv giá sản phẩm  -->
                    <div class="d-flex  justify-content-between ">
                        <div style="color: red;"><?php echo $sp['gia_sanpham']?> VND</div>
                    </div>
                    <!-- kv button tương tác -->

                    <a href="" class="btn btn-success w-100 rounded-pill">Thông tin chi tiết</a>
                </div>

            </div>

        </div>
        <?php endforeach?>


    </div>
</div>