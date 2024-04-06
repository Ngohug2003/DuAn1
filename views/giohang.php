    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li>Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    // var_dump($_SESSION['giohang'])

    ?>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">
            <form action="index.php?act=capnhapsl" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Xóa</th>
                                            <th class="product_thumb">Ảnh</th>
                                            <th class="product_name">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product_total">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $tongtiendonhang = 0 ;
                                        $i=0;
                                        $del = "index.php?act=delToCart&i=".($i + 1);

                                        ?>
                                        <?php foreach (($_SESSION['giohang']) as  $key => $item) : ?>
                                            <?php
                                            $tt = $item[3] * $item[1];
                                            $tongtiendonhang += $tt;     
                                            ?>
                                            <tr>

                                                <td class="product_remove"><a href="<?= $del?>"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb">
                                                    <a href="#"><img src="./views/assets/img/product/<?= $item[4] ?>" alt=""></a>
                                                </td>
                                                <td class="product_name"><a href="#"><?= $item[2] ?></a></td>

                                                <?php
                                                // Giả sử $sp['gia_sanpham'] là giá của sản phẩm (kiểu số)
                                                $gia_sanpham = $item[3];
                                                $tongtien = $tt;
                                                $tongtien_format = number_format($tongtien, 0, '', '.') . " VND";
                                                // Định dạng giá sản phẩm thành chuỗi tiền tệ (VND)
                                             
                                                $gia_sanpham_format = number_format($gia_sanpham, 0, '', '.') . " VND";
                                               
                                                ?>
                                                <td class="product-price"><?= $gia_sanpham_format ?></td>
                                                <td class="product_quantity"><input name="newquantity"  min="1" max="100" value="<?= $item[1] ?>" type="number"></td>
                                                <input type="hidden" name="id_sanpham" value="<?= $item[0]?>" id="">
                                                <td class="product_total"><?= $tongtien_format ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                            <input type="submit" style="background-color: #09c6ab;"  class="btn bg-yellowhung text-uppercase text-white me-3"  name="updateSL" value="Cập nhật giỏ hàng">


                        
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                  
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Tổng đơn hàng</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <!-- <p>Tổng</p>
                                        <p class="cart_amount">$215</p> -->
                                    </div>
                                    <div class="cart_subtotal ">
                                        <!-- <p>Khuyến mại</p>
                                        <p class="cart_amount"> $30</p> -->
                                    </div>
                                            <?php  
                                             
                                             $tongtien = $tongtiendonhang;
                                             $tongtiendonhang_format = number_format($tongtien, 0, '', '.') . " VND";
                                            ?>

                                    <div class="cart_subtotal">
                                        <p>Số tiền phải thanh toán</p>
                                        <p class="cart_amount"><?=  $tongtiendonhang_format ?></p>
                                    </div>
                                    <div class="checkout_btn">
                                        
                                        <a href="index.php?act=thanhtoan">Tiếp tục thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>