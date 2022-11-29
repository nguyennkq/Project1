<hr>

<form class="form-login" action="index.php?ctr=login" method="post">
    <input type="text" placeholder="Tên đăng nhập" name="ten">
    <input type="text" placeholder="Password" name="mat_khau">
    <input type="submit" name="login" class="login" value="Đăng nhập">
</form>
<h3 style="color:red; text-align:center;">
    <?php
    if (isset($message) && ($message != "")) {
        echo $message;
    }
    ?>
</h3>
<div class="register">
    <a href="index.php?ctr=register">Đăng ký</a>
</div>
<div class="forget">
    <a href="index.php?ctr=forget">Quên mật khẩu?</a>
</div>

