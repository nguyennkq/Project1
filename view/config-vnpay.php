<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
$vnp_TmnCode = "58DMV4XY"; //Website ID in VNPAY System
$vnp_HashSecret = "EWYAZBNFSMTJFPOBKVWNDAHBBAZXGNNW"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
// Điều hướng về trang này khi bấm thanh toán vnpay
$vnp_Returnurl = "http://localhost/duan1/index.php?ctr=pay-booking";

$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
