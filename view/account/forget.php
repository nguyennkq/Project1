<hr>
<form class="form-forget" method="POST">
    <input type="email" placeholder="<?php echo isset($err_email)?$err_email:'Email' ?>" name="email">
    <a href="index.php?ctr=doimk">Đổi mật khẩu</a>
    <!-- <input type="text" placeholder="password" name="passdoi">
    <input type="text" placeholder="Nhập lại password" name="nlpass"> -->
    <button type="submit" class="send" name="send">Gửi</button>
</form>

