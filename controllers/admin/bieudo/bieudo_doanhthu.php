<!DOCTYPE html>
<html>

<head>
  <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
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
  <div style="width: 100%; text-align: center;">
    <div id="myChart" style="display: inline-block; width: 80%; max-width: 800px; height: 600px;">
    </div>
  </div>

  <script>
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      // Set Data
      var data = google.visualization.arrayToDataTable([
                ['Doanh Thu', 'Số lượng đơn hàng'],
                <?php
                $tongdm = count($thongke_doanhthu);
                $i=1;
                foreach ($thongke_doanhthu as $tk_doanhthu) {
                    extract($tk_doanhthu);
                    if ($i == $tongdm) $dauphay = "";
                    else $dauphay = ",";
                    echo "['" . $tk_doanhthu['madh'] . "', " . $tk_doanhthu['total_revenue'] . "]" . $dauphay;
                    $i+=1;
                }
                ?>
            ]);

      // Set Options
      const options = {
        title: 'Biểu đồ danh mục sản phẩm',
        is3D: true
      };

      // Draw
      const chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);

    }
  </script>
</body>

</html>