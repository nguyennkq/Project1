<?php
include "view/header.php";
include "global.php";
include "model/pdo.php";
include "model/room.php";
include "model/roomtype.php";
include "model/contact.php";
include "model/service.php";
include "model/gallery.php";

if (isset($_GET['ctr']) && ($_GET['ctr'] != '')) {
    $ctr = $_GET['ctr'];
    switch ($ctr) {
        case 'register':
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
            $ten_loai= name_roomtype($id_loai);
            // $anh_loai= name_roomtype($id_loai);
            include "view/room.php";
        case 'blog':
            include 'view/blog.php';
            break;
        case 'contact':
            if (isset($_POST['contact'])&&($_POST['contact'])) {
                $email = $_POST['email'];
                $dien_thoai = $_POST['dien_thoai'];
                $dia_chi = $_POST['dia_chi'];
                $noi_dung = $_POST['noi_dung'];
                contact_insert($email,$dien_thoai,$dia_chi,$noi_dung);
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
