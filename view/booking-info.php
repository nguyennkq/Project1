<div class="booking-done1">
    <?php
    if (isset($_SESSION['id_dat']) && ($_SESSION['id_dat'] > 0)) {
        $show_detail = bookingdetail_selectall($_SESSION['id_dat']);
        if ((isset($show_detail)) && (count($show_detail) > 0)) {
            echo
            '
            <h1 style="color:#F4694C;">Cảm ơn quý khách đã đặt phòng</h1>
            <h3>Thông tin đặt phòng của quý khách</h3>
            <table>
            <thead>
                <th>Ảnh phòng</th>
                <th>Thông tin phòng</th>
                <th>Thành tiền</th>
            </thead> 
            ';
            $tong = 0;
            $i = 0;
            foreach ($show_detail as $show) {
                $img = $show['anh_phong'];
                $ttien = $show['don_gia'] * $show['so_luong'] * floor(abs(strtotime($show['ngay_vao']) - strtotime($show['ngay_tra'])) / (60 * 60 * 24));
                $tong += $ttien;
                echo '
                <tbody>
                    <tr>
                        <td><img src="upload/' . $img . '" width="200px" height="200px" alt=""></td>
                        <td>
                            <p>Tên phòng: <span> ' . $show['ten_phong'] . '</span></p>
                            <p>Đặt phòng từ: <span>' . $show['ngay_vao'] . '</span> đến <span>' . $show['ngay_tra'] . '</span></p>
                            <p>Người lớn:<span>' . $show['nguoi_lon'] . ' </span> | Trẻ em:<span>' . $show['tre_em'] . '</span></p>
                        </td>
                        <td>' . $ttien . '</td>
                    </tr>
                    </tbody>
                    ';
            }
            echo
            '
                <tr>
                    <td colspan="2" style="text-align: left; padding-left: 100px;">Tổng</td>
                    <td>' . $tong . '</td>
                </tr>
                </table>
                ';
        }
    }
    ?>
    <?php
    if (isset($_SESSION['id_dat']) && ($_SESSION['id_dat'] > 0)) {
        $show_booking = booking_selectall($_SESSION['id_dat']);
        if ((isset($show_booking)) && (count($show_booking) > 0)) {
    ?>
            <h2>Thông tin khách hàng</h2>
            <div>
                <p><b>Người đặt:</b><span><?= $show_booking[0]['ho_ten'] ?></span></p>
                <p><b>Email:</b><span><?= $show_booking[0]['email'] ?></span></p>
                <p><b>Số điện thoại:</b><span><?= $show_booking[0]['dien_thoai'] ?></span></p>
                <p><b>Phương thức thanh toán:</b><span><?php
                                                        switch ($show_booking[0]['thanh_toan']) {
                                                            case '1':
                                                                $message = "Thanh toán tiền mặt";
                                                                break;
                                                            case '2':
                                                                $message = "Chuyển khoản ngân hàng";
                                                                break;
                                                            case '3':
                                                                $message = "Thanh toán VnPay";
                                                                break;
                                                            default:
                                                                $message = "Chưa có thông tin thanh toán";
                                                                break;
                                                        }
                                                        echo $message;
                                                        ?></span></p>

            </div>
    <?php }
    } ?>
</div>
