<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>danh sách</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_reverse mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <div class="widget_inner">
                        <div class="widget_list widget_manu">
                            <h3>Danh mục </h3>
                            <ul>
                                <?php foreach ($danhmuc as $dm) {
                                    extract($dm);
                                    $linkDanhMuc = "index.php?act=sanpham&id_danhmuc=" . $id_danhmuc;
                                    echo '<li>
                                        <a href="' . $linkDanhMuc . '">' . $name_danhmuc . '</a> 
                                    </li>';
                                }
                                ?>




                            </ul>
                        </div>
                        <div class="widget_list widget_filter">
                            <h3>Tìm sản phẩm theo giá</h3>
                            <form action="#">
                                <div id="slider-range"></div>
                                <button type="submit">Filter</button>
                                <input type="text" name="text" id="amount" />

                            </form>
                        </div>
                    </div>
                </aside>
                <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip" title="3"></button>

                        <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip" title="4"></button>

                    </div>

                    <?php
                    $sql_trang = mysqli_query($mysqli, "SELECT * FROM sanpham");
                    $coutn_sp = mysqli_num_rows($sql_trang);
                    ?>

                    <div class="page_amount">
                        <p><?php echo $coutn_sp; ?> sản phẩm</p>
                    </div>

                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper">
                    <?php foreach ($dssp as $sp) : ?>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="index.php?act=chitietsanpham&idsp=<?php echo $sp['id_sanpham'] ?>"><img src="./views/assets/img/product/<?= $sp['image_sanpham'] ?>" alt=""></a>
                                        <a class="secondary_img" href="index.php?act=chitietsanpham&idsp=<?php echo $sp['id_sanpham'] ?>"><img src="assets/img/product/product25.jpg" alt=""></a>
                                        <div class="action_links">
                                          
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div style="height: 80px;" class="product_content-header">
                                            <h4 class="product_name"><a href="index.php?act=chitietsanpham&idsp=<?php echo $sp['id_sanpham'] ?>"><?= $sp['name_sanpham'] ?></a></h4>
                                            <div class="wishlist-btn">
                                                <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_price_rating">
                                            <div class="price_box">
                                                <?php
                                                // Giả sử $sp['gia_sanpham'] là giá của sản phẩm (kiểu số)
                                                $gia_sanpham = $sp['gia_sanpham'];
                                                // Định dạng giá sản phẩm thành chuỗi tiền tệ (VND)
                                                $gia_sanpham_format = number_format($gia_sanpham, 0, '', '.') . " VND";
                                                ?>
                                                <span class="current_price"><?= $gia_sanpham_format ?></span>
                                            </div>

                                        </div>
                                    </div>

                                </figure>
                            </article>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php
                $sql_trang = mysqli_query($mysqli, "SELECT * FROM sanpham");
                $row_count = mysqli_num_rows($sql_trang);
                // echo $row_count;
                $trang = ceil($row_count / 6);
                // echo $trang;


                ?>
                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        <ul>
                            <?php  
                            for($i =1 ; $i<=$trang ; $i++){
                            
                            ?>
                            <li class="current"><a href="index.php?act=sanpham&trang=<?php echo $i?>"><?php echo $i?></a></li>
                            <?php
                            }
                            ?>
                            <!-- <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">>></a></li> -->
                        </ul>
                    </div>
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>