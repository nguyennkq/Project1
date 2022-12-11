<h1>Tùy chỉnh cài đặt</h1>
<?php
if (isset($message) && ($message != "")) echo '<h3 id="message">' . $message . '</h3>';
?>
<form action="index.php?ctr=add-setting" method="POST" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id cài đặt</label>
        <input type="text" name="id_cai_dat" placeholder="Id cài đặt" disabled>
    </div>
    <div class="form-control">
        <label for="">Logo</label>
        <input type="file" name="logo">
        <p style="color: red;"><?php if (isset($error["logo"])) echo $error["logo"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Email</label>
        <input type="text" name="email">
        <p style="color: red;"><?php if (isset($error["email"])) echo $error["email"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi">
        <p style="color: red;"><?php if (isset($error["dia_chi"])) echo $error["dia_chi"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Điện thoại</label>
        <input type="text" name="dien_thoai">
        <p style="color: red;"><?php if (isset($error["dien_thoai"])) echo $error["dien_thoai"] ?></p>
    </div>
    <input type="submit" value="Thêm mới">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-setting"><input type="button" value="Danh sách cài đặt"></a>
</form>