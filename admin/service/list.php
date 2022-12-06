<h1>Các dịch vụ</h1>
<table>
    <thead>
        <th>Id</th>
        <th>Tên dịch vụ</th>
        <th>Id phòng</th>
        <th>Hình ảnh</th>
        <th>Action</th>
    </thead>
    <tbody>
        
    <?php
        foreach ($list_service as $service) {
            extract($service);
            $anhpath = "../upload/" . $hinh_anh;
            if (is_file($anhpath)) {
                $hinh_anh = "<img src='" . $anhpath . "' width='100px' height='100px'>";
            } else {
                $hinh_anh = "";
            }
        ?>
            <tr>
                <td><?= $id_dich_vu ?></td>
                <td><?= $ten_dich_vu ?></td>
                <td><?= $id_phong ?></td>
                <td><?= $hinh_anh ?></td>
                <td>
                    <a href="index.php?ctr=getupdate-service&id_dich_vu=<?=$id_dich_vu?>"><input type="button" value="Sửa"></a>
                    <a onclick="if(!confirm('Bạn có muốn xóa?')){return false}" href="index.php?ctr=getdelete-service&id_dich_vu=<?=$id_dich_vu?>"><input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="index.php?ctr=add-service"><input type="button" value="Thêm mới"></a>
