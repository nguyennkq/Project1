<div class="container1">
    <div>THÔNG TIN ĐẶT PHÒNG</div>
    <table>
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
        </thead>
        <?php
        $tong = 0;
        $i = 0;
        global $img_path;
        if (isset($_SESSION['booking']) && isset($_GET['id-booking'])) {
            $id = $_GET['id-booking'];
            $img = $_SESSION['booking'][$id][2];
            $tien = $_SESSION['booking'][$id][3] * $_SESSION['booking'][$id][4] * floor(abs(strtotime($_SESSION['booking'][$id][6]) - strtotime($_SESSION['booking'][$id][7])) / (60 * 60 * 24));
            $tong += $tien;
            $xoasp_td = '<td><a href = "index.php?ctr=delete-booking&id-booking=' . $id . '"><input type = "button" value = "Xoá"></a></td>';
            $dat_hang = '<td><a href = "index.php?ctr=info-booking&id-booking=' . $id . '"><input type = "button" value = "Đặt hàng"></a></td>';
            echo '
        <tr>
                           <td><img src = "' . $img . '" alt = "" height = "150px" width="150px"></td>
                            <td id="hi">' . $_SESSION['booking'][$id][1] . '</td>
                            <td>' . $_SESSION['booking'][$id][3] . '</td>
                            <td>' . $_SESSION['booking'][$id][4] . '</td>
                            <td>' . $_SESSION['booking'][$id][6] . '</td>
                            <td>' . $_SESSION['booking'][$id][7] . '</td>
                            <td>' . $_SESSION['booking'][$id][8] . '</td>
                            <td>' . $_SESSION['booking'][$id][9] . '</td>
                            <td>' . $tien . '</td>
                            <input type="hidden" value="' . $id . '" name="id-booking">
                            </tr>';
        } else {
            foreach ($_SESSION['booking'] as $booking) {
                $img = $booking[2];
                $ttien = $booking[3] * $booking[4] * floor(abs(strtotime($booking[6]) - strtotime($booking[7])) / (60 * 60 * 24));
                $tong += $ttien;
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
                            </tr>';
                $i += 1;
            }
        }
        echo '<tr>
               <td colspan="8" style="text-align: left;padding-left: 16px;">Tổng</td>
               <td>' . $tong . '</td>
              </tr>';

        ?>
    </table>


    <form class="form-booking" action="index.php?ctr=pay-booking" method="post" name="forms" enctype="multipart/form-data">
        <input type="hidden" name="id_nguoi" value="<?php
                                                    if (isset($_SESSION['user'])) echo $_SESSION['user']['id_nguoi'];
                                                    ?>">
        <input type="hidden" name="tong_tien" value="<?= $tong ?>">
        <input type="hidden" name="thanh_tien" value="<?= $ttien ?>">
        <h1>
            THÔNG TIN ĐẶT PHÒNG
        </h1>
        <div class="box-content">
            <div>

                <label>Họ và Tên</label><br>
                <input type="text" name="ho_ten" value="<?php
                                                        if (isset($_SESSION['user'])) echo $_SESSION['user']['ho_ten'];

                                                        ?>">
            </div>
            <div>
                <label>Email</label><br>
                <input type="text" name="email" value="<?php
                                                        if (isset($_SESSION['user'])) echo $_SESSION['user']['email'];
                                                        ?>">
            </div>
            <div>
                <label>Điện thoại</label><br>
                <input type="text" name="dien_thoai" value="<?php
                                                            if (isset($_SESSION['user'])) echo $_SESSION['user']['so_dien_thoai'];
                                                            ?>">
            </div>
        </div>
        <h3>PHƯƠNG THỨC THANH TOÁN</h3>
        <ul>
            <li><input type="radio" name="thanh_toan" value="1">Thanh toán tiền mặt</li>
            <li><input type="radio" name="thanh_toan" value="2">Chuyển khoản ngân hàng</li>
            <li><input type="radio" name="thanh_toan" value="3" checked>Thanh toán VNPAY</li>
        </ul>
        <?php
        if (isset($_SESSION['user'])) {
            echo
            '
                <input type="submit" value="Đặt phòng"  name="redirect" id="redirect">
                <input type="reset" value="Nhập lại">
                ';
        } else {
            echo
            '
                <p style="color:red;">Bạn phải đăng nhập để thanh toán</p>
            ';
        }
        ?>

    </form>
</div>