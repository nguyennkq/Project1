<?php
include "view/header.php";
include "global.php";
include "model/pdo.php";
include "model/room.php";
include "model/roomtype.php";

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
