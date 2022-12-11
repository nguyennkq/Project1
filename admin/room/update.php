<?php
if (is_array($room_one)) {
    extract($room_one);
}

$anhpath = "../upload/" . $anh_phong;
if (is_file($anhpath)) {
    $anh_phong = "<img src='" . $anhpath . "' width='100px' height='100px'";
} else {
    $anh_phong = "";
}
?>

<h1>Cập nhật phòng</h1>
<form action="index.php?ctr=update-room" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_phong" value="<?= $id_phong ?>">
    <label for="">Loại phòng</label>
    <select name="id_loai">
        <?php foreach ($list_roomtype as $roomtype) {
            if ($roomtype['id_loai'] == $id_loai) {
                echo ' <option selected value="' . $roomtype['id_loai'] . '" >' . $roomtype['ten_loai'] . '</option>';
            } else {
                echo ' <option value="' . $roomtype['id_loai'] . '">' . $roomtype['ten_loai'] . '</option>';
            }
        } ?>
    </select>
    <div class="form-control">
        <label for="">Tên phòng</label>
        <input type="text" name="ten_phong" value="<?= $ten_phong ?>">
    </div>
    <div class="form-control">
        <label for="">Giá phòng phòng</label>
        <input type="text" name="gia_phong" value="<?= $gia_phong ?>">
    </div>
    <div class="form-control">
        <label for="">Hình ảnh</label>
        <input type="file" name="anh_phong"><?= $anh_phong ?>
    </div>
    <div class="form-control">
        <label for="">Người lớn tối đa</label>
        <input type="text" name="nguoi_lon_max" value="<?= $nguoi_lon_max ?>">
    </div>
    <div class="form-control">
        <label for="">Trẻ em tối đa</label>
        <input type="text" name="tre_em_max" value="<?= $tre_em_max ?>">
    </div>
    <div class="form-control">
        <label for="">Diện tích</label>
        <input type="text" name="dien_tich" value="<?= $dien_tich ?>">
    </div>
    <div class="form-control">
        <label for="">Diện tích</label>
        <input type="text" name="luot_xem" value="<?= $luot_xem ?>" readonly>
    </div>
    <div class="form-control">
        <label for="">Trạng thái</label><br>
        <input type="radio" name="trang_thai" value="0" <?= $trang_thai==0 ? 'checked' : "" ?>>Đã đặt
        <input type="radio" name="trang_thai" value="1" <?= $trang_thai==1 ? 'checked' : "" ?>>Còn trống
    </div>
    <div class="form-control">
        <label for="">Mô tả</label>
        <textarea name="mo_ta" id="" cols="30" rows="10"><?= $mo_ta ?></textarea>
    </div>
    <input type="submit" value="Cập nhật" name="update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-room"><input type="button" value="Danh sách loại phòng"></a>
</form>