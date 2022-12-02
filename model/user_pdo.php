<?php
    // include_once "./pdo.php";
    // include_once "../global.php";

    //truy vấn tất cả bản ghi của bảng người dùng
    function user_select_all(){
        $sql = "SELECT * FROM nguoi_dung";
        return pdo_query($sql);
    }

    //truy vấn một bản ghi trong bảng người dùng
    function user_select_by_id($id){
        $sql = "SELECT * FROM nguoi_dung WHERE id_nguoi = $id";
        return pdo_query_one($sql);
    }

    //Thêm mới người dùng
    function user_insert($username,$name,$diachi,$gioitinh,$password,$cmnd,$email,$role,$sdt){
        $sql = "INSERT INTO nguoi_dung(ten, ho_ten, dia_chi, gioi_tinh, mat_khau, cmnd, email, vai_tro, sdt) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        pdo_execute( $sql,$username,$name,$diachi,$gioitinh,$password,$cmnd,$email,$role,$sdt);
    }

    //Cập nhật người dùng
    function user_update($username,$name,$diachi,$gioitinh,$password,$cmnd,$email,$role,$sdt){
        $sql = "UPDATE nguoi_dung SET ten = ?, ho_ten = ?, dia_chi = ?, gioi_tinh = ?, mat_khau = ?, cmnd = ?, email = ?, vai_tro = ?, sdt = ? WHERE id_nguoi = ?";
        pdo_execute($sql,$username,$name,$diachi,$gioitinh,$password,$cmnd,$email,$role,$sdt);
    }

    function user_update_password($id,$password){
        $sql = "UPDATE nguoi_dung SET mat_khau = '$password' WHERE id_nguoi = $id";
        return pdo_execute($sql);
    }

    //xóa người dùng
    function user_delete($id_nguoi){
        $sql = "SELECT * FROM nguoi_dung WHERE id_nguoi = ?";
        pdo_execute($sql,$id_nguoi);
    }

    //check người dùng
    function check_user($email,$password){
        $sql="SELECT * FROM `nguoi_dung` WHERE email='$email' AND mat_khau='$password';";
        return pdo_query_one($sql);
    }

    //check email
    function checkemail($email){
        $sql = "SELECT * FROM nguoi_dung WHERE email = '$email' ";
        return pdo_query_one($sql);
    }

    //check pass
    function checkpass($password){
        $sql = "SELECT * FROM nguoi_dung WHERE mat_khau = '$password' ";
        return pdo_query_one($sql);
    }

    //check vai trò
    function checkrole($role){
        $sql = "SELECT * FROM nguoi_dung WHERE vai_tro = '$role' ";
        return pdo_query_one($sql);
    }
    //lấy từ thư viện
    function generateRandomString($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function check_admin_role(){
        if(isset($_SESSION['nguoi_dung']) &&  $_SESSION['nguoi_dung']['role'] == 0){
            return true;
        }
        return false;
    }
?>