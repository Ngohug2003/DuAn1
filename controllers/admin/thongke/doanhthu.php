<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">


        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


            <form class="form-inline">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </form>

            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>


            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        if (isset($_SESSION['username'])) {
                            extract($_SESSION['username']);
                            echo '<span style="font-size:20px" class="mr-2 d-none d-lg-inline text-gray-600 small">' . $username_user . '</span';
                        } else {
                        ?>
                        <?php }

                        ?>

                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
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
                                    <th>ID đơn hàng</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng tiền</th>
                            
                                </tr>
                              
                            </thead>
                            <tbody>
                                <?php  
                                
                                $tongtienthu = 0;
                                ?>
                                <?php foreach ($thongke_doanhthu as $key => $dt) : ?>
                                    <tr>
                                        <td><?= $dt['id_order'] ?></td>
                                        <td><?= $dt['madh'] ?></td>
                                        <td><?= number_format($dt['total_revenue']) ?> VND</td>
                                    </tr>
                                   <?php  $tongtienthu +=$dt['total_revenue'] ?>
                                <?php endforeach; ?>

                            </tbody>
                            <tr>
                                    <td>Tổng doanh thu</td>
                                    <th colspan="2" ><?=number_format( $tongtienthu)?> VND</th>
                                    
                            </tr>
                          
                        
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <div style="margin-left: 27px;">

            <a class="btn btn-primary " href="index_admin.php?act=bieudo_doanhthu">Xem biểu đồ</a>
        </div>
    </div>

    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>

</div>

</div>
