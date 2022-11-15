<?php
    include "view/header.php";

    if(isset($_GET['ctr']) && ($_GET['ctr'] != '')){
        $ctr= $_GET['ctr'];
        switch($ctr){
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
    }else {
        include "view/home.php";
    }

    include "view/footer.php";



?>