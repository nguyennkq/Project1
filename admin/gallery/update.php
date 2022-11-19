<?php
if (is_array($gallery_one)) {
    extract($gallery_one);
}

$anhpath = "../upload/" . $anh_thu_vien;
if (is_file($anhpath)) {
    $anh_thu_vien = "<img src='" . $anhpath . "' width='100px' height='100px'";
} else {
    $anh_thu_vien = "";
}

?>
<h1>Cập nhật thư viện ảnh</h1>
<form action="index.php?ctr=update-gallery" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_thu_vien" value="<?= $id_thu_vien ?>">
    <div class="form-control">
        <label for="">Id thư viện</label>
        <input type="text" name="id_thu_vien" placeholder="Id thư viện" disabled>
    </div>
    <div class="form-control">
        <label for="">Phòng</label>
        <select name="id_phong" id="">
            <?php foreach ($list_room as $room) {
                if ($room['id_phong'] == $id_phong) {
                    echo ' <option selected value="' . $room['id_phong'] . '" >' . $room['ten_phong'] . '</option>';
                } else {
                    echo ' <option value="' . $room['id_phong'] . '">' . $room['ten_phong'] . '</option>';
                }
            } ?>
        </select>
    </div>
    <div class="form-control">
        <label for="">Ảnh thư viện</label>
        <input type="file" name="anh_thu_vien"><?= $anh_thu_vien ?>
    </div><br><br>
    <input type="submit" value="Cập nhật" name="update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-gallery"><input type="button" value="Danh sách thư viện"></a>
</form>