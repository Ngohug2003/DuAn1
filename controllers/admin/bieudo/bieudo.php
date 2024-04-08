<!DOCTYPE html>
<html>

<head>
  <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
<div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ danh mục sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã danh mục</th>
                                    <th>Tên danh mục</th>
                                    <th>Số lượng</th>
                                    <th>Giá cao nhất</th>
                                    <th>Giá thấp nhất</th>
                                    <th>Giá trung bình</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($thongke as $key => $tk) : ?>
                                    <tr>
                                        <td><?= $tk['madm'] ?></td>
                                        <td><?= $tk['tendm'] ?></td>
                                        <td><?= $tk['countsp'] ?></td>
                                        <td><?= number_format($tk['maxgia']) ?> VND</td>
                                        <td><?= number_format($tk['mingia']) ?> VND</td>
                                        <td><?= number_format($tk['avg']) ?> VND</td>


                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
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
                ['Danh mục', 'Số lượng sản phẩm'],
                <?php
                $tongdm = count($thongke);
                $i=1;
                foreach ($thongke as $bieudo) {
                    extract($bieudo);
                    if ($i == $tongdm) $dauphay = "";
                    else $dauphay = ",";
                    echo "['" . $bieudo['tendm'] . "', " . $bieudo['countsp'] . "]" . $dauphay;
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