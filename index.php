<?php
include "view/header.php";
include "global.php";
include "model/pdo.php";
include "model/room.php";
include "model/roomtype.php";
include "model/contact.php";
include "model/user.php";
include "model/gallery.php";
include "model/service.php";

if (isset($_GET['ctr']) && ($_GET['ctr'] != '')) {
    $ctr = $_GET['ctr'];
    switch ($ctr) {
        case 'register':
            if (isset($_POST['btn'])) {
                $flag = true;
                $ten = $_POST['ten'];
                $ho_ten = $_POST['ho_ten'];
                $dia_chi = $_POST['dia_chi'];
                $mat_khau = $_POST['mat_khau'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $cmnd = $_POST['cmnd'];
                $email = $_POST['email'];
                $vai_tro = $_POST['vai_tro'];

                if (empty($ten)) {
                    $err_ten = "không được để trống";
                    $flag = false;
                }

                if (empty($ho_ten)) {
                    $err_ho_ten = "không được để trống";
                    $flag = false;
                }

                if (empty($dia_chi)) {
                    $err_dia_chi = "không được để trống";
                    $flag = false;
                }
                if (empty($mat_khau)) {
                    $err_mat_khau = "không được để trống";
                    $flag = false;
                }

                if (empty($so_dien_thoai)) {
                    $err_so_dien_thoai = "không được để trống";
                    $flag = false;
                }

                if (empty($cmnd)) {
                    $err_cmnd = "không được để trống";
                    $flag = false;
                }

                if (empty($email)) {
                    $err_email = "không được để trống";
                    $flag = false;
                }

                if ($flag == true) {
                    user_insert($ten, $ho_ten, $dia_chi, $mat_khau, $cmnd, $email, $so_dien_thoai, $vai_tro);
                    // $thanhcong = "Đăng ký người dùng thành công";
                    // header("location: login.php");
                }
            }
            include 'view/account/register.php';
            break;
        case 'login':
            include 'view/account/login.php';
            break;
        case 'forget':
            include 'view/account/forget.php';
            break;
        case 'roomtype':
            $list_roomtype = roomtype_selectall();
            include 'view/roomtype.php';
            break;
        case 'room';
            // if (isset($_GET['id_loai']) && ($_GET['id_loai'] > 0)) {
            $id_loai = $_GET['id_loai'];
            // } else {
            // $id_loai = 0;
            // }
            $list_room = room_selectallbyid($id_loai);
            $ten_loai = name_roomtype($id_loai);
            // $anh_loai= name_roomtype($id_loai);
            include "view/room.php";
        case 'roomdetail':
            if (isset($_GET['id_phong']) && ($_GET['id_phong'] > 0)) {
                $id_phong = $_GET['id_phong'];
                $room_one = room_getone($id_phong);
                // extract($id_phong);
                // $room_same_type = room_same_type($id_phong, $id_loai);
                // room_view($id_phong);
                $load_service_room = load_service_room($id_phong);
                include "view/roomdetail.php";
            }
            break;
        case 'contact':
            if (isset($_POST['contact']) && ($_POST['contact'])) {
                $email = $_POST['email'];
                $dien_thoai = $_POST['dien_thoai'];
                $dia_chi = $_POST['dia_chi'];
                $noi_dung = $_POST['noi_dung'];
                contact_insert($email, $dien_thoai, $dia_chi, $noi_dung);
            }
            include "view/contact.php";
            break;
        case 'service':
            include 'view/service.php';
            break;
        default:
            include 'view/home.php';
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
