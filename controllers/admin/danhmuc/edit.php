
<?php
    if(is_array($dm)) {
        extract($dm);
    }
?>
<div class="container">
    <form action="index_admin.php?act=update" method="post">
        <div>
            <input type="hidden" name="id_danhmuc" value="<?php if(isset($id_danhmuc)&&($id_danhmuc>0)) echo $id_danhmuc; ?>">
        </div>
        <div class="mt-5">
            <label class="form-label " for="">Update danh mục</label>
            <input value="<?php echo $dm['name_danhmuc']?>" class="form-control " type="text" name="name_danhmuc" id="" > 
            <span style="color: red"><?php echo isset($error["name_danhmuc"]) ? $error["name_danhmuc"] : '' ?></span>
        </div>
        <div class="mt-4">
             <a class="btn btn-secondary " href="index_admin.php?act=danhmuc">Danh mục</a>
             <input class="btn btn-warning " type="reset" value="Nhập Lại" name="" id="">
             <input class="btn btn-success " type="submit" name="update" id="" value="Cập nhật ">
            
        </div>
        <div class="mt-2"> <span  style="color: green"><?php echo isset($thongbao) ? $thongbao : '' ?></span></div>
       
    </form>
</div>
