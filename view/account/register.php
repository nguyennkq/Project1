<hr>
<form class="form-register" method="POST" <?php echo isset($thanhcong)? $thanhcong : '' ?>>
    <input type="hidden" name="id_nguoi">
    <input type="text" name="username" placeholder="<?php echo isset($err_name)? $err_name : 'Tên người dùng' ?>">
    <input type="text" placeholder="<?php echo isset($user_name)? $user_name : 'Họ tên' ?>" name="name">
    <label for="" name="">Giới Tính
        <input type="radio" name="gioitinh" id="" value="1" checked>Nam
        <input type="radio" name="gioitinh" id="" value="0">Nữ
    </label>
    <input type="email" placeholder="<?php echo isset($Email)? $Email : 'email' ?>" name="email">
    <input type="text" placeholder="<?php echo isset($pass)? $pass : 'Password' ?>" name="password">
    <input type="text" placeholder="<?php echo isset($dia_chi)? $dia_chi : 'address' ?>" name="address">
    <input type="text" placeholder="<?php echo isset($phone)? $phone : 'Số điện thoại' ?>" name="sdt">
    <input type="text" placeholder="<?php echo isset($cmt)? $cmt : 'Số CMND' ?>" name="cmt">
    <input value="1" name="vai_tro" type="hidden">
    <button type="submit" class="login" name="btn">Đăng ký</button>
</form>
