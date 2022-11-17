<?php
    if(is_array($roomtype_one)){
        extract($roomtype_one);
    }

    $anhpath = "../upload/".$anh_loai;
    if(is_file($anhpath)){
     $anh_loai = "<img src='".$anhpath."' width='200px' height='200px'";
    } else {
     $anh_loai = "";
    }
?>

<h1>Cập nhật loại phòng</h1>
<form action="index.php?ctr=update-roomtype" method="post" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id loại phòng</label>
        <input type="text" name="id_loai" placeholder="Id loại phòng" disabled>
        <input type="hidden" name="id_loai" value="<?=$id_loai?>">
    </div>
    <div class="form-control">
        <label for="">Tên loại phòng</label>
        <input type="text" name="ten_loai" placeholder="Tên loại phòng" value="<?=$ten_loai?>">
    </div>
    <div class="form-control">
        <label for="">Hình ảnh</label>
        <input type="file" name="anh_loai"><?=$anh_loai?><br>
    </div>
    <input type="submit" value="Cập nhật" name="update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-roomtype"><input type="button" value="Danh sách loại phòng"></a>
</form>