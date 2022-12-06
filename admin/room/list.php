<h1>Danh sách phòng</h1>
<table>
    <thead>
        <th>Id</th>
        <th>Tên phòng</th>
        <th>Giá phòng</th>
        <th>Mô tả</th>
        <th>Ảnh phòng</th>
        <th>Người lớn tối đa</th>
        <th>Trẻ em tối đa</th>
        <th>Trạng thái</th>
        <th>Diện tích</th>
        <th>Lượt xem</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($list_room as $room) {
            extract($room);
            // $update = "index.php?ctr=getupdate-room&id_phong=" . $id_phong;
            // $delete = "index.php?ctr=getdelete-room&id_phong=" . $id_phong;
            $anhpath = "../upload/" . $anh_phong;
            if (is_file($anhpath)) {
                $anh_phong = "<img src='" . $anhpath . "' width='100px' height='100px'>";
            } else {
                $anh_phong = "";
            }
        ?>
            <tr>
                <td><?= $id_phong ?></td>
                <td><?= $ten_phong ?></td>
                <td><?= $gia_phong ?></td>
                <td class="desc"><?= $mo_ta ?></td>
                <td><?= $anh_phong ?></td>
                <td><?= $nguoi_lon_max ?></td>
                <td><?= $tre_em_max ?></td>
                <td><?= $trang_thai==1 ? 'Còn trống' : 'Đã đặt' ?></td>
                <td><?= $dien_tich ?></td>
                <td><?= $luot_xem ?></td>
                <td>
                    <a href="index.php?ctr=getupdate-room&id_phong=<?= $id_phong ?>"><input type="button" value="Sửa"></a>
                    <a onclick="if(!confirm('Bạn có muốn xóa?')){return false}" href="index.php?ctr=getdelete-room&id_phong=<?= $id_phong ?>"><input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="index.php?ctr=add-room"><input type="button" value="Thêm mới"></a>