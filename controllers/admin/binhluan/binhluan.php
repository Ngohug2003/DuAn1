<div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quản lý sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Người dùng</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội Dung</th>
                                    <th>Thời gian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($getBinhLuan as $key => $bl){
                                        echo '<tr>
                                        <td>'.($key+1).'</td>
                                        <td>'.$bl['fullname_user'].'</td>
                                        <td>'.$bl['name_sanpham'].'</td>
                                        <td>'.$bl['noidung_binhluan'].'</td>
                                        <td>'.$bl['ngaybinhluan'].'</td>
                                        <td><a href="index_admin.php?act=delete_binhluan&id_binhluan='.$bl['id_binhluan'].'">Xóa</a></td>
                                        </tr>';
                                    }
                                    
                                ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>