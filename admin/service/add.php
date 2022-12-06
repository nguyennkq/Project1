<h1>Thêm mới dịch vụ</h1>
<?php
     if(isset($message) && ($message!="")) echo '<h3 id="message">'.$message.'</h3>';
?>
<form action="index.php?ctr=add-service" method="POST" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id dịch vụ</label>
        <input type="text" name="id_dich_vu" placeholder="Id dịch vụ" disabled>
    </div>
    <div class="form-control">
        <label for="">Tên dịch vụ</label>
        <input type="text" name="ten_dich_vu" placeholder="Tên dịch vụ"  value="<?php if (isset($ten_dich_vu)) echo $ten_dich_vu ?>">
        <p style="color: red;"><?php if (isset($error["ten_dich_vu"])) echo $error["ten_dich_vu"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Chọn phòng</label>
        <select name="id_phong" id="">
            <?php foreach ($list_room as $room) {
                extract($room);
                echo '<option value="' . $id_phong . '">' . $ten_phong . '</option>';
            } ?>
        </select>
    </div>
    <div class="form-control">
        <label for="">Ảnh dịch vụ</label>
        <input type="file" name="hinh_anh">
        <p style="color: red;"><?php if (isset($error["hinh_anh"])) echo $error["hinh_anh"] ?></p>
    </div>
    <input type="submit" value="Thêm mới" name="add">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-service"><input type="button" value="Danh sách dịch vụ"></a>
</form>