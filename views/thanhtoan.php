<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Thanh toán đơn hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section mt-60">
    <div class="container">

       <form action="index.php?act=thanhtoan" method="post">
       <div class="checkout_form">
            <div class="row">
                <?php   
                if (isset($_SESSION['username'])){
                    $fullname_user = $_SESSION['username']['fullname_user'];
                    $diachi_user = $_SESSION['username']['diachi_user'];
                    $phone_user = $_SESSION['username']['phone_user'];
                    $email_user = $_SESSION['username']['email_user'];
                    $id_user = $_SESSION['username']['id_user'];
                }else{
                    $fullname_user = "";
                    $diachi_user = "" ;
                    $phone_user = "" ;
                    $email_user = "";
                }
                
                ?>
                <div class="col-lg-6 col-md-6">
                    <!-- <form action="#"> -->
                        <h3>Địa chỉ</h3>
                        <div class="row">
                        <input type="hidden" name="id_user" value="<?= $id_user?>">
                            <div class="col-lg-12 mb-20">
                                <label>Họ tên <span>*</span></label>
                                <input type="text" name="fullname_user" value="<?= $fullname_user?>">
                            </div>

                            <div class="col-12 mb-20">
                                <label>Địa chỉ</label>
                                <input type="text" name="diachi_user" value="<?= $diachi_user?>">
                            </div>



                            <div class="col-lg-6 mb-20">
                                <label>Số điện thoại<span>*</span></label>
                                <input type="number" name="phone_user" value="<?= $phone_user?>">

                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Email <span>*</span></label>
                                <input type="email" name="email_user" value="<?= $email_user?>">

                            </div>

                            <div class="col-12 mb-20">


                            </div>
                        </div>
                    <!-- </form> -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <!-- <form action="#"> -->
                        <h3>Đơn hàng của bạn </h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tongtiendonhang = 0; ?>
                                    <?php foreach (($_SESSION['giohang']) as  $key => $item) : ?>
                                        <?php
                                        $tt = $item[3] * $item[1];
                                        $tongtiendonhang += $tt;
                                        ?>
                                        <tr>
                                            <input type="hidden" name="quantitynew" id="" value="<?=$item[1]?>">
                                            <td><?= $item[2] ?><strong> × <?= $item[1] ?></strong></td>
                                            <?php
                                                // Giả sử $sp['gia_sanpham'] là giá của sản phẩm (kiểu số)
                                                $gia_sanpham = $item[3];
                                                $tongtien = $tt;
                                                $tongtien_format = number_format($tongtien, 0, '', '.') . " VND";
                                                // Định dạng giá sản phẩm thành chuỗi tiền tệ (VND)
                                             
                                                $gia_sanpham_format = number_format($gia_sanpham, 0, '', '.') . " VND";
                                               
                                                ?>
                                            <td><?= $tongtien_format?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr class="order_total">
                                        <th>Số tiền phải thanh toán</th>
                                        <?php  
                                             
                                             $tongtien = $tongtiendonhang;
                                             $tongtiendonhang_format = number_format($tongtien,0,'','.') ." VND";
                                            ?>
                                        <td><strong><?=  $tongtiendonhang_format ?></strong></td>
                                        <input type="hidden" name="tongtien_donhang" value="<?=$tongtien?>">
                                      
                                      
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="panel-default">
                              <input type="radio" name="phuongthucthanhtoan" id="" value="1">
                                <label for="payment" >Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="panel-default">
                                <input disable id="payment_defult" name="check_method" type="radio" />
                                <label for="payment_defult">PayPal <img src="./views/assets/img/icon/papyel.png" alt=""></label>

                                
                            </div>
                            <div class="order_button">
                                <!--  -->
                                <input type="submit" style="background-color: #09c6ab;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Thanh Toán" name="thanhtoan">

                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
       </form>
    </div>
    <?php if (isset($thongbao) && !empty($thongbao)) : ?>
        <p><?php echo $thongbao; ?></p>
    <?php endif; ?>
</div>