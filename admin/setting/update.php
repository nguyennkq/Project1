<?php
    if(is_array($setting_one)){
        extract($setting_one);
    }

    $anhpath = "../upload/".$logo;
    if(is_file($anhpath)){
     $logo = "<img src='".$anhpath."' width='200px' height='200px'";
    } else {
     $logo = "";
    }
?>

<h1>Cập nhật cài đặt</h1>
<form action="index.php?ctr=update-setting" method="post" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id cài đặt</label>
        <input type="text" name="id_cai_dat" placeholder="Id cài đặt" disabled>
        <input type="hidden" name="id_cai_dat" value="<?=$id_cai_dat?>">
    </div>
    <div class="form-control">
        <label for="">Logo</label>
        <input type="file" name="logo"><?=$logo?><br>
    </div>
    <div class="form-control">
        <label for="">Email</label>
        <input type="text" name="email" value="<?=$email?>">
    </div>
    <div class="form-control">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi" value="<?=$dia_chi?>">
    </div>
    <div class="form-control">
        <label for="">Điện thoại</label>
        <input type="text" name="dien_thoai" value="<?=$dien_thoai?>">
    </div>
   
    <input type="submit" value="Cập nhật" name="update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-setting"><input type="button" value="Danh sách cài đặt"></a>
</form>