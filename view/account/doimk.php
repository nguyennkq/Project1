<form action="index.php?ctr=doimk" method="POST">
    <input type="text" class="" name="email" id="" placeholder="<?php if(isset($err)){echo $err;}elseif(isset($err_mail)){echo $err_mail;}else{echo 'Nhập email';} ?>">
    <input type="text" name="mk_moi" placeholder="<?php if(isset($pass_moi)){echo $pass_moi;}else{echo "Nhập mật khẩu mới";} ?>" id="">
    <input type="submit" class="login" name="xacnhan" value="Xác nhận">
</form>