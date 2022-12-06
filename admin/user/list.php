<h1>Danh sách người dùng</h1>
<table>
    <thead>
        <th>Id</th>
        <th>Tên</th>
        <th>Họ tên</th>
        <th>Địa chỉ</th>
        <th>Mật khẩu</th>
        <th>CMND/CCCD</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Vai trò</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($list_user as $user) {
            extract($user);
        ?>
            <tr>
                <td><?= $id_nguoi ?></td>
                <td><?= $ten ?></td>
                <td><?= $ho_ten ?></td>
                <td><?= $dia_chi ?></td>
                <td><?= $mat_khau ?></td>
                <td><?= $cmnd ?></td>
                <td><?= $email ?></td>
                <td><?= $so_dien_thoai ?></td>
                <td><?= $vai_tro == 1 ? 'Thành viên' : 'Admin' ?></td>
                <td>
                    <a href="index.php?ctr=getupdate-user&id_nguoi=<?= $id_nguoi ?>"><input type="button" value="Sửa"></a>
                    <a onclick="if(!confirm('Bạn có muốn xóa?')){return false}" href="index.php?ctr=getdelete-user&id_nguoi=<?= $id_nguoi ?>"><input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="index.php?ctr=add-user"><input type="button" value="Thêm mới"></a>