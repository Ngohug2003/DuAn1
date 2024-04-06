<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Tài Khoản của tôi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">

                            <li> <a href="#orders" data-bs-toggle="tab" class="nav-link active">Đơn hàng của bạn</a></li>

                            <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Thông tin tài khoản</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">

                        <div class="tab-pane fade show active" id="orders">
                            <h3>Đơn hàng</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>                                        
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($listDonHang as $key => $dh) : ?>
                                         <?php    $trangthaidonhang= trangThaiDonHang($dh['trangthaidonhang']);?>
                                     
                                         <?php ?>
                                         <?php 
                                             $tongtiendonhang_format = number_format($dh['tongtienthanhtoan'],0,'','.') ." VND";
                                         
                                         ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $dh['madh'] ?></td>
                                                <td><?= $dh['ngaydathang'] ?></td>
                                                <td><?= $tongtiendonhang_format ?></td>
                                                <td><span class="success"><?= $trangthaidonhang?></span></td>
                                                
                                                <td><a href="index.php?act=donhang&id_donhang=<?= $dh['id_order']?>" class="view">Xem chi tiết</a></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>

                            
                        </div>


                        <div class="tab-pane fade" id="account-details">
                            <h3>Chi tiết tài khoản </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="" method="post" enctype="multipart/form-data"> <br>
                                            <img style="height: 70px; border-radius: 50%;" src="./views/assets/img/avatar/<?= $one_user['image_user'] ?>" alt="Avatar"><br>
                                            <label>Avatar</label>
                                            <input type="file" name="image_user" id="">
                                            <label>Họ và tên</label>
                                            <input value="<?= $one_user['fullname_user'] ?>" type="text" name="fullname_user">
                                            <label>Email</label>
                                            <input value="<?= $one_user['email_user'] ?>" type="text" name="email_user">
                                            <label>Mật khẩu</label>
                                            <input id="ipnPassword" value="<?= $one_user['password_user'] ?>" type="password" name="password_user">
                                            <label>Số điện thoại</label>
                                            <input value="<?= $one_user['phone_user'] ?>" type="text" name="phone_user">
                                            <label>Địa chỉ</label>
                                            <input value="<?= $one_user['diachi_user'] ?>" type="text" name="diachi_user">

                                            <br>
                                            <div class="save_button primary_btn default_button">
                                                <input type="submit" style="background-color: #09c6ab;" class="btn bg-yellowhung text-uppercase text-white me-3" value="Lưu" name="luu_thongtin">
                                            </div>
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
</section>