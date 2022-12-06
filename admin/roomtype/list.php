<h1>Danh sách loại phòng</h1>
<table>
    <thead>
        <th>STT</th>
        <th>Tên loại phòng</th>
        <th>Hình ảnh</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($list_roomtype as $roomtype) {
            extract($roomtype);
            $update = "index.php?ctr=getupdate-roomtype&id_loai=" . $id_loai;
            $delete = "index.php?ctr=getdelete-roomtype&id_loai=" . $id_loai;
            $anhpath = "../upload/" . $anh_loai;
            if (is_file($anhpath)) {
                $anh_loai = "<img src='" . $anhpath . "' width='100px' height='100px'>";
            } else {
                $anh_loai = "";
            }
        ?>

            <tr>
                <td><?= $id_loai ?></td>
                <td><?= $ten_loai ?></td>
                <td><?= $anh_loai ?></td>
                <td>
                    <a href="<?= $update ?>"><input type="button" value="Sửa"></a>
                    <a onclick="if(!confirm('Bạn có muốn xóa?')){return false}" href="<?= $delete ?>"><input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="index.php?ctr=add-roomtype"><input type="button" value="Thêm mới"></a>