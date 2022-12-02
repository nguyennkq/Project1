<hr>
<?php
if (isset($_SESSION['nguoi_dung'])) {
    extract($_SESSION['nguoi_dung']);?>
<?php } ?>
    <form class="form-login" method="POST" action="index.php?ctr=login">
        <input type="email" placeholder="<?php echo isset($tb) ? $tb : 'Email' ?>" name="email">
        <input type="text" placeholder="<?php echo isset($tb) ? $tb : 'Pass' ?>" name="pass">
        <button type="submit" class="login" name="btn-dn" value="Đăng nhập">Đăng nhập</button>
    </form>
    <div class="register">
        <a href="index.php?ctr=register">Đăng ký</a>
    </div>
    <div class="forget">
        <a href="index.php?ctr=forget">Quên mật khẩu?</a>
    </div>
