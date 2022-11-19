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
        <label for="">Loại phòng</label>
        <select name="id_loai" id="">
            <?php foreach ($list_roomtype as $roomtype) {
                extract($roomtype);
                echo '<option value="' . $id_loai . '">' . $ten_loai . '</option>';
            } ?>
        </select>
    </div>
    <div class="form-control">
        <label for="">Ảnh thư viện</label>
        <input type="file" name="anh_thu_vien">
    </div>
    <input type="submit" value="Thêm mới">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-gallery"><input type="button" value="Danh sách loại phòng"></a>
</form>