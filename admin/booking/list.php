<h1>Danh sách đặt phòng</h1>
<table>
    <thead>
        <th>Id đặt phòng</th>
        <th>Người đặt</th>
        <th>Ngày đặt</th>
        <th>Tổng tiền</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($list_booking as $booking) {
            extract($booking);
            $view = "index.php?ctr=detail-booking&id_dat=" . $id;
            $delete = "index.php?ctr=getdelete-booking&id_dat=" . $id;
            echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $ho_ten . '</td>
                            <td>' . $ngay_dat . '</td>
                            <td>' . $tong_tien . '</td>
                            <td>
                                <a href="' . $view . '"><input type="button" value="Xem"></a>
                                <a href="' . $delete . '"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>';
        }
        ?>
    </tbody>
</table>