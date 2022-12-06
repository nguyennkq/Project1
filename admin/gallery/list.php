<h1>Thư viện ảnh</h1>
<table>
    <thead>
        <th>Id thư viện</th>
        <th>Hình ảnh</th>
        <th>Id phòng</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($list_gallery as $gallery) {
            extract($gallery);
            $anhpath = "../upload/" . $anh_thu_vien;
            if (is_file($anhpath)) {
                $anh_thu_vien = "<img src='" . $anhpath . "' width='100px' height='100px'>";
            } else {
                $anh_thu_vien = "";
            }
        ?>
            <tr>
                <td><?= $id_thu_vien ?></td>
                <td><?= $anh_thu_vien ?></td>
                <td><?= $id_phong ?></td>
                <td>
                    <a href="index.php?ctr=getupdate-gallery&id_thu_vien=<?=$id_thu_vien?>"><input type="button" value="Sửa"></a>
                    <a onclick="if(!confirm('Bạn có muốn xóa?')){return false}" href="index.php?ctr=getdelete-gallery&id_thu_vien=<?=$id_thu_vien?>"><input type="button" value="Xóa"></a>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>
<a href="index.php?ctr=add-gallery"><input type="button" value="Thêm mới"></a>