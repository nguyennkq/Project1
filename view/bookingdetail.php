<table border="1">
        <tr>
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
        </tr>
        <?php
        $tong = 0;
        $i = 0;
        global $img_path;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart) {
                $img = $cart[2];
                $ttien = $cart[3] * $cart[4]* floor(abs(strtotime($cart[6])-strtotime($cart[7]))/(60*60*24));
                $tong += $ttien;
                $xoasp_td = '<td><a href = "index.php?ctr=delcart&idcart=' . $i . '"><input type = "button" value = "Xoá"></a></td>';
                $dat_hang = '<td><a href = "index.php?ctr=dat_hang&idcart=' . $i . '"><input type = "button" value = "Đặt hàng"></a></td>';
                echo '
        <tr>
                           <td><img src = "' . $img . '" alt = "" height = "150px" width="100%"></td>
                            <td>' . $cart[1] . '</td>
                            <td>' . $cart[3] . '</td>
                            <td>' . $cart[4] . '</td>
                            <td>' . $cart[6] . '</td>
                            <td>' . $cart[7] . '</td>
                            <td>' . $cart[8] . '</td>
                            <td>' . $cart[9] . '</td>
                            <td>' . $ttien . '</td>
                            ' . $xoasp_td . '
                            ' . $dat_hang . '
                            </tr>';
                $i += 1;
            }
        }
        echo '<tr>
               <td colspan="8" style="text-align: left">Tổng</td>
               <td>' . $tong . '</td>
              </tr>';
        ?>
    </table>
    <a href="index.php?ctr=dat_hang">
        <input type="submit" value="Đồng ý đặt hàng">
    </a>
    <a href="index.php?ctr=delcart"> <input type="submit" value="Xóa giỏ hàng"></a>