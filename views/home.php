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
                             <?php foreach ($sanpham as $sp):?>
                            <div class="col-lg-3">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img  src="../views/assets/img/product/<?php echo $sp['image_sanpham']?>" alt=""></a>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart"></i></a></li>
                                           
                                                </ul>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                           <div class="product_content-header">
                                                <h4 class="product_name"><a href="product-details.html"><?php echo $sp['name_sanpham']?></a></h4>
                                                <div class="wishlist-btn">
                                                    <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                </div>
                                            </div>
                                            <div class="product_price_rating">
                                                <div class="price_box"> 
                                                    <span class="current_price"><?php echo $sp['gia_sanpham']?> VND</span>
                                                </div>
                                    
                                           </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                            <?php endforeach?>
                        </div> 
                    </div>   
                </div>
   
            </div> 
        </div>
    </div>
    <!--product area end-->
    
    <!--banner fullwidth start-->
    <div class="banner_fullwidth mb-70" data-bgimg="../views/assets/img/bg/img_banner.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-text">
                     
                        <p>DAM Computer là nơi bán máy tính laptop uy tin chất lượng nhất ..... với giá cả phù hợp </p>
                        <a href="shop.html">Xem chi tiết</a>
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
            <?php foreach ($listsanpham as $sptop):?>
                <div class="col-lg-3">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img  src="../views/assets/img/product/<?php echo $sptop['image_sanpham']?>" alt=""></a>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="add_to_cart"><a href="cart.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart"></i></a></li>
                                           
                                                </ul>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                           <div class="product_content-header">
                                                <h4 class="product_name"><a href="product-details.html"><?php echo $sptop['name_sanpham']?></a></h4>
                                                <div class="wishlist-btn">
                                                    <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                                </div>
                                            </div>
                                            <div class="product_price_rating">
                                                <div class="price_box"> 
                                                    <span class="current_price"><?php echo $sptop['gia_sanpham']?> VND</span>
                                                </div>
                                    
                                           </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                <?php endforeach?>
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
                                   <h4 class="post_title"><a href="blog-details.html">Hè sele sập giá</a></h4>
                                   <div class="articles_date">
                                        <span>08.03.2024</span>
                                    </div>
                                    <p class="post_desc">Tích hợp công nghệ chống nắng tiên tiến từ Nhật Bản, tạo nên chất liệu có khả năng phản xạ tia UV và hấp thụ tia UV, ngăn chặn hơn 90%* tia UV, giúp bảo vệ tối ưu dưới ánh nắng mặt trời.</p>
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
                                   <h4 class="post_title"><a href="blog-details.html">Thời Trang hè 2024</a></h4>
                                   <div class="articles_date">
                                        <span>08.03.2024</span>
                                      
                                    </div>
                                    <p class="post_desc">Tích hợp công nghệ chống nắng tiên tiến từ Nhật Bản, tạo nên chất liệu có khả năng phản xạ tia UV và hấp thụ tia UV, ngăn chặn hơn 90%* tia UV, giúp bảo vệ tối ưu dưới ánh nắng mặt trời.</p>
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