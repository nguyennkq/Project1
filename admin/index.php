<?php
include "sidebar.php";
include "header.php";
include "../model/pdo.php";
include "../model/roomtype.php";
include "../model/room.php";
include "../model/gallery.php";
include "../model/contact.php";
include "../model/service.php";


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
                $roomtype_one = roomtype_getone($_GET['id_loai']);
            }
            include "roomtype/update.php";
            break;
        case 'update-roomtype':
            if (isset($_POST['update'])) {
                $id_loai = $_POST['id_loai'];
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
        case 'list-room':
            $list_roomtype = roomtype_selectall();
            $list_room = room_selectall();
            include "room/list.php";
            break;
        case 'add-room':
            if (isset($_POST['ten_phong'])) {
                $id_loai = $_POST['id_loai'];
                $ten_phong = $_POST['ten_phong'];
                $gia_phong = $_POST['gia_phong'];
                $mo_ta = $_POST['mo_ta'];
                $anh_phong = $_FILES['anh_phong']['name'];
                $nguoi_lon_max = $_POST['nguoi_lon_max'];
                $tre_em_max = $_POST['tre_em_max'];
                $trang_thai = $_POST['trang_thai'];
                $dien_tich = $_POST['dien_tich'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_phong"]["name"]);
                if (move_uploaded_file($_FILES["anh_phong"]["tmp_name"], $target_file)) {
                    room_insert($ten_phong, $gia_phong, $mo_ta, $anh_phong, $nguoi_lon_max, $tre_em_max, $trang_thai, $dien_tich, $id_loai);
                    $message = "Thêm thành công";
                } else {
                    $message = "Không thêm được";
                }
            }
            $list_roomtype = roomtype_selectall();
            include "room/add.php";
            break;
        case 'getdelete-room':
            if (isset($_GET['id_phong']) && $_GET['id_phong'] > 0) {
                room_delete($_GET['id_phong']);
            }
            $list_room = room_selectall();
            include "room/list.php";
            break;
        case 'getupdate-room':
            if (isset($_GET['id_phong']) && $_GET['id_phong'] > 0) {
                $room_one = room_getone($_GET['id_phong']);
            }
            $list_roomtype = roomtype_selectall();
            include "room/update.php";
            break;
        case 'update-room':
            if (isset($_POST['update'])) {
                $id_loai = $_POST['id_loai'];
                $id_phong = $_POST['id_phong'];
                $ten_phong = $_POST['ten_phong'];
                $gia_phong = $_POST['gia_phong'];
                $mo_ta = $_POST['mo_ta'];
                $anh_phong = $_FILES['anh_phong']['name'];
                $nguoi_lon_max = $_POST['nguoi_lon_max'];
                $tre_em_max = $_POST['tre_em_max'];
                $trang_thai = $_POST['trang_thai'];
                $dien_tich = $_POST['dien_tich'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_phong"]["name"]);
                move_uploaded_file($_FILES["anh_phong"]["tmp_name"], $target_file);
                room_update($id_phong, $ten_phong, $gia_phong, $mo_ta, $anh_phong, $nguoi_lon_max, $tre_em_max, $trang_thai, $dien_tich, $id_loai);
            }
            $list_roomtype = roomtype_selectall();
            $list_room = room_selectall();
            include "room/list.php";
            break;
        case 'list-gallery':
            $list_room = room_selectall();
            $list_gallery = gallery_selectall();
            include "gallery/list.php";
            break;
        case 'add-gallery':
            if (isset($_POST['id_phong'])) {
                $id_phong = $_POST['id_phong'];
                $anh_thu_vien = $_FILES['anh_thu_vien']["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_thu_vien"]["name"]);
                if (move_uploaded_file($_FILES["anh_thu_vien"]["tmp_name"], $target_file)) {
                    gallery_insert($anh_thu_vien, $id_phong);
                    $message = "Thêm thành công";
                } else {
                    $message = "Không thêm được";
                }
            }
            $list_room = room_selectall();
            include "gallery/add.php";
            break;
        case 'getdelete-gallery':
            if (isset($_GET['id_thu_vien']) && $_GET['id_thu_vien'] > 0) {
                gallery_delete($_GET['id_thu_vien']);
            }
            $list_gallery = gallery_selectall();
            include "gallery/list.php";
            break;
        case 'getupdate-gallery':
            if (isset($_GET['id_thu_vien']) && $_GET['id_thu_vien'] > 0) {
                $gallery_one = gallery_getone($_GET['id_thu_vien']);
            }
            $list_room = room_selectall();
            include "gallery/update.php";
            break;
        case "update-gallery";
            if (isset($_POST['update'])) {
                $id_thu_vien = $_POST["id_thu_vien"];
                $id_phong = $_POST['id_phong'];
                $anh_thu_vien = $_FILES['anh_thu_vien']["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_thu_vien"]["name"]);
                move_uploaded_file($_FILES["anh_thu_vien"]["tmp_name"], $target_file);
                gallery_update($id_thu_vien, $anh_thu_vien, $id_phong);
            }
            $list_room = room_selectall();
            $list_gallery = gallery_selectall();
            include "gallery/list.php";
            break;
        case 'list-service':
            $list_room = room_selectall();
            $list_service = service_selectall();
            include "service/list.php";
            break;
        case 'add-service':
            if (isset($_POST['id_phong'])) {
                $ten_dich_vu = $_POST['ten_dich_vu'];
                $id_phong = $_POST['id_phong'];
                $hinh_anh = $_FILES['hinh_anh']["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                    service_insert($ten_dich_vu, $id_phong, $hinh_anh);
                    $message = "Thêm thành công";
                } else {
                    $message = "Không thêm được";
                }
            }
            $list_room = room_selectall();
            include "service/add.php";
            break;
        case 'getupdate-service':
            if (isset($_GET['id_dich_vu']) && $_GET['id_dich_vu'] > 0) {
                $service_one = service_getone($_GET['id_dich_vu']);
            }
            $list_room = room_selectall();
            include "service/update.php";
            break;
        case "update-service";
            if (isset($_POST['update'])) {
                $id_dich_vu = $_POST["id_dich_vu"];
                $ten_dich_vu = $_POST["ten_dich_vu"];
                $id_phong = $_POST['id_phong'];
                $hinh_anh = $_FILES['hinh_anh']["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file);
                service_update($id_dich_vu, $ten_dich_vu, $id_phong, $hinh_anh);
            }
            $list_room = room_selectall();
            $list_service = service_selectall();
            include "service/list.php";
            break;
        case 'getdelete-service':
            if (isset($_GET['id_dich_vu']) && $_GET['id_dich_vu'] > 0) {
                service_delete($_GET['id_dich_vu']);
            }
            $list_service = service_selectall();
            include "service/list.php";
            break;
        case 'list-contact':
            $list_contact = contact_selectall();
            include "contact/list.php";
            break;
        case 'getdelete-contact':
            if (isset($_GET['id_lien_he']) && $_GET['id_lien_he'] > 0) {
                contact_delete($_GET['id_lien_he']);
            }
            $list_contact = contact_selectall();
            include "contact/list.php";
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