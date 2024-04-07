<div style="width: 1000px;">
    <form action="index_admin.php?act=edit_trangthai" method="post">
        <div class="m-4">
            <h3>Thông tin người nhận</h3>
            <div sty class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <?php foreach ($bill_chitiet as $key => $nguoinhan) : ?>


                            <?php $trangthaidonhang = trangThaiDonHang($nguoinhan['trangthaidonhang']);
                            $phuongthucthanhtoan = phuongThucThanhToan($nguoinhan['phuongthucthanhtoan']);

                            ?>

                            <?php ?>
                            <tr>
                                <td><label>Trạng thái đơn hàng<span>*</span></label></td>
                                <td>
                                    <select class="form-control " name="edit_trangthai" id="">
                                        <option value="0">Chờ xác nhận</option>
                                        <option value="1">Đã xác nhận</option>
                                        <option value="2">Đang vận chuyển</option>
                                        <option value="3">Giao hàng thành công</option>

                                    </select>
                                    <input type="hidden" name="id_order" value="<?= $nguoinhan['id_order']?>" id="">
                                    <input type="submit" style="background-color: #4e73df;" class="btn bg-yellowhung text-uppercase text-white me-2 mt-2" value="Xác nhận" name="trangthai">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Tổng đơn hàng<span>*</span></label></td>
                                <td><input class="form-control" disabled value="<?= number_format($nguoinhan['tongtienthanhtoan']) ?> VND"></td>
                            </tr>
                            <tr>
                                <td><label>Phương thức thanh toán<span>*</span></label></td>
                                <td>
                                    <input class="form-control" disabled value="<?= $phuongthucthanhtoan ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Địa chỉ <span>*</span></label></td>
                                <td><input class="form-control" disabled value="<?= $nguoinhan['order_diachi'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Họ tên người nhận<span>*</span></label></td>
                                <td><input class="form-control" disabled value="<?= $nguoinhan['order_name'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Số điện thoại<span>*</span></label></td>
                                <td><input class="form-control" disabled value="<?= $nguoinhan['order_phone'] ?>"></td>
                            </tr>
                            <tr>
                                <td><label>Email<span>*</span></label></td>
                                <td><input class="form-control" disabled value="<?= $nguoinhan['order_email'] ?>"></td>
                            </tr>


                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>

</div>