<h1>Chi tiết đặt phòng</h1>
<table>
    <thead>
        <th>Id đặt</th>
        <th>Tên phòng</th>
        <th>Ngày vào</th>
        <th>Ngày trả</th>
        <th>Người lớn</th>
        <th>Trẻ em</th>
        <th>Thành tiền</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($detail_booking as $booking) {
            extract($booking);
        ?>
            <tr>
                <td><?= $id_dat ?></td>
                <td><?= $ten_phong ?></td>
                <td><?= $ngay_vao ?></td>
                <td><?= $ngay_tra ?></td>
                <td><?= $nguoi_lon ?></td>
                <td><?= $tre_em ?></td>
                <td><?= $thanh_tien ?></td>
                <td>
                    <a href=""><input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href=""><input type="button" value="Thêm mới"></a>