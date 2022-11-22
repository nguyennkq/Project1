<h1>Thêm mới người dùng</h1>
<?php
if (isset($message) && ($message != "")) echo '<h3 id="message">' . $message . '</h3>';
?>
<form action="index.php?ctr=add-user" method="POST" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id người dùng</label>
        <input type="text" name="id_nguoi" placeholder="Id người dùng" disabled>
    </div>
    <div class="form-control">
        <label for="">Tên người dùng</label>
        <input type="text" name="ten" placeholder="Tên người dùng">
    </div>
    <div class="form-control">
        <label for="">Họ tên</label>
        <input type="text" name="ho_ten" placeholder="Họ tên">
    </div>
    <div class="form-control">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi" placeholder="Địa chỉ">
    </div>
    <div class="form-control">
        <label for="">Mật khẩu</label>
        <input type="text" name="mat_khau" placeholder="Mật khẩu">
    </div>
    <div class="form-control">
        <label for="">CMND/CCCD</label>
        <input type="text" name="cmnd" placeholder="Số CMND/CCCD">
    </div>
    <div class="form-control">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="email">
    </div>
    <div class="form-control">
        <label for="">Số điện thoại</label><br>
        <input type="text" name="so_dien_thoai" placeholder="Số điện thoại">
    </div>
    <div class="form-control">
        <label for="">Vai trò</label><br>
        <input type="radio" name="vai_tro" value="1" checked>Thành viên
        <input type="radio" name="vai_tro" value="0" >Admin
    </div>
    <input type="submit" value="Thêm mới">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-user"><input type="button" value="Danh sách người dùng"></a>
</form>