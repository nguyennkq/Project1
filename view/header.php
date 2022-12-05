<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./src/css/index.css">
    <link rel="stylesheet" href="./src/css/contact1.css">
    <link rel="stylesheet" href="./src/css/service.css">
    <link rel="stylesheet" href="./src/css/roomtype.css">
    <link rel="stylesheet" href="./src/css/account1.css">
    <link rel="stylesheet" href="./src/css/bookingdetail.css">
    <link rel="stylesheet" href="./src/css/aside.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_orange.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
</head>

<body>
    <div class="box-container">
        <header>
            <div class="nav">
                <div class="logo">
                    <a href="index.php"><img src="./img/logo1.jpg" alt=""></a>
                </div>
                <div class="menu">
                    <ul id="nav">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a href="index.php?ctr=roomtype">Loại phòng</a></li>
                        <li><a href="index.php?ctr=blog">Blog</a></li>
                        <li><a href="index.php?ctr=gallery">Thư viện</a></li>
                        <li><a href="index.php?ctr=service">Dịch vụ</a></li>
                        <li><a href="index.php?ctr=contact">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="account">
                <?php
                        if (isset($_SESSION['nguoi_dung'])) { 
                            // var_dump($_SESSION['nguoi_dung']);
                        // extract($_SESSION['nguoi_dung']);
                            if($_SESSION['nguoi_dung']['vai_tro']==0){
                    ?>
                        <span>Xin chào:<?php echo $_SESSION['nguoi_dung']['ten']; ?></span>
                        <a href="admin/index.php">Vào trang admin</a>
                        <a href="index.php?ctr=change-password">Đổi mật khẩu</a>  
                        <a class="logout" href="index.php?ctr=logout"><i class="fa-solid fa-right-to-bracket"></i></a>
                        <?php }else{ ?>
                            <span>Xin chào:<?php echo $_SESSION['nguoi_dung']['ten']; ?></span>
                            <a href="index.php?ctr=change-password">Đổi mật khẩu</a>  
                            <a class="logout" href="index.php?ctr=logout"><i class="fa-solid fa-right-to-bracket"></i></a>
                        <?php } ?>
                    <?php }else{ ?>
                    <a href="index.php?ctr=register">Đăng ký</a>
                    <span>|</span>
                    <a href="index.php?ctr=login">Đăng nhập</a>
                    <?php }?>
                </div>
                <a style="font-size: 20px; color: #F4694C" href="index.php?ctr=view-booking"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </header>
        <hr>