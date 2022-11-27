<?php
foreach ($nguoi_dung as $nguoi) {
    extract($nguoi);
}

?>

<div>THÔNG TIN ĐẶT PHÒNG</div>
<table>
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
    </tr>
    <?php
    $tong = 0;
    $i = 0;
    global $img_path;
    if (isset($_SESSION['cart']) && isset($_GET['idcart'])) {
        $id = $_GET['idcart'];
        $img = $_SESSION['cart'][$id][2];
        $tien = $_SESSION['cart'][$id][3] * $_SESSION['cart'][$id][4] * floor(abs(strtotime($_SESSION['cart'][$id][6]) - strtotime($_SESSION['cart'][$id][7])) / (60 * 60 * 24));
        $tong += $tien;
        $xoasp_td = '<td><a href = "index.php?act=delcart&idcart=' . $i . '"><input type = "button" value = "Xoá"></a></td>';
        $dat_hang = '<td><a href = "index.php?act=dat_hang&idcart=' . $i . '"><input type = "button" value = "Đặt hàng"></a></td>';
        echo '
        <tr>
                           <td><img src = "' . $img . '" alt = "" height = "150px" width="100%"></td>
                            <td id="hi">' . $_SESSION['cart'][$id][1] . '</td>
                            <td>' . $_SESSION['cart'][$id][3] . '</td>
                            <td>' . $_SESSION['cart'][$id][4] . '</td>
                            <td>' . $_SESSION['cart'][$id][6] . '</td>
                            <td>' . $_SESSION['cart'][$id][7] . '</td>
                            <td>' . $_SESSION['cart'][$id][8] . '</td>
                            <td>' . $_SESSION['cart'][$id][9] . '</td>
                            <td>' . $tien . '</td>
                            <input type="hidden" value="' . $id . '" name="idcart">
                            </tr>';
    } else {
        foreach ($_SESSION['cart'] as $cart) {
            $img = $cart[2];
            $ttien = $cart[3] * $cart[4] * floor(abs(strtotime($cart[6]) - strtotime($cart[7])) / (60 * 60 * 24));
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
<form action="index.php?ctr=thanhtoan" method="post" name="forms" enctype="multipart/form-data">
    <input type="hidden" name="id_nguoi" value="<?= $id_nguoi ?>">
    <input type="hidden" name="tong_tien" value="<?=$tong?>">
    <div>
        THÔNG TIN ĐẶT PHÒNG
    </div>
    <div class="box-content">
        <label >Họ và Tên</label>
        <input type="text" name="ho_ten">
        <label >Email</label>
        <input type="text" name="email">
        <label>Điện thoại</label>
        <input type="text" name="dien_thoai">
    </div>
    <div>PHƯƠNG THỨC THANH TOÁN</div>
    <table>
        <tr>
            <td><input type="radio" name="thanh_toan" value="1" checked>Thanh toán tiền mặt</td>
            <td><input type="radio" name="thanh_toan" value="2">Chuyển khoản ngân hàng</td>
            <td><input type="radio" name="thanh_toan" value="3">Thanh toán online</td>
        </tr>
    </table>
    <input type="submit" value="Đặt phòng" name="thanhtoan">
    <input type="reset" value="Nhập lại">
</form>