<h1>Danh sách cài đặt</h1>
<table>
    <thead>
        <th>STT</th>
        <th>Logo</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Hành động</th>
    </thead>
    <tbody>
        <?php
        foreach ($list_setting as $setting) {
            extract($setting);
            $update = "index.php?ctr=getupdate-setting&id_cai_dat=" . $id_cai_dat;
            $delete = "index.php?ctr=getdelete-setting&id_cai_dat=" . $id_cai_dat;
            $anhpath = "../upload/" . $logo;
            if (is_file($anhpath)) {
                $logo = "<img src='" . $anhpath . "' width='100px' height='100px'>";
            } else {
                $logo = "";
            }
        ?>

            <tr>
                <td><?= $id_cai_dat ?></td>
                <td><?= $logo ?></td>
                <td><?= $email ?></td>
                <td><?= $dia_chi ?></td>
                <td><?= $dien_thoai ?></td>
                <td>
                    <a href="<?= $update ?>"><input type="button" value="Sửa"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
foreach ($list_setting as $setting) {
    extract($setting);
    if (!empty($email)) {
        echo "";
    }else{
        echo '
        <a href="index.php?ctr=add-setting"><input type="button" value="Thêm mới"></a>
        ';
    }
}
?>
