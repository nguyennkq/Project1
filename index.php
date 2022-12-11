<?php
// ZP6c95(Iu\H_FiO(
session_start();
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
include "model/setting.php";
$list_setting = setting_selectall();
include "view/config-vnpay.php";
include "view/header.php";


$error = array();
$top3 = room_selectall_top3();
if (!isset($_SESSION['booking'])) $_SESSION['booking'] = [];
if (isset($_GET['ctr']) && ($_GET['ctr'] != '')) {
    $ctr = $_GET['ctr'];
    switch ($ctr) {
        case 'register':
            if (isset($_POST['btn'])) {
                $flag = true;
                $ten = $_POST['username'];
                $ho_ten = $_POST['name'];
                $dia_chi = $_POST['address'];
                $mat_khau = $_POST['password'];
                $pass_word = $_POST['pass'];
                $so_dien_thoai = $_POST['sdt'];
                $cmnd = $_POST['cmt'];
                $email = $_POST['email'];
                $vai_tro = 1;

                if (empty($ten)) {
                    $err_name = "không được để chống";
                    $flag = false;
                }

                if (empty($ho_ten)) {
                    $user_name = "không được để chống";
                    $flag = false;
                }

                if (empty($dia_chi)) {
                    $dia_chi = "không được để chống";
                    $flag = false;
                }

                if (empty($mat_khau)) {
                    $pass = "không được để chống";
                    $flag = false;
                }
                if (empty($pass_word)) {
                    $pass1 = "không được để trống";
                    $flag = false;
                } elseif ($_POST['pass'] != $_POST['password']) {
                    $pass2 = "Mật Khẩu không khớp";
                    $flag = false;
                }

                if (empty($mat_khau)) {
                    $pass = "không được để chống";
                    $flag = false;
                }
                if (empty($pass_word)) {
                    $pass1 = "không được để trống";
                    $flag = false;
                } elseif ($_POST['pass'] != $_POST['password']) {
                    $pass2 = "Mật Khẩu không khớp";
                    $flag = false;
                }

                if (empty($so_dien_thoai)) {
                    $phone = "không được để chống";
                    $flag = false;
                }

                if (empty($cmnd)) {
                    $cmt = "không được để chống";
                    $flag = false;
                }

                if (empty($email)) {
                    $Email = "không được để chống";
                    $flag = false;
                }

                if ($flag == true) {
                    user_insert($ten, $ho_ten, $dia_chi, $mat_khau, $cmnd, $email, $so_dien_thoai, $vai_tro);
                    $thanhcong = "Đăng ký thành công";
                }
            }
            include 'view/account/register.php';
            break;
        case 'login':
            if (isset($_POST['btn-dn']) && $_POST['btn-dn']) {
                // $flag = true;
                // $checkrole = checkrole($checkrole);
                $ten = $_POST['ten'];
                $mat_khau = $_POST['pass'];
                $ktra = $_POST['ten'] && $_POST['pass'];
                $checkuser = check_user($ten, $mat_khau);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    extract($_SESSION['user']);
                    header("location: index.php");
                    // echo "thanhcong";
                } elseif (empty($ktra)) {
                    $tb = "Bạn phải nhập đủ yêu cầu";
                } else {
                    // echo "thatbai";
                    $tb = "Tài khoản không tồn tại";
                }
            }

            include 'view/account/login.php';
            break;
        case 'forget':
            if (isset($_POST['send'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $err = 'mật khẩu của bạn là: ' . $checkemail['mat_khau'];
                } else {
                    $err = 'tài khoản không tồn tại';
                }
            }
            include 'view/account/forget.php';
            break;
        case 'change-password':
            if (isset($_POST['xacnhan']) && $_POST['xacnhan']) {
                $flag = true;
                $passcu = $_POST['mk_cu'];
                $passnew = $_POST['mk_moi'];
                if (empty($passcu)) {
                    $err = "Không được để chống";
                    $flag = false;
                }


                if (empty($passnew)) {
                    $err = "Không được để trống";
                    $flag = false;
                }
                if ($_POST['mk_cu'] != $_SESSION['user']['mat_khau']) {
                    $err_pass = "Mật khẩu cũ không chính xác";
                    $flag = false;
                }

                if ($flag == true) {
                    $id = $_SESSION['user']['id_nguoi'];
                    user_update_password($id, $passnew);
                    $message = "Đổi mk thành công";
                }
            }
            include 'view/account/change-password.php';
            break;
        case 'update-user';
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id_nguoi = $_POST['id_nguoi'];
                $ten = $_POST['ten'];
                $ho_ten = $_POST['ho_ten'];
                $mat_khau = $_POST['mat_khau'];
                $dia_chi = $_POST['dia_chi'];
                $cmnd = $_POST['cmnd'];
                $email = $_POST['email'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $vai_tro = $_POST['vai_tro'];
                user_update($id_nguoi, $ten, $ho_ten, $dia_chi, $mat_khau, $cmnd, $email, $so_dien_thoai, $vai_tro);
                $_SESSION['user'] = check_user($ten, $mat_khau);
                header('Location: index.php?ctr=update-user');
            }
            $message = 'Cập nhật thành công';
            include 'view/account/update-user.php';
            break;
        case 'info-user':
            // Trang cá nhân người dùng
            include 'view/account/info-user.php';
            break;
        case 'logout':
            session_destroy();
            header("Location: index.php");
            break;
        case 'roomtype':
            // Trang loại phòng
            $list_roomtype = roomtype_selectall();
            include 'view/room-type.php';
            break;
        case 'room';
            // Trang phòng
            $id_loai = $_GET['id_loai'];
            $list_room = room_selectallbyid($id_loai);
            $ten_loai = name_roomtype($id_loai);
            include "view/room.php";
            break;
        case 'room-search':
            // Tìm kiếm phòng theo người
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
                extract($room_one);
                $room_same_type = room_same_type($id_loai, $id_phong);
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
                if (empty($ngay_vao)) {
                    $error['ngay_vao'] = "Không được để trống ngày vào";
                } else {
                    $ngay_vao = $_POST['ngay_vao'];
                }
                if (empty($ngay_tra)) {
                    $error['ngay_tra'] = "Vui lòng chọn ngày trả";
                } else {
                    $ngay_tra = $_POST['ngay_tra'];
                }
                if (empty($nguoi_lon)) {
                    $error['nguoi_lon'] = "Vui lòng chọn người lớn";
                } else {
                    $nguoi_lon = $_POST['nguoi_lon'];
                }
                $add = [$id_phong, $ten_phong, $anh_phong, $gia_phong, $so_luong, $thanh_tien, $ngay_vao, $ngay_tra, $nguoi_lon, $tre_em];
                if (empty($error)) {
                    array_push($_SESSION['booking'], $add);
                }
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
                    // include "view/booking-info.php";
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
                        // die();
                    } else {
                        echo json_encode($returnData);
                    }
                }
            }
            include "view/booking-info.php";
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
