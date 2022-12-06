<h1>Thêm mới loại phòng</h1>
<?php
if (isset($message) && ($message != "")) echo '<h3 id="message">' . $message . '</h3>';
?>
<form action="index.php?ctr=add-roomtype" method="POST" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id loại phòng</label>
        <input type="text" name="id_loai" placeholder="Id loại phòng" disabled>
    </div>
    <div class="form-control">
        <label for="">Tên loại phòng</label>
        <input type="text" name="ten_loai" placeholder="Tên loại phòng" value="<?php if (isset($ten_loai)) echo $ten_loai ?>">
        <p style="color: red;"><?php if (isset($error["ten_loai"])) echo $error["ten_loai"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Hình ảnh</label>
        <input type="file" name="anh_loai">
        <p style="color: red;"><?php if (isset($error["anh_loai"])) echo $error["anh_loai"] ?></p>
    </div>
    <input type="submit" value="Thêm mới">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-roomtype"><input type="button" value="Danh sách loại phòng"></a>
</form>