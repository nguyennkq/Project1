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
            $link = "index.php?ctr=detail-booking&id_dat=" . $id;
            echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $id_nguoi . '</td>
                            <td>' . $ngay_dat . '</td>
                            <td>' . $tong_tien . '</td>
                            <td>
                                <a href="' . $link . '"><input type="button" value="Xem"></a>
                            </td>
                        </tr>';
        }
        ?>
    </tbody>
</table>