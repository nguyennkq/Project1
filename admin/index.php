<?php
include "sidebar.php";
include "header.php";
include "../model/pdo.php";
include "../model/roomtype.php";


if (isset($_GET['ctr']) && ($_GET['ctr'] != '')) {
    $ctr = $_GET['ctr'];
    switch ($ctr) {
        case 'list-roomtype':
            $list_roomtype = roomtype_selectall();
            include "roomtype/list.php";
            break;
        case 'add-roomtype':
            if (isset($_POST['ten_loai'])) {
                $ten_loai = $_POST['ten_loai'];
                $anh_loai = $_FILES['anh_loai']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_loai"]["name"]);
                if (move_uploaded_file($_FILES["anh_loai"]["tmp_name"], $target_file)) {
                    roomtype_insert($ten_loai, $anh_loai);
                    $message = "Thêm thành công";
                } else {
                    $message = "Không thêm được";
                }
            }
            include "roomtype/add.php";
            break;
        case 'getdelete-roomtype':
            if (isset($_GET['id_loai']) && $_GET['id_loai'] > 0) {
                roomtype_delete($_GET['id_loai']);
            }
            $list_roomtype = roomtype_selectall();
            include "roomtype/list.php";
            break;
        case 'getupdate-roomtype':
            if (isset($_GET['id_loai']) && $_GET['id_loai'] > 0) {
                $roomtype_one= roomtype_getone($_GET['id_loai']);
            }
            include "roomtype/update.php";
            break;
        case 'update-roomtype':
            if (isset($_POST['update'])) {
                $id_loai=$_POST['id_loai'];
                $ten_loai = $_POST['ten_loai'];
                $anh_loai = $_FILES['anh_loai']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_loai"]["name"]);
                move_uploaded_file($_FILES["anh_loai"]["tmp_name"], $target_file);
                roomtype_update($id_loai, $ten_loai, $anh_loai);
            }
            $list_roomtype = roomtype_selectall();
            include "roomtype/list.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
?>
</div>
</div>