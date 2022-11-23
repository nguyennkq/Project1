<h1>Thêm mới phòng</h1>
<?php
if (isset($message) && ($message != "")) echo '<h3 id="message">' . $message . '</h3>';
?>
<form action="index.php?ctr=add-room" method="POST" enctype="multipart/form-data">
    <div class="form-control">
        <label for="">Id phòng</label>
        <input type="text" name="id_phong" placeholder="Id phòng" disabled>
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
        <label for="">Tên phòng</label>
        <input type="text" name="ten_phong" placeholder="Tên phòng">
    </div>
    <div class="form-control">
        <label for="">Giá phòng phòng</label>
        <input type="text" name="gia_phong" placeholder="Giá phòng">
    </div>
    <div class="form-control">
        <label for="">Hình ảnh</label>
        <input type="file" name="anh_phong">
    </div>
    <div class="form-control">
        <label for="">Người lớn tối đa</label>
        <input type="text" name="nguoi_lon_max" placeholder="Người lớn tối đa">
    </div>
    <div class="form-control">
        <label for="">Trẻ em tối đa</label>
        <input type="text" name="tre_em_max" placeholder="Trẻ em tối đa">
    </div>
    <div class="form-control">
        <label for="">Diện tích</label>
        <input type="text" name="dien_tich" placeholder="Diện tích">
    </div>
    <div class="form-control">
        <label for="">Trạng thái</label><br>
        <input type="radio" name="trang_thai" value="0">Đã đặt
        <input type="radio" name="trang_thai" value="1" checked>Còn trống
    </div>
    <div class="form-control">
        <label for="">Mô tả</label><br>
        <textarea name="mo_ta" id="" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" value="Thêm mới">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-room"><input type="button" value="Danh sách phòng"></a>
</form>