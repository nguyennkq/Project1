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
include "view/config-vnpay.php";
$top3 = room_selectall_top3();
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
                    extract($_SESSION['user']);
                    if ($vai_tro == 1) {
                        header("Location: index.php");
                    } else if ($vai_tro == 0) {
                        header("Location: admin/index.php");
                    }
                } else {
                    $message = "Tài khoản không tồn tại, vui lòng đăng kí";
                }
            }
            include 'view/account/login.php';
            break;
        case 'forget':
            include 'view/account/forget.php';
            break;
        case 'info-user':

            include 'view/account/info-user.php';
            break;
        case 'logout':
            session_destroy();
            header("Location: index.php");
            break;
        case 'roomtype':
            // $search_room=search_room($nguoi_lon_max,$tre_em_max);
            $list_roomtype = roomtype_selectall();
            include 'view/room-type.php';
            break;
        case 'room';
            $id_loai = $_GET['id_loai'];
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
                $nguoi_lon = 0;
            }
            $list_room_search = search_room($nguoi_lon, $tre_em);
            if (isset($_POST['search'])) {
                $ngay_vao = $_POST['ngay_vao'];
                $ngay_tra = $_POST['ngay_tra'];
                $_SESSION['ngay_vao'] = $ngay_vao;
                $_SESSION['ngay_tra'] = $ngay_tra;
                $_SESSION['nguoi_lon'] = $nguoi_lon;
                $_SESSION['tre_em'] = $tre_em;
            }
            include "view/room-search.php";
            break;
        case 'roomdetail':
            if (isset($_GET['id_phong']) && ($_GET['id_phong'] > 0)) {
                $id_phong = $_GET['id_phong'];
                $room_one = room_getone($id_phong);
                // extract($id_phong);
                // $room_same_type = room_same_type($id_phong, $id_loai);
                room_view($id_phong);
                $load_gallery_room = load_gallery_room($id_phong);
                $load_service_room = load_service_room($id_phong);
                include "view/room-detail.php";
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
            include 'view/booking-detail.php';
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
            include 'view/booking-detail.php';
            break;
        case 'info-booking':
            $nguoi_dung = user_selectall();
            include 'view/booking.php';
            break;
        case 'pay-booking':
            if (isset($_POST['redirect']) && ($_POST['redirect'])) {
                $code_order = rand(0, 9999);
                $ngay_dat = date('Y/m/d');
                $tong_tien = $_POST['tong_tien'];
                $thanh_toan = $_POST['thanh_toan'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $dien_thoai = $_POST['dien_thoai'];
                $id_nguoi = $_POST['id_nguoi'];
                $thanh_tien = $_POST['thanh_tien'];
                if ($thanh_toan == 1 || $thanh_toan == 2) {
                    $id_dat = booking_insert($ngay_dat, $tong_tien, $thanh_toan, $ho_ten, $email, $dien_thoai, $id_nguoi);
                    $_SESSION['id_dat'] = $id_dat;
                    if (isset($_SESSION['booking']) && (count($_SESSION['booking']) > 0)) {
                        foreach ($_SESSION['booking'] as $booking) {
                            if (isset($_SESSION['user'])) {
                                bookingdetail_insert($booking[6], $booking[7], $booking[8], $booking[9], $booking[4], $booking[3], $thanh_tien, $booking[1], $booking[2], $id_dat, $booking[0]);
                                room_update_after_booking($booking[0]);
                            }
                        }
                        unset($_SESSION['booking']);
                    }
                    include "view/booking-info.php";
                } else if ($thanh_toan == 3) {
                    $vnp_TxnRef = $code_order; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Thanh toán hóa đơn';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = $tong_tien * 100;
                    $vnp_Locale = 'VN';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    //Add Params of 2.0.1 Version
                    $vnp_ExpireDate = $expire;

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        "vnp_ExpireDate" => $vnp_ExpireDate
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    // }

                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                    );
                    if (isset($_POST['redirect'])) {
                        $id_dat = booking_insert($ngay_dat, $tong_tien, $thanh_toan, $ho_ten, $email, $dien_thoai, $id_nguoi);
                        $_SESSION['id_dat'] = $id_dat;
                        if (isset($_SESSION['booking']) && (count($_SESSION['booking']) > 0)) {
                            foreach ($_SESSION['booking'] as $booking) {
                                if (isset($_SESSION['user'])) {
                                    bookingdetail_insert($booking[6], $booking[7], $booking[8], $booking[9], $booking[4], $booking[3], $thanh_tien, $booking[1], $booking[2], $id_dat, $booking[0]);
                                    room_update_after_booking($booking[0]);
                                }
                            }
                            unset($_SESSION['booking']);
                        }
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                }
            }
            // include "view/booking-info.php";
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
