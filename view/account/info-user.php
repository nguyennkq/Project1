<div class="box-user">
    <div class="item-user">
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);
        }
        ?>
        <p>Họ tên: <span><?= $ho_ten ?></span></p>
        <p>Địa chỉ: <span><?= $dia_chi ?></span></p>
        <p>Email: <span><?= $email ?></span></p>
        <p>Số điện thoại: <span><?= $so_dien_thoai ?></span></span></p>
        <p><a href="index.php?ctr=change-password">Đổi mật khẩu</a></p>
        <p><a href="index.php?ctr=update-user">Cập nhật tài khoản</a></p>
    </div>
    <div class="item-booking">
        <table>
            <thead>
                <th>Thông tin</th>
                <th>Thanh toán</th>
            </thead>
            <?php
            $id_ng = $id_nguoi;
            $bookingdetail_selectall_by_user = bookingdetail_selectall_by_user($id_ng);
            foreach ($bookingdetail_selectall_by_user as $item) {
                extract($item);
                echo
                '
                   
                <tbody>
                    <tr>
                        <td>
                            <p>Tên phòng: <span>' . $ten_phong . '</span></p>
                            <p>Giá phòng: <span>' . $don_gia . '</span></p>
                            <p>Đặt phòng từ: <span>' . $ngay_vao . '</span> đến <span>' . $ngay_tra . '</span> (' . floor(abs(strtotime($ngay_tra) - strtotime($ngay_vao)) / (60 * 60 * 24)) . ' ngày)</p>
                            <p>Ngày đặt: <span>' . $ngay_dat . '</span></p>
                            <p>Người lớn: <span>' . $nguoi_lon . '</span> | Trẻ em: <span>' . $tre_em . '</span></p>
                        </td>
                        <td><span>' . number_format($tong_tien) . '</span>VNĐ</td>
                    </tr>
                </tbody>
                    ';
            }
            ?>

        </table>
    </div>


</div>