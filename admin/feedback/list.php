<h1>TỔNG HỢP PHẢN HỒI</h1>
<table>
    <thead>
        <th>PHÒNG</th>
        <th>SỐ LƯỢNG PHẢN HỒI</th>
        <th>MỚI NHẤT</th>
        <th>CŨ NHẤT</th>
        <th>ACTION</th>
    </thead>
    <?php
    foreach ($list_thong_ke_feedback as $fb) {
        extract($fb);
        $detail = "index.php?ctr=detail-feedback&id_phong=" . $id_phong;
        echo '
                <tr>
                    <td>' . $ten_phong . '</td>
                    <td>' . $count_fb . '</td>
                    <td>' . $cu_nhat . '</td>
                    <td>' . $moi_nhat . '</td>
                    <td>
                        <a href="' . $detail . '"><input type="button" value="Xem"></a>
                    </td>
                </tr>
                ';
    }
    ?>
</table>