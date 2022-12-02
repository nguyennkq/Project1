<?php
session_start();
include "view/header.php";
include "./global.php";
include "./model/pdo.php";
include "./model/user_pdo.php";
//
include_once "./src/PHPMailer-master/src/Exception.php";
include_once "./src/PHPMailer-master/src/OAuth.php";
include_once "./src/PHPMailer-master/src/PHPMailer.php";
include_once "./src/PHPMailer-master/src/SMTP.php";
include_once "./src/PHPMailer-master/src/POP3.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//

if (isset($_GET['ctr']) && ($_GET['ctr'] != '')) {
    $ctr = $_GET['ctr'];
    switch ($ctr) {
        case 'register':
            //ĐĂNG KÝ
            if (isset($_POST['btn'])) {
                $flag = true;
                $username = $_POST['username'];
                $name = $_POST['name'];
                $diachi = $_POST['address'];
                $gioitinh = $_POST['gioitinh'];
                $password = $_POST['password'];
                $pass_word = $_POST['pass'];
                $sdt = $_POST['sdt'];
                $cmnd = $_POST['cmt'];
                $email = $_POST['email'];
                $role = 1;

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
                if (empty($pass_word)) {
                    $pass1 = "không được để trống";
                    $flag = false;
                }
                elseif($_POST['pass']!=$_POST['password']){
                    $pass2 = "Mật Khẩu không khớp";
                    $flag = false;
                }
                // if($_POST['password']==""){
                //     $pass3 = "Bạn chưa nhập mật khẩu";
                //     $flag = false;
                // }
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
                    $thanhcong = "Đăng ký thành công";
                }
            }
            include 'view/account/register.php';
            break;
        case 'login':
            //ĐĂNG NHẬP
            if(isset($_POST['btn-dn'])&&$_POST['btn-dn']){
                // $flag = true;
                // $checkrole = checkrole($checkrole);
                $email = $_POST['email'];
                $password = $_POST['pass'];
                $ktra = $_POST['email']&&$_POST['pass'];
                $checkuser = check_user($email,$password);
                if(is_array($checkuser)){
                    $_SESSION['nguoi_dung']=$checkuser;
                    extract($_SESSION['nguoi_dung']);
                    // $role = $_SESSION['nguoi_dung']['vai_tro'];
                    header("location: index.php");
                    // echo "thanhcong";
                }elseif(empty($ktra)){
                    $tb = "Bạn phải nhập đủ yêu cầu";
                }
                else{
                    // echo "thatbai";
                    $tb = "Tài khoản không tồn tại";
                }
               
            }
            include 'view/account/login.php';
            break;
        case 'logout':
                session_destroy();
                header("Location: index.php");
            break;
        case 'forget':
            //QUÊN MẬT KHẨU
            if(isset($_POST['send'])){
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                // var_dump($checkemail);
                if($checkemail!=""){
                    $id = $checkemail['id_nguoi'];
                    $passmoi = generateRandomString();
                    user_update_password($id,$passmoi);
                    $mail = new PHPMailer(true);
                            try {
                                //Server settings
                                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                                $mail->isSMTP();                                      // Set mailer to use SMTP
                                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                $mail->Username = 'nguyenmanhhieutl@gmail.com';                 // SMTP username
                                $mail->Password = 'eragdefcbsmyapty';                           // SMTP password
                                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                $mail->Port = 587;                                    // TCP port to connect to

                                //Recipients
                                $mail->setFrom('nguyenmanhhieutl@gmail.com ', 'Mailer');
                                $mail->addAddress($email,$checkemail['ho_ten']);     // Add a recipient
                                // $mail->addAddress('vietnqph27022@fpt.edu.vn','việt sếch');               // Name is optional
                                // $mail->addReplyTo('info@example.com', 'Information');
                                $mail->addCC('nguyenmanhhieutl@gmail.com');
                                // $mail->addBCC('bcc@example.com');

                                //Attachments
                                // $mail->addent('/vAttachmar/tmp/file.tar.gz');         // Add attachments
                                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                                //Content
                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = 'Mật khẩu mới của bạn';
                                $mail->Body    = 'Đây là mật khẩu mới của bạn,có hiệu lực 5 phút kể từ khi bạn click tìm mật khẩu ' . $passmoi;
                                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

                                $mail->send();
                                $_SESSION['succes_pw'] = 'Mật khẩu mới đã được gửi trong email của bạn.';
                                // header('location:index.php');
                            } catch (Exception $e) {
                                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                            }
                            $err_email = "Gửi mã thành công mời bạn vào email để xem lại mã";
                        }elseif(empty($checkemail)){
                            $err_email = "Không được để Trống";
                        }else{
                            $err_email = "Email này không tồn tại";
                        }
            }
            include 'view/account/forget.php';
            break;
        case 'doimk':
            if(isset($_POST['xacnhan'])&&$_POST['xacnhan']){
                $flag = true;
                $email = $_POST['email'];
                $passnew = $_POST['mk_moi'];
                if(empty($email)){
                    $err = "Không được để chống";
                    $flag = false;
                }

                if(empty($passnew)){
                    $err = "Không được để trống";
                    $flag = false;
                }

                if($_POST['email']!=$_SESSION['nguoi_dung']['email']){
                    $err_email = "Email không chính xác";
                    $flag = false;
                }

                if($flag==true){
                    $id = $_SESSION['nguoi_dung']['id_nguoi'];
                    user_update_password($id,$passnew);
                    echo "Đổi mk thành công";
                }
            }
            include 'view/account/doimk.php';
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


