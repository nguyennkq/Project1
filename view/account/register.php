<hr>
<form class="form-register" method="POST" action="">
    <input type="hidden" name="id_nguoi">
    <input type="text" name="username" placeholder="<?php echo isset($err_name)? $err_name : 'Tên người dùng' ?>">
    <input type="text" placeholder="<?php echo isset($user_name)? $user_name : 'Họ tên' ?>" name="name">
    <input type="email" placeholder="<?php echo isset($Email)? $Email : 'email' ?>" name="email">
    <input type="text" placeholder="<?php echo isset($pass)? $pass : 'Password' ?>" name="password">
    <input type="text" placeholder="<?php if(isset($pass1)){ echo $pass1;}elseif(isset($pass2)){ echo $pass2;}else{echo 'Nhập lại password';} ?>" name="pass">
    <input type="text" placeholder="<?php echo isset($dia_chi)? $dia_chi : 'address' ?>" name="address">
    <input type="text" placeholder="<?php echo isset($phone)? $phone : 'Số điện thoại' ?>" name="sdt">
    <input type="text" placeholder="<?php echo isset($cmt)? $cmt : 'Số CMND' ?>" name="cmt">
    <input value="1" name="vai_tro" type="hidden">
    <button type="submit" class="login" name="btn">Đăng ký</button>
    <span><?php if(isset($thanhcong)){echo $thanhcong;} ?></span>
</form>
