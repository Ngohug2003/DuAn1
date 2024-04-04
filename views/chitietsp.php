<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Chi tiết sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<?php extract($chitietSanPham);  ?>
<div class="product_details mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img name="anh" id="zoom1" src="./views/assets/img/product/<?= $image_sanpham ?>" data-zoom-image="./assets/img/product/<?= $image_sanpham ?>" alt="big-1">
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6">



                <div class="product_d_right">
                    <form action="index.php?act=addToCart" method="post">
                        <h1><a href="#"><?= $name_sanpham ?></a></h1>
                        <?php
                        // Giả sử $sp['gia_sanpham'] là giá của sản phẩm (kiểu số)
                        $gia_sanpham = $gia_sanpham;
                        // Định dạng giá sản phẩm thành chuỗi tiền tệ (VND)
                        $gia_sanpham_format = number_format($gia_sanpham, 0, '', '.') . " VND";
                        ?>
                        <div class="price_box">
                            <span class="current_price"><?= $gia_sanpham_format ?></span>
                        </div>
                        <div class="product_desc">
                            <p><?= $subtitle_sanpham ?></p>
                        </div>

                        <div class="product_variant quantity">
                            <label>Số Lượng</label>
                            <input name="quantity" min="1" max="100" value="1" type="number">
                            <input type="hidden" name="name_sanpham" id="" value="<?= $name_sanpham ?>">
                            <input type="hidden" name="gia_sanpham" id="" value="<?= $gia_sanpham?>">
                            <input type="hidden" name="image_sanpham" id="" value="<?= $image_sanpham ?>">
                            <input type="hidden" name="id_sanpham" id="" value="<?= $id_sanpham ?>">
                            <input   type="submit" style="background-color: #09c6ab; width: 240px;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Thêm vào giỏ hàng" name="addgiohang">

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <hr>
</div>
<div class="container">
    <p><?= $description_sanpham ?></p>
</div>
<div class="container">
    <hr>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info mb-58">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist">
                            <li>
                                <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Bình Luận</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                            <?php foreach($getBinhLuan as $bl):?>
                                <div  class="reviews_comment_box">
                                    <div style="height: 50px; width: 50px; overflow: hidden; border-radius: 50%;" class="comment_thmb">
                                        <img style="width: 100%;background-size: cover;" src="./views/assets/img/avatar/<?= $bl['image_user'] ?>" alt="avat">
                                    </div>
                                    <!-- -------------- show bình luận ------------- -->
                                    <div class="comment_text">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                          
                                            <p><strong><?= $bl['fullname_user']?> </strong><?= $bl['ngaybinhluan']?></p>
                                            <span><?= $bl['noidung_binhluan']?></span>
                                        </div>
                                    </div>

                                </div>
                                <?php endforeach?>
                                <div class="product_ratting mb-10">
                                    <h3>Đánh giá</h3>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_review_form">
                                    <!-- bình luận  -->
                                    <?php
                                    if (isset($_SESSION['username'])) {

                                        echo '<form action="index.php?act=binhluan&idsp='.$id_sanpham.'" method="post">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Bình luận của bạn </label>
                                                <input type="text"  name="noidung_binhluan" id="">
                                                <input type="hidden"  name="ngaybinhluan" id="" value="'.$date=date('Y-m-d').'" >
                                            </div
                                        
                                        </div>
                                        <div class="save_button primary_btn default_button mt-3">
                                        <input type="submit" style="background-color: #09c6ab;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Gửi bình luận" name="luu_binhluan">
                                        </div>
                                    </form>';
                                    } else {
                                    ?>
                                       <form action="">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Bình luận của bạn </label>
                                                <textarea disabled name="comment" id="review_comment"></textarea>
                                            </div>
                              
                                        </div>
                                        <div class="d-flex">
                                            <button disabled type="submit">Gửi</button>
                                            <button class="ms-3" type="submit"><a href="index.php?act=dangnhap">Đăng nhập để bình luận</a></button>
                                        </div>
                                    </form>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!--product area start-->
<section class="product_area related_products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Sản phẩm cùng loại</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product_carousel product_column4 owl-carousel">
                <?php foreach ($SanPhamCungLoai as $sp) : ?>
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="./views/assets/img/product/<?= $sp['image_sanpham'] ?>" alt=""></a>
                                    <!-- <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a> -->
                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <figcaption class="product_content">
                                    <div class="product_content-header">
                                        <h4 class="product_name"><a href="product-details.html"><?= $sp['name_sanpham'] ?></a></h4>
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
                                            <span class="current_price"><?= $gia_sanpham_format  ?></span>
                                        </div>
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<!--product area end-->
<!--brand area start-->
<!-- <div class="brand_area color_five">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand6.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->