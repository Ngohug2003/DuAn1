<div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quản lý bình luận</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th >STT</th>
                                    <th>Người dùng</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Thời gian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($getbinhluan as $key => $bl) {
                                        extract($bl);
                                        echo '
                                            <tr>
                                                <td>'.$key.'</td>
                                                <td>'.$fullname_user.'</td>
                                                <td>'.$name_sanpham.'</td>
                                                <td>'.$noidung_binhluan.'</td>
                                                <td>'.$ngaybinhluan.'</td>
                                                
                                            </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>