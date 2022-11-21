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

    //xóa người dùng
    function user_delete($id_nguoi){
        $sql = "SELECT * FROM nguoi_dung WHERE id_nguoi = ?";
        pdo_execute($sql,$id_nguoi);
    }
?>