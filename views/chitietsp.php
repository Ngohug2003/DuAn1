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
                            <img id="zoom1" src="./views/assets/img/product/<?= $image_sanpham ?>" data-zoom-image="./assets/img/product/<?= $image_sanpham ?>" alt="big-1">
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6">



                <div class="product_d_right">
                    <form action="#">
                        <h1><a href="#"><?= $name_sanpham ?></a></h1>
                        <div class="price_box">
                            <span class="current_price"><?= $gia_sanpham ?></span>
                        </div>
                        <div class="product_desc">
                            <p><?= $subtitle_sanpham ?></p>
                        </div>
                        <div class="product_variant quantity">
                            <label>quantity</label>
                            <input min="1" max="100" value="1" type="number">
                            <button class="button" type="submit"><a href="giohang.html">Thêm giỏ hàng</a></button>

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
    <p><?=$description_sanpham?></p>
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

                                <div class="reviews_comment_box">
                                    <div class="comment_thmb">
                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                    </div>
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
                                            <p><strong>admin </strong> 10/03/2024</p>
                                            <span>sản phẩm rất ok</span>
                                        </div>
                                    </div>

                                </div>
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
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Bình luận của bạn </label>
                                                <textarea name="comment" id="review_comment"></textarea>
                                            </div>

                                        </div>
                                        <button type="submit">Gửi</button>
                                    </form>
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
                                            <span class="current_price"><?= $sp['gia_sanpham'] ?></span>
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