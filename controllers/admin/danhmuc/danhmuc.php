<div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Quản lý danh mục</h2>
            </div>

            <table>
              <thead>
                <tr>
                  <td>Name</td>
                  <td>Image</td>
                  <td>Price</td>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($sanpham as $sp ):?>
                <tr>
                  <td><?php echo $sp['name_sanpham']  ?></td>
                  <td style="height: 100px;"><img style="max-height:100%" src="../../views/assets/img/product/<?php echo $sp['image_sanpham']?>" alt=""></td>
                  <td><?php echo $sp['gia_sanpham']?> VND</td>
                </tr>   
                <?php endforeach?>
              </tbody>
            </table>
          </div>

        </div>