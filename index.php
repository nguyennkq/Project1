<?php
include "view/header.php";
include "./global.php";
include "./model/pdo.php";
include "./model/user_pdo.php";

if (isset($_GET['ctr']) && ($_GET['ctr'] != '')) {
    $ctr = $_GET['ctr'];
    switch ($ctr) {
        case 'register':
            if (isset($_POST['btn'])) {
                $flag = true;
                $username = $_POST['username'];
                $name = $_POST['name'];
                $diachi = $_POST['address'];
                $gioitinh = $_POST['gioitinh'];
                $password = $_POST['password'];
                $sdt = $_POST['sdt'];
                $cmnd = $_POST['cmt'];
                $email = $_POST['email'];
                $role = $_POST['vai_tro'];

                if (empty($username)) {
                    $err_name = "không được để chống";
                    $flag = false;
                }

                if (empty($name)) {
                    $user_name = "không được để chống";
                    $flag = false;
                }

                if (empty($diachi)) {
                    $dia_chi = "không được để chống";
                    $flag = false;
                }

                if (empty($gioitinh)) {
                    $gioi_tinh = "không được để chống";
                    $flag = false;
                }

                if (empty($password)) {
                    $pass = "không được để chống";
                    $flag = false;
                }

                if (empty($sdt)) {
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
                    user_insert($username,$name,$diachi,$gioitinh,$password,$cmnd,$email,$role,$sdt);
                    // $thanhcong = "Đăng ký người dùng thành công";
                    header("location: login.php");
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
            include 'view/roomtype.php';
            break;
        case 'blog':
            include 'view/blog.php';
            break;
        case 'contact':
            include 'view/contact.php';
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
