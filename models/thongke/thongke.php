<?php
function loadAll_thongke()
{
    $sql = "SELECT danhmuc.id_danhmuc as madm , danhmuc.name_danhmuc as tendm , count(sanpham.id_sanpham) as countsp ,
     min(sanpham.gia_sanpham) as mingia , max(sanpham.gia_sanpham) as maxgia ,
     avg(sanpham.gia_sanpham) as avg
      from sanpham left join danhmuc on danhmuc.id_danhmuc  = sanpham.id_danhmuc group by danhmuc.id_danhmuc order by danhmuc.id_danhmuc asc";

      $loadAll_thongke = pdo_query($sql);
      return $loadAll_thongke ;
}
function loadall_doanhthu()
{
    $sql = "SELECT id_order, madh, SUM(tongtienthanhtoan) as total_revenue
            FROM `bill_order`
            WHERE trangthaidonhang = '3'
            GROUP BY id_order, madh";
    
    $list_doanhthu = pdo_query($sql);
    return $list_doanhthu;
}

