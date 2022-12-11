<h1>Chi tiết đặt phòng</h1>
<table>
    <thead>
        <th>Id chi tiết</th>
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
            $xoa = "index.php?ctr=getdelete-bookingdetail&id_chi_tiet=" . $id_chi_tiet."&id_dat=" . $id_dat;
        ?>
            <tr>
                <td><?= $id_chi_tiet ?></td>
                <td><?= $ten_phong ?></td>
                <td><?= $ngay_vao ?></td>
                <td><?= $ngay_tra ?></td>
                <td><?= $nguoi_lon ?></td>
                <td><?= $tre_em ?></td>
                <td><?= $thanh_tien ?></td>
                <td>
                    <a href="<?=$xoa?>"><input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>