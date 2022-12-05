<hr>
<form class="form-login" method="POST" action="index.php?ctr=login">
    <input type="text" placeholder="<?php echo isset($tb) ? $tb : 'ten' ?>" name="ten">
    <input type="text" placeholder="<?php echo isset($tb) ? $tb : 'Pass' ?>" name="pass">
    <button type="submit" class="login" name="btn-dn" value="Đăng nhập">Đăng nhập</button>
</form>
<div class="register">
    <a href="index.php?ctr=register">Đăng ký</a>
</div>
<div class="forget">
    <a href="index.php?ctr=forget">Quên mật khẩu?</a>
</div>
