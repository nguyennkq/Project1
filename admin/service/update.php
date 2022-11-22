<?php
if (is_array($service_one)) {
    extract($service_one);
}

$anhpath = "../upload/" . $hinh_anh;
if (is_file($anhpath)) {
    $hinh_anh = "<img src='" . $anhpath . "' width='100px' height='100px'";
} else {
    $hinh_anh = "";
}

?>
<h1>Cập nhật dịch vụ</h1>
<form action="index.php?ctr=update-service" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_dich_vu" value="<?= $id_dich_vu ?>">
    <div class="form-control">
        <label for="">Id dịch vụ</label>
        <input type="text" name="id_dich_vu" placeholder="Id dịch vụ" disabled>
    </div>
    <div class="form-control">
        <label for="">Tên dịch vụ</label>
        <input type="text" name="ten_dich_vu" placeholder="Tên dịch vụ" value="<?= $ten_dich_vu ?>">
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
        <label for="">Ảnh dịch vụ</label>
        <input type="file" name="hinh_anh"><?= $hinh_anh ?>
    </div><br><br>
    <input type="submit" value="Cập nhật" name="update">
    <input type="reset" value="Nhập lại">
    <a href="index.php?ctr=list-service"><input type="button" value="Danh sách dịch vụ"></a>
</form>
