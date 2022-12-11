<hr>
<div class="container1">
    <table class="booking-detail">
        <thead>
            <th>Hình</th>
            <th>Tên phòng</th>
            <th>Giá phòng</th>
            <th>Số lượng</th>
            <th>Ngày vào</th>
            <th>Ngày trả</th>
            <th>Người lớn</th>
            <th>Trẻ em</th>
            <th>Thành tiền</th>
            <th colspan="2">Thao tác</th>
        </thead>
        <?php
        $tong = 0;
        $i = 0;
        if (isset($_SESSION['booking'])) {
            foreach ($_SESSION['booking'] as $booking) {
                $img = $booking[2];
                $ttien = $booking[3] * $booking[4] * floor(abs(strtotime($booking[6]) - strtotime($booking[7])) / (60 * 60 * 24));
                $tong += $ttien;
                $xoasp_td = '<a href = "index.php?ctr=delete-booking&id-booking=' . $i . '"><input type = "button" value = "Xoá"></a>';
                echo '
                        <tr>
                            <td><img src = "' . $img . '" alt = "" height = "150px" width="150px"></td>
                            <td>' . $booking[1] . '</td>
                            <td>' . $booking[3] . '</td>
                            <td>' . $booking[4] . '</td>
                            <td>' . $booking[6] . '</td>
                            <td>' . $booking[7] . '</td>
                            <td>' . $booking[8] . '</td>
                            <td>' . $booking[9] . '</td>
                            <td>' . $ttien . '</td>
                            <td>
                            ' . $xoasp_td . '
                            </td>
                        </tr>';
                $i += 1;
            }
            echo '<tr>
                   <td colspan="8" style="text-align: left;padding: 16px 0;">Tổng</td>
                   <td>' . $tong . '</td>
                  </tr>';
        }
        ?>
    </table>
    <?php
    if (isset($_SESSION['booking']) && $_SESSION['booking']) {
        echo '
            <a href="index.php?ctr=info-booking">
                <input type="submit" value="Đồng ý đặt phòng">
            </a>
            <a href="index.php?ctr=delete-booking"><input type="submit" value="Xóa tất cả phòng"></a>
        ';
    } else {
        echo
        '
        <h1 style="color:red;margin:8px 0;">Quý khách vui lòng đặt phòng</h1>
        ';
    }
    ?>
</div>