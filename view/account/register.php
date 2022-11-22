<hr>
<form class="form-register" method="post">
    <input type="hidden" name="id_nguoi">
    <input type="text" placeholder="<?php echo isset($err_ten)? $err_ten : 'Tên' ?>" name="ten">
    <input type="text" placeholder="<?php echo isset($err_ho_ten)? $err_ho_ten : 'Họ tên' ?>" name="ho_ten">
    <input type="email" placeholder="<?php echo isset($err_email)? $err_email : 'Email' ?>" name="email">
    <input type="text" placeholder="<?php echo isset($err_mat_khau)? $err_mat_khau : 'Mật khẩu' ?>" name="mat_khau">
    <input type="text" placeholder="<?php echo isset($err_dia_chi)? $err_dia_chi : 'Địa chỉ' ?>" name="dia_chi">
    <input type="text" placeholder="<?php echo isset($err_cmnd)? $err_cmnd : 'Số CMND/CCCD' ?>" name="cmnd">
    <input type="text" placeholder="<?php echo isset($err_so_dien_thoai)? $err_so_dien_thoai : 'Điện thọai' ?>" name="so_dien_thoai">
    <input value="1" name="vai_tro" type="hidden">
    <button type="submit" name="btn" class="login">Đăng ký</button>
</form>
