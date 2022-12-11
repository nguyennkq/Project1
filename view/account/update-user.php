

<?php
     if(isset($_SESSION['user']) && (is_array($_SESSION['user']))){
        extract($_SESSION['user']);
    }

?>
<h3 style="color:red; text-align:center; margin-top:160px; margin-bottom: -120px;">
    <?php
    if (isset($message) && ($message != "")) {
        echo $message;
    }
    ?>
</h3>

<form action="index.php?ctr=update-user" method="POST" class="form-change-password">
<div class="form-control">
        <input type="hidden" name="id_nguoi" value="<?=$id_nguoi?>">
    </div>
    <div class="form-control">
        <label for="">Tên người dùng</label>
        <input type="text" name="ten" value="<?=$ten?>">
    </div>
    <div class="form-control">
        <label for="">Họ tên</label>
        <input type="text" name="ho_ten"  value="<?=$ho_ten?>">
    </div>
    <div class="form-control">
        <label for="">Mật khẩu</label>
        <input type="text" name="mat_khau" value="<?=$mat_khau?>">
    </div>
    <div class="form-control">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi"  value="<?=$dia_chi?>">
    </div>
    <div class="form-control">
        <label for="">CMND/CCCD</label>
        <input type="text" name="cmnd" value="<?=$cmnd?>">
    </div>
    <div class="form-control">
        <label for="">Email</label>
        <input type="text" name="email" value="<?=$email?>">
    </div>
    <div class="form-control">
        <label for="">Số điện thoại</label><br>
        <input type="text" name="so_dien_thoai" value="<?=$so_dien_thoai?>">
    </div>
    <div class="form-control">
        <input type="hidden" name="vai_tro" value="1">
    </div>
    <input type="submit" value="Cập nhật" name="update">
    <input type="reset" value="Nhập lại">
</form>
