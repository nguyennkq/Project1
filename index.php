<?php
session_start();
include "view/header.php";
include "global.php";
include "model/pdo.php";
include "model/room.php";
include "model/roomtype.php";
include "model/contact.php";
include "model/user.php";
include "model/gallery.php";
include "model/service.php";
include "model/feedback.php";
include "model/booking.php";
if (!isset($_SESSION['booking'])) $_SESSION['booking'] = [];
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
                }
            }
            include 'view/account/register.php';
            break;
        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $ten = $_POST['ten'];
                $mat_khau = $_POST['mat_khau'];
                $checkuser = user_login($ten, $mat_khau);
                // $check_admin = check_usernv($ho_ten, $mat_khau);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header("Location: index.php");
                } else {
                    $message = "Tài khoản không tồn tại, vui lòng đăng kí";
                }
            }
            include 'view/account/login.php';
            break;
        case 'forget':
            include 'view/account/forget.php';
            break;
        case 'logout':
            session_destroy();
            header("Location: index.php");
            break;
        case 'roomtype':
            // $search_room=search_room($nguoi_lon_max,$tre_em_max);
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
            break;
        case 'room-search':
            if (isset($_POST['search']) && ($_POST['search'])) {
                $nguoi_lon = $_POST['nguoi_lon'];
                $tre_em = $_POST['tre_em'];
            } else {
                $tre_em = 0;
                $nguoi_lon=0;
            }
            $list_room_search=search_room($nguoi_lon,$tre_em);
            include "view/roomsearch.php";
            break;
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
        case 'add-booking':
            // Thêm phòng
            if (isset($_POST['id_phong'])) {
                $id_phong = $_POST['id_phong'];
                $ten_phong = $_POST['ten_phong'];
                $anh_phong = $_POST['anh_phong'];
                $gia_phong = $_POST['gia_phong'];
                $so_luong = 1;
                $ngay_vao = $_POST['ngay_vao'];
                $ngay_tra = $_POST['ngay_tra'];
                $nguoi_lon = $_POST['nguoi_lon'];
                $tre_em = $_POST['tre_em'];
                $thanh_tien = $so_luong * $gia_phong;
                $add = [$id_phong, $ten_phong, $anh_phong, $gia_phong, $so_luong, $thanh_tien, $ngay_vao, $ngay_tra, $nguoi_lon, $tre_em];
                array_push($_SESSION['booking'], $add);
            }
            include 'view/bookingdetail.php';
            break;
        case 'delete-booking':
            // Xóa
            if (isset($_GET['id-booking'])) {
                array_splice($_SESSION['booking'], $_GET['id-booking'], 1);
            } else {
                $_SESSION['booking'] = [];
            }
            header('Location: index.php?ctr=view-booking');
            break;
        case 'view-booking':
            include 'view/bookingdetail.php';
            break;
        case 'info-booking':
            $nguoi_dung = user_selectall();
            include 'view/booking.php';
            break;
        case 'pay-booking':
            if (isset($_POST['pay-booking']) && ($_POST['pay-booking'])) {
                $ngay_dat = date('Y/m/d');
                $tong_tien = $_POST['tong_tien'];
                $thanh_toan = $_POST['thanh_toan'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $dien_thoai = $_POST['dien_thoai'];
                $id_nguoi = $_POST['id_nguoi'];

                $id_dat = booking_insert($ngay_dat, $tong_tien, $thanh_toan, $ho_ten, $email, $dien_thoai, $id_nguoi);
                if (isset($_SESSION['booking']) && (count($_SESSION['booking']) > 0)) {
                    foreach ($_SESSION['booking'] as $cart) {
                        bookingdetail_insert($cart[6], $cart[7], $cart[8], $cart[9], $cart[4], $cart[3], $cart[5], $cart[1], $cart[2], $id_dat, $cart[0]);
                        // include 'view/bookinginfo.php';
                    }
                    unset($_SESSION['booking']);
                }
                // if (isset($_POST['id-booking'])) {
                //     array_splice($_SESSION['booking'], $_POST['id-booking'], 1);
                // } else {
                //     $_SESSION['booking'] = [];
                // }
            }
            
            break;
        // case 'done':
        //     include 'view/bookinginfo.php';
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
            $list_service = service_selectall();
            include 'view/service.php';
            break;
        case 'gallery':
            $list_gallery = gallery_selectall();
            include 'view/gallery.php';
            break;
        default:
            include 'view/home.php';
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
