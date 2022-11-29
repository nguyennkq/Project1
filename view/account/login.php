<hr>
<?php
if (isset($message) && ($message != "")) {
    echo $message;
}
?>
<form class="form-login" action="index.php?ctr=login" method="post">
    <input type="text" placeholder="Tên đăng nhập" name="ten">
    <input type="text" placeholder="Password" name="mat_khau">
    <input type="submit" name="login" class="login" value="Đăng nhập">
</form>
<div class="register">
    <a href="index.php?ctr=register">Đăng ký</a>
</div>
<div class="forget">
    <a href="index.php?ctr=forget">Quên mật khẩu?</a>
</div>