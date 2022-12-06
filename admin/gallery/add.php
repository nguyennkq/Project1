<h1>Thêm mới thư viện ảnh</h1>
<?php
     if(isset($message) && ($message!="")) echo '<h3 id="message">'.$message.'</h3>';
?>
<form action="index.php?ctr=add-gallery" method="POST" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id thư viện</label>
        <input type="text" name="id_thu_vien" placeholder="Id thư viện" disabled>
    </div>
    <div class="form-control">
        <label for="">Phòng</label>
        <select name="id_phong" id="">
            <?php foreach ($list_room as $room) {
                extract($room);
                echo '<option value="' . $id_phong . '">' . $ten_phong . '</option>';
            } ?>
        </select>
    </div>
    <div class="form-control">
        <label for="">Ảnh thư viện</label>
        <input type="file" name="anh_thu_vien">
        <p style="color: red;"><?php if (isset($error["anh_thu_vien"])) echo $error["anh_thu_vien"] ?></p>
    </div>
    <input type="submit" value="Thêm mới" name="add">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-gallery"><input type="button" value="Danh sách thư viện"></a>
</form>