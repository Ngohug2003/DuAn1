<div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
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
                                    <?php foreach ($danhmuc as $dm){
                                        extract($dm);
                                        $linkDanhMuc = "index.php?act=timkiem&id_danhmuc=".$id_danhmuc;
                                        echo '<li>
                                        <a href="'.$linkDanhMuc.'">'.$name_danhmuc.'</a> 
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

                            <button data-role="grid_4" type="button"  class=" btn-grid-4" data-bs-toggle="tooltip" title="4"></button>

                        </div>
                       
                        <div class="page_amount">
                            <p>30 sản phẩm</p>
                      
                        </div>
                    </div>
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">
                        <?php foreach($dssp as $sp):?>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="chitietsanpham.html"><img src="../views/assets/img/product/<?=$sp['image_sanpham']?>" alt=""></a>
                                        <a class="secondary_img" href="chitietsanpham.html"><img src="assets/img/product/product25.jpg" alt=""></a>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="giohang.html" title="Add to cart"><i class="zmdi zmdi-shopping-cart"></i></a></li>
                                                <li class="compare"><a href="#" title="Add to Compare"><i class="zmdi zmdi-refresh"></i></a></li>

                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div style="height: 80px;" class="product_content-header">
                                            <h4 class="product_name"><a href="chitietsanpham.html"><?=$sp['name_sanpham']?></a></h4>
                                            <div class="wishlist-btn">
                                                <a href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_price_rating">
                                            <div class="price_box"> 
                                                <span class="current_price"><?=$sp['gia_sanpham']?></span>
                                            </div>
                                          
                                       </div>
                                    </div>
                                 
                                </figure>
                            </article>
                        </div>
                    <?php endforeach?>
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>