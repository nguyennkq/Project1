<hr>
<form class="form-forget" method="POST" action="">
    <input type="email" placeholder="<?php if(isset($err)){echo $err;}else{ echo 'Email';} ?>" name="email">
    <!-- <input type="text" placeholder="password" name="passdoi">
    <input type="text" placeholder="Nhập lại password" name="nlpass"> -->
    <span><?php if(isset($err)){echo $err;} ?></span> <br>
    <button type="submit" class="send" name="send">Gửi</button>
</form>