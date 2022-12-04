<form action="index.php?ctr=change-password" method="POST" class="form-change-password">
    Tên đăng nhập
    <br>
    <input type="text" name="ten" required>
    <br>
    Mật khẩu cũ<br>
    <input type="text" name="mat_khau"><br>
    Mật khẩu mới<br>
    <input type="text" name="mat_khau_moi"><br>
    <input type="submit" value="Gửi" name="send">
    <input type="reset" value="Nhập lại">
</form>
<h3 style="color:red;text-align:center;">
    <?php
    if (isset($message) && ($message != "")) {
        echo $message;
    }
    ?>
</h3>