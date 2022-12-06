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
        <input type="text" name="ten" placeholder="Tên người dùng"  value="<?php if (isset($ten)) echo $ten ?>">
        <p style="color: red;"><?php if (isset($error["ten"])) echo $error["ten"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Họ tên</label>
        <input type="text" name="ho_ten" placeholder="Họ tên"  value="<?php if (isset($ho_ten)) echo $ho_ten ?>">
        <p style="color: red;"><?php if (isset($error["ho_ten"])) echo $error["ho_ten"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi" placeholder="Địa chỉ" value="<?php if (isset($dia_chi)) echo $dia_chi ?>">
        <p style="color: red;"><?php if (isset($error["dia_chi"])) echo $error["dia_chi"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Mật khẩu</label>
        <input type="text" name="mat_khau" placeholder="Mật khẩu" value="<?php if (isset($mat_khau)) echo $mat_khau ?>">
        <p style="color: red;"><?php if (isset($error["mat_khau"])) echo $error["mat_khau"] ?></p>
    </div>
    <div class="form-control">
        <label for="">CMND/CCCD</label>
        <input type="text" name="cmnd" placeholder="Số CMND/CCCD" value="<?php if (isset($cmnd)) echo $cmnd ?>">
        <p style="color: red;"><?php if (isset($error["cmnd"])) echo $error["cmnd"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="email" value="<?php if (isset($email)) echo $email ?>">
        <p style="color: red;"><?php if (isset($error["email"])) echo $error["email"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Số điện thoại</label><br>
        <input type="text" name="so_dien_thoai" placeholder="Số điện thoại" value="<?php if (isset($so_dien_thoai)) echo $so_dien_thoai ?>"> 
        <p style="color: red;"><?php if (isset($error["so_dien_thoai"])) echo $error["so_dien_thoai"] ?></p>
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