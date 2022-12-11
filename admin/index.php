<?php
session_start();
include "sidebar.php";
include "header.php";
include "../model/pdo.php";
include "../model/roomtype.php";
include "../model/room.php";
include "../model/gallery.php";
include "../model/user.php";
include "../model/service.php";
include "../model/contact.php";
include "../model/booking.php";
include "../model/stastis.php";
include "../model/feedback.php";
include "../model/setting.php";

$error = array();

if (isset($_GET['ctr']) && ($_GET['ctr'] != '')) {
    $ctr = $_GET['ctr'];
    switch ($ctr) {
            // Quản lí loại phòng
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
                //Validate
                if (empty($ten_loai)) {
                    $error['ten_loai'] = "Không được để trống tên loại";
                } else {
                    $ten_loai = $_POST['ten_loai'];
                }
                if (empty($anh_loai)) {
                    $error['anh_loai'] = "Vui lòng chọn ảnh";
                } else {
                    $anh_loai = $_FILES['anh_loai']['name'];
                }
                if (move_uploaded_file($_FILES["anh_loai"]["tmp_name"], $target_file)) {
                } else {
                }
                if (empty($error)) {
                    roomtype_insert($ten_loai, $anh_loai);
                    $message = "Thêm thành công";
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
            // Quản lí phòng
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
                $luot_xem = $_POST['luot_xem'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_phong"]["name"]);
                if (move_uploaded_file($_FILES["anh_phong"]["tmp_name"], $target_file)) {
                } else {
                }
                // Validate
                if (empty($ten_phong)) {
                    $error['ten_phong'] = "Không được để trống";
                } else {
                    $ten_phong = $_POST['ten_phong'];
                }
                if (empty($gia_phong)) {
                    $error['gia_phong'] = "Không được để trống";
                } else {
                    $gia_phong = $_POST['gia_phong'];
                }
                if (empty($mo_ta)) {
                    $error['mo_ta'] = "Không được để trống";
                } else {
                    $mo_ta = $_POST['mo_ta'];
                }
                if (empty($anh_phong)) {
                    $error['anh_phong'] = "Vui lòng chọn ảnh";
                } else {
                    $anh_phong = $_FILES['anh_phong']['name'];
                }
                if (empty($nguoi_lon_max)) {
                    $error['nguoi_lon_max'] = "Không được để trống";
                } else {
                    $nguoi_lon_max = $_POST['nguoi_lon_max'];
                }
                if (empty($tre_em_max)) {
                    $error['tre_em_max'] = "Không được để trống";
                } else {
                    $tre_em_max = $_POST['tre_em_max'];
                }
                if (empty($dien_tich)) {
                    $error['dien_tich'] = "Không được để trống";
                } else {
                    $dien_tich = $_POST['dien_tich'];
                }

                if (empty($error)) {
                    room_insert($ten_phong, $gia_phong, $mo_ta, $anh_phong, $nguoi_lon_max, $tre_em_max, $trang_thai, $dien_tich, $luot_xem, $id_loai);
                    $message = "Thêm thành công";
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
                $luot_xem = $_POST['luot_xem'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["anh_phong"]["name"]);
                move_uploaded_file($_FILES["anh_phong"]["tmp_name"], $target_file);
                room_update($id_phong, $ten_phong, $gia_phong, $mo_ta, $anh_phong, $nguoi_lon_max, $tre_em_max, $trang_thai, $dien_tich, $luot_xem, $id_loai);
            }
            $list_roomtype = roomtype_selectall();
            $list_room = room_selectall();
            include "room/list.php";
            break;
            // Quản lí thư viện
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
                } else {
                }
                if (empty($anh_thu_vien)) {
                    $error['anh_thu_vien'] = "Vui lòng chọn ảnh";
                } else {
                    $anh_thu_vien = $_FILES['anh_thu_vien']['name'];
                }
                if (empty($error)) {
                    gallery_insert($anh_thu_vien, $id_phong);
                    $message = "Thêm thành công";
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
        case "update-gallery":
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
            // Quản lí tài khoản
        case "list-user":
            $list_user = user_selectall();
            include "user/list.php";
            break;
        case "add-user":
            if (isset($_POST['ten'])) {
                $ten = $_POST['ten'];
                $ho_ten = $_POST['ho_ten'];
                $dia_chi = $_POST['dia_chi'];
                $mat_khau = $_POST['mat_khau'];
                $cmnd = $_POST['cmnd'];
                $email = $_POST['email'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $vai_tro = $_POST['vai_tro'];

                // Validate
                if (empty($ten)) {
                    $error['ten'] = "Không được để trống";
                } else {
                    $ten = $_POST['ten'];
                }

                if (empty($ho_ten)) {
                    $error['ho_ten'] = "Không được để trống";
                } else {
                    $ho_ten = $_POST['ho_ten'];
                }

                if (empty($dia_chi)) {
                    $error['dia_chi'] = "Không được để trống";
                } else {
                    $dia_chi = $_POST['dia_chi'];
                }
                if (empty($mat_khau)) {
                    $error['mat_khau'] = "Không được để trống";
                } else {
                    $mat_khau = $_POST['mat_khau'];
                }

                if (empty($cmnd)) {
                    $error['cmnd'] = "Không được để trống";
                } else {
                    $cmnd = $_POST['cmnd'];
                }

                if (empty($email)) {
                    $error['email'] = "Không được để trống";
                } else {
                    $email = $_POST['email'];
                }
                if (empty($so_dien_thoai)) {
                    $error['so_dien_thoai'] = "Không được để trống";
                } else {
                    $so_dien_thoai = $_POST['so_dien_thoai'];
                }

                if (empty($error)) {
                    user_insert($ten, $ho_ten, $dia_chi, $mat_khau, $cmnd, $email, $so_dien_thoai, $vai_tro);
                    $message = "Thêm thành công";
                }
            }
            include "user/add.php";
            break;
        case "getupdate-user":
            if (isset($_GET['id_nguoi']) && $_GET['id_nguoi'] > 0) {
                $user_one = user_getone($_GET['id_nguoi']);
            }
            include "user/update.php";
            break;
        case "getdelete-user":
            if (isset($_GET['id_nguoi']) && $_GET['id_nguoi'] > 0) {
                user_delete($_GET['id_nguoi']);
            }
            $list_user = user_selectall();
            include "user/list.php";
            break;
        case "update-user":
            if (isset($_POST['update'])) {
                $id_nguoi = $_POST['id_nguoi'];
                $ten = $_POST['ten'];
                $ho_ten = $_POST['ho_ten'];
                $dia_chi = $_POST['dia_chi'];
                $mat_khau = $_POST['mat_khau'];
                $cmnd = $_POST['cmnd'];
                $email = $_POST['email'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $vai_tro = $_POST['vai_tro'];
                user_update($id_nguoi, $ten, $ho_ten, $dia_chi, $mat_khau, $cmnd, $email, $so_dien_thoai, $vai_tro);
            }
            $list_user = user_selectall();
            include "user/list.php";
            break;
            // Quản lí dich vụ
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
                } else {
                }
                if (empty($ten_dich_vu)) {
                    $error['ten_dich_vu'] = "Không được để trống";
                } else {
                    $ten_dich_vu = $_POST['ten_dich_vu'];
                }
                if (empty($hinh_anh)) {
                    $error['hinh_anh'] = "Vui lòng chọn ảnh";
                } else {
                    $hinh_anh = $_FILES['hinh_anh']["name"];
                }
                if (empty($error)) {
                    service_insert($ten_dich_vu, $id_phong, $hinh_anh);
                    $message = "Thêm thành công";
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
            // Quản lí đặt phòng
        case 'list-booking':
            $list_booking = booking();
            include "booking/list.php";
            break;
        case 'detail-booking':
            $id_dat = $_GET['id_dat'];
            $detail_booking = bookingdetail_selectall($id_dat);
            include "booking/detail.php";
            break;
        case 'getdelete-bookingdetail':
            $id_chi_tiet = $_GET['id_chi_tiet'];
            $id_dat = $_GET['id_dat'];
            bookingdetail_delete($id_chi_tiet);
            $detail_booking = bookingdetail_selectall($id_dat);
            include 'booking/detail.php';
            break;
        case 'getdelete-booking':
            $id_dat = $_GET['id_dat'];
            booking_delete($id_dat);
            $list_booking = booking();
            include 'booking/list.php';
            break;
            // Quản lí liên hệ
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
            // Quản lí thống kê
        case 'list-stastis':
            $list_stastis = stastis_selectall();
            $listtk = thongke_selectall_nguoi();
            $listtkdatphong = thongke_selectall_datphong();
            include "stastis/list.php";
            break;
        case 'diagram':
            $list_stastis = stastis_selectall();
            include "stastis/diagram.php";
            break;
            //  Quản lí phản hồi
        case 'list-feedback':
            $list_thong_ke_feedback = thong_ke_feedback();
            include "feedback/list.php";
            break;
        case 'detail-feedback':
            $id_phong = $_GET['id_phong'];
            $items = feedback_select_by_room($id_phong);
            include "feedback/detail.php";
            break;
        case 'getdelete-feedback':
            $id_phan_hoi = $_GET['id_phan_hoi'];
            $id_phong = $_GET['id_phong'];
            feedback_delete($id_phan_hoi);
            $items = feedback_select_by_room($id_phong);
            include 'feedback/detail.php';
            break;
            // Quản lí cài đặt
        case 'list-setting':
            $list_setting = setting_selectall();
            include "setting/list.php";
            break;
        case 'add-setting':
            if (isset($_POST['email'])) {
                $logo = $_FILES['logo']['name'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $dien_thoai = $_POST['dien_thoai'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                //Validate
                if (empty($email)) {
                    $error['email'] = "Không được để trống email";
                } else {
                    $email = $_POST['email'];
                }

                if (empty($dia_chi)) {
                    $error['dia_chi'] = "Không được để trống địa chỉ";
                } else {
                    $dia_chi = $_POST['dia_chi'];
                }

                if (empty($dien_thoai)) {
                    $error['dien_thoai'] = "Không được để trống điện thoại";
                } else {
                    $dien_thoai = $_POST['dien_thoai'];
                }

                if (empty($logo)) {
                    $error['logo'] = "Vui lòng chọn ảnh";
                } else {
                    $logo = $_FILES['logo']['name'];
                }

                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                } else {
                }
                if (empty($error)) {
                    setting_insert($logo, $email, $dia_chi, $dien_thoai);
                    $message = "Thêm thành công";
                }
            }
            $list_setting = setting_selectall();
            include "setting/add.php";
            break;
        case 'getdelete-setting':
            if (isset($_GET['id_cai_dat']) && $_GET['id_cai_dat'] > 0) {
                setting_delete($_GET['id_cai_dat']);
            }
            $list_setting = setting_selectall();
            include "setting/list.php";
            break;
        case 'getupdate-setting':
            if (isset($_GET['id_cai_dat']) && $_GET['id_cai_dat'] > 0) {
                $setting_one = setting_getone($_GET['id_cai_dat']);
            }
            include "setting/update.php";
            break;
        case 'update-setting':
            if (isset($_POST['update'])) {
                $id_cai_dat = $_POST['id_cai_dat'];
                $logo = $_FILES['logo']['name'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $dien_thoai = $_POST['dien_thoai'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
                setting_update($id_cai_dat, $logo, $email, $dia_chi, $dien_thoai);
            }
            $list_setting = setting_selectall();
            include "setting/list.php";
            break;
        case 'logout':
            session_destroy();
            header("Location: ../index.php");
            break;
        default:
            include "home.php";
            break;
    }
} else {
    $room_count = room_count();
    $roomtype_count = roomtype_count();
    $user_count = user_count();
    $feedback_count = feedback_count();
    $booking_count = booking_count();
    include "home.php";
}
?>
</div>
</div>