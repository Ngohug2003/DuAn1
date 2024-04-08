<div class="product_area mb-62 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-header">
                    <div class="section_title">
                        <h2>Sản phẩm hot</h2>
                        <p>Các sản phẩm có lượt xem và truy cập nhiều nhất trong thời gian qua</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="men" role="tabpanel">
                <div class="row">
                    <div class="product_carousel product_column4 owl-carousel">
                        <!-- backend đổ dữ liệu  -->
                        <?php foreach ($sanpham as $sp) : ?>
                            <div class="col-lg-3">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="index.php?act=chitietsanpham&idsp=<?php echo $sp['id_sanpham'] ?>"><img src="./views/assets/img/product/<?php echo $sp['image_sanpham'] ?>" alt=""></a>
                                            <div class="action_links">
                                                
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div style="height: 50px;" class="product_content-header">
                                                <h4 class="product_name"><a href="index.php?act=chitietsanpham&idsp=<?php echo $sp['id_sanpham'] ?>"><?php echo $sp['name_sanpham'] ?></a></h4>
                                                <div class="wishlist-btn">
                                                    <a href=""><i class="zmdi zmdi-favorite-outline"></i></a>
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
                                                    <span class="current_price"><?php echo $gia_sanpham_format; ?></span>
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

        </div>
    </div>
</div>
<!--product area end-->

<!--banner fullwidth start-->
<div class="banner_fullwidth mb-70" data-bgimg="./views/assets/img/bg/img_banner.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-text">

                    <p>DAM Computer là nơi bán máy tính laptop uy tin chất lượng nhất .. với giá cả phù hợp </p>
                    <a href="index.php?act=sanpham">Xem chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner fullwidth end-->

<!--product area start-->
<div class="product_area mb-62">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>SẢN PHẨM NỔI BẬT</h2>
                    <p>Chúng tôi cung cấp thời trang thiết kế bán lẻ với giá cao hơn nhiều tại các cửa hàng khác</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($listsanpham as $sptop) : ?>
                <div class="col-lg-3">
                    <article class="single_product">
                        <figure>
                            <div class="product_thumb">
                                <a class="primary_img" href="index.php?act=chitietsanpham&idsp=<?php echo $sptop['id_sanpham'] ?>"><img src="./views/assets/img/product/<?php echo $sptop['image_sanpham'] ?>" alt=""></a>
                               
                            </div>
                            <figcaption class="product_content">
                                <div class="product_content-header">
                                    <h4 class="product_name"><a href="index.php?act=chitietsanpham&idsp=<?php echo $sptop['id_sanpham'] ?>"><?php echo $sptop['name_sanpham'] ?></a></h4>
                                    <div class="wishlist-btn">
                                        <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                    </div>
                                </div>
                                <div class="product_price_rating">
                                    <div class="price_box">
                                        <?php
                                        // Giả sử $sp['gia_sanpham'] là giá của sản phẩm (kiểu số)
                                        $gia_sanpham = $sptop['gia_sanpham'];
                                        // Định dạng giá sản phẩm thành chuỗi tiền tệ (VND)
                                        $gia_sanpham_format = number_format($gia_sanpham, 0, '', '.') . " VND";
                                        ?>
                                        <span class="current_price"><?php echo $gia_sanpham_format  ?> VND</span>
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
<!--product area end-->


<section class="blog_section mb-62">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Tin tức</h2>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog_carousel blog_column3 owl-carousel">
                <div class="col-lg-3">
                    <article class="single_blog">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog1.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h4 class="post_title"><a href="blog-details.html">Nếu chơi game thì mẫu laptop MSI gaming Intel nào đáng mua nhất trong tháng 4 chưa?</a></h4>
                                <div class="articles_date">
                                    <span>29.03.2024</span>
                                </div>
                                <p class="post_desc">Mở đầu cho danh sách TOP các mẫu laptop MSI chuyên game lần này, mẫu MSI Gaming Katana GF66 12UCK (804VN) sẽ là lựa chọn đầu tiên mà mình xin được gửi đến các bạn. Về phần cấu hình, thì chiếc MSI Gaming Katana GF66 12UCK (804VN) mang tới con chip Intel Core i7 12650H </p>
                                <footer class="btn_more">
                                    <a href="blog-details.html">Đọc thêm</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-lg-3">
                    <article class="single_blog">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog2.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h4 class="post_title"><a href="blog-details.html">ExpertBook B9 OLED - laptop cho doanh nhân mỏng nhẹ nhất của Asus</a></h4>
                                <div class="articles_date">
                                    <span>30.03.2024</span>

                                </div>
                                <p class="post_desc">Mẫu ExpertBook B9 OLED (B9403CVA) có cân nặng chỉ 990 gram cùng màn hình 14 inch, cấu hình dùng chip Core i7-1355U, giá 55,99 triệu đồng cho bản RAM 32 GB.</p>
                                <footer class="btn_more">
                                    <a href="blog-details.html">Đọc thêm</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>


            </div>
        </div>
    </div>
</section>