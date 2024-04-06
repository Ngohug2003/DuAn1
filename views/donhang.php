<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Đơn hàng</li>
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
                                        <th class="product_remove">Hủy đơn hàng</th>
                                        <th class="product_thumb">Ảnh</th>
                                        <th class="product_name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product_quantity">Số lượng</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    ?>
                                    <?php foreach ($listCart as  $key => $item) : ?>
                                        <?php
                                        $gia_sanpham = $item['dongia'];
                                        $gia_sanpham_format = number_format($gia_sanpham, 0, '', '.') . " VND";

                                        ?>
                                        <tr>
                                            <td class="product_remove"><a href="<?= $del ?>"><i class="fa fa-trash-o"></i></a></td>
                                            <td class="product_thumb">
                                                <a href="index.php?act=chitietsanpham&idsp=<?php echo $item['id_sanpham'] ?>"><img src="./views/assets/img/product/<?= $item['image_sanpham'] ?>" alt=""></a>
                                            </td>
                                            <td class="product_name"><a href="index.php?act=chitietsanpham&idsp=<?php echo $item['id_sanpham'] ?>"><?= $item['name_sanpham'] ?></a></td>

                                            <td class="product-price"><?= $gia_sanpham_format ?></td>
                                            <td class="product_quantity"><input disabled name="newquantity" min="1" max="100" value="<?= $item['soluong'] ?>" type="number"></td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>

                            <div class="m-4">
                                <h3>Thông tin người nhận</h3>
                                <?php foreach ($listDonHang as  $key => $nguoinhan) : ?>

                                    <p>
                                        <label class="mt-3">Tên người nhận<span>*</span></label>
                                        <input class="form-control mt-2 " value="<?=$nguoinhan['order_name'] ?>">
                                    </p>
                                    <p>
                                        <label class="mt-3">Địa chỉ<span>*</span></label>
                                        <input class="form-control mt-2 " value="<?=$nguoinhan['order_diachi'] ?>">
                                    </p>
                                    <p>
                                        <label class="mt-3">Số điện thoại<span>*</span></label>
                                        <input class="form-control mt-2 " value="<?=$nguoinhan['order_phone'] ?>">
                                    </p>
                                    <p>
                                        <label class="mt-3">Email<span>*</span></label>
                                        <input class="form-control mt-2 " value="<?=$nguoinhan['order_email'] ?>">
                                    </p>
                                <?php endforeach; ?>
                            </div>

                        </div>
                        <!-- người nhận  -->
                    </div>
                </div>
            </div>
            <!--coupon code area start-->

            <!--coupon code area end-->
        </form>
    </div>
</div>