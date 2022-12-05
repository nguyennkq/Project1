<hr>
<form class="form-forget" method="POST" action="">
    <input type="email" placeholder="<?php echo isset($err_email)?$err_email:'Email' ?>" name="email">
    <!-- <input type="text" placeholder="password" name="passdoi">
    <input type="text" placeholder="Nhập lại password" name="nlpass"> -->
    <button type="submit" class="send" name="send">Gửi</button>
</form>