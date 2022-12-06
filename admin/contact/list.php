<h1>Danh sách liên hệ</h1>
<table>
    <thead>
        <th>Id</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Địa chỉ</th>
        <th>Nội dung</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($list_contact as $contact) {
            extract($contact);
        ?>
            <tr>
                <td><?= $id_lien_he ?></td>
                <td><?= $email ?></td>
                <td><?= $dien_thoai ?></td>
                <td><?= $dia_chi ?></td>
                <td><?= $noi_dung ?></td>
                <td>
                    <a onclick="if(!confirm('Bạn có muốn xóa?')){return false}" href="index.php?ctr=getdelete-contact&id_lien_he=<?= $id_lien_he ?>"><input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>