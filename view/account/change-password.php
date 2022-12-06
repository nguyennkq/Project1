<hr>
<form action="index.php?ctr=change-password" class="form-change-password" method="POST">
    <input type="text" class="" name="mk_cu" id="" placeholder="<?php if(isset($err)){echo $err;}elseif(isset($err_pass)){echo $err_pass;}else{echo 'Nhập mật khẩu cũ';} ?>">
    <input type="text" name="mk_moi" placeholder="<?php if(isset($pass_moi)){echo $pass_moi;}else{echo "Nhập mật khẩu mới";} ?>" id="">
    <span><?php if(isset($message)){echo $message;} ?></span> <br>
    <input type="submit" class="login" name="xacnhan" value="Xác nhận">
</form>