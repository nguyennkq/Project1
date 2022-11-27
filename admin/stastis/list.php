<h1>DANH SÁCH THỐNG KÊ</h1>
    <table >
        <thead>
                <th>ID LOẠI PHÒNG</th>
                <th>LOẠI PHÒNG</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
        </thead>
        <tbody>
            <?php
                foreach ($list_stastis as $stastis) {
                    extract($stastis);
                    echo '<tr>
                            <td>'.$maloai.'</td>
                            <td>'.$tenloai.'</td>
                            <td>'.$countphong.'</td>
                            <td>'.$max_gia_phong.'</td>
                            <td>'.$min_gia_phong.'</td>
                            <td>'.$avg_gia_phong.'</td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
    <div>
        <a href="index.php?ctr=diagram"><input type="button" value="Xem biểu đồ"></a>
    </div>

    <h1>DANH SÁCH THỐNG KÊ NGƯỜI DÙNG</h1>
    <table >
        <thead>
                <th>MÃ NGƯỜI DÙNG</th>
                <th>TÊN NGƯỜI DÙNG</th>
                <th>SỐ LƯỢNG PHẢN HỒI</th>
        </thead>
        <tbody>
            <?php
                foreach ($listtk as $thongke) {
                    extract($thongke);
                    echo '<tr>
                            <td>'.$manguoi.'</td>
                            <td>'.$ten.'</td>
                            <td>'.$countphan_hoi.'</td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
    <br>
    <h1>DANH SÁCH THỐNG KÊ ĐẶT PHÒNG</h1>
    <table >
        <thead>
                <th>MÃ PHÒNG</th>
                <th>TÊN PHÒNG</th>
                <th>SỐ LƯỢNG NGƯỜI ĐÃ ĐẶT</th>
                <th>TỔNG TIỀN</th>
        </thead>
        <tbody>
            <?php
                foreach ($listtkdatphong as $thongke) {
                    extract($thongke);
                    echo '<tr>
                            <td>'.$maphong.'</td>
                            <td>'.$tenphong.'</td>
                            <td>'.$countnguoidat.'</td>
                            <td>'.$sumtien.'</td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>