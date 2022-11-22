<h1>Cập nhật người dùng</h1>
<?php
    if (is_array($user_one)) {
        extract($user_one);
    }
?>
<form action="index.php?ctr=update-user" method="POST" enctype="multipart/form-data">
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
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi"  value="<?=$dia_chi?>">
    </div>
    <div class="form-control">
        <label for="">Mật khẩu</label>
        <input type="text" name="mat_khau" value="<?=$mat_khau?>">
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
        <label for="">Vai trò</label><br>
        <input type="radio" name="vai_tro" value="0" <?= $vai_tro==0 ? 'checked' : "" ?>>Admin
        <input type="radio" name="vai_tro" value="1" <?= $vai_tro==1 ? 'checked' : "" ?>>Thành viên
    </div>
    <input type="submit" value="Cập nhật" name="update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-user"><input type="button" value="Danh sách người dùng"></a>
</form>