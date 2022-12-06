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
        <input type="text" name="ten_phong" placeholder="Tên phòng" value="<?php if (isset($ten_phong)) echo $ten_phong ?>">
        <p style="color: red;"><?php if (isset($error["ten_phong"])) echo $error["ten_phong"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Giá phòng phòng</label>
        <input type="text" name="gia_phong" placeholder="Giá phòng" value="<?php if (isset($gia_phong)) echo $gia_phong ?>">
        <p style="color: red;"><?php if (isset($error["gia_phong"])) echo $error["gia_phong"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Hình ảnh</label>
        <input type="file" name="anh_phong">
        <p style="color: red;"><?php if (isset($error["anh_phong"])) echo $error["anh_phong"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Người lớn tối đa</label>
        <input type="text" name="nguoi_lon_max" placeholder="Người lớn tối đa"  value="<?php if (isset($nguoi_lon_max)) echo $nguoi_lon_max ?>">
        <p style="color: red;"><?php if (isset($error["nguoi_lon_max"])) echo $error["nguoi_lon_max"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Trẻ em tối đa</label>
        <input type="text" name="tre_em_max" placeholder="Trẻ em tối đa"  value="<?php if (isset($tre_em_max)) echo $tre_em_max ?>">
        <p style="color: red;"><?php if (isset($error["tre_em_max"])) echo $error["tre_em_max"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Diện tích</label>
        <input type="text" name="dien_tich" placeholder="Diện tích"  value="<?php if (isset($dien_tich)) echo $dien_tich ?>">
        <p style="color: red;"><?php if (isset($error["dien_tich"])) echo $error["dien_tich"] ?></p>
    </div>
    <div class="form-control">
        <label for="">Số lượt xem</label>
        <input type="text" name="luot_xem" value="0" readonly>
    </div>
    <div class="form-control">
        <label for="">Trạng thái</label><br>
        <input type="radio" name="trang_thai" value="0">Đã đặt
        <input type="radio" name="trang_thai" value="1" checked>Còn trống
    </div>
    <div class="form-control">
        <label for="">Mô tả</label><br>
        <textarea name="mo_ta" id="" cols="30" rows="10"><?php if (isset($mo_ta)) echo $mo_ta ?></textarea>
        <p style="color: red;"><?php if (isset($error["mo_ta"])) echo $error["mo_ta"] ?></p>
    </div>
    <input type="submit" value="Thêm mới">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-room"><input type="button" value="Danh sách phòng"></a>
</form>