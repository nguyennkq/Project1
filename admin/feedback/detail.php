<h1>
    CHI TIẾT BÌNH LUẬN
</h1>
<table border="0">
    <thead>
        <th>NỘI DUNG PHẢN HỒI</th>
        <th>NGÀY PHẢN HỒI</th>
        <th>NGƯỜI PHẢN HỒI</th>
        <th>ACTION</th>
    </thead>
    <?php
    foreach ($items as $item) {
        extract($item);
        $xoa = "index.php?ctr=getdelete-feedback&id_phan_hoi=" . $id_phan_hoi . "&id_phong=" . $id_phong;
        echo '
            <tr>
                <td>' . $binh_luan . '</td>
                <td>' . $thoi_diem . '</td>
                <td>' . $ho_ten . '</td>
                <td>
                    <a href="' . $xoa . '"><input type="button" value="Xóa"></a>
                </td>
            </tr>
            ';
    }
    ?>
</table>