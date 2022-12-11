<?php

function user_getone($id_nguoi){
    $sql="SELECT * FROM nguoi_dung WHERE id_nguoi=?";
    return pdo_query_one($sql,$id_nguoi);
}


function user_forget($email){
    $sql= "SELECT * FROM nguoi_dung WHERE email='".$email."'";
    return pdo_query_one($sql);
}


function check_account($ten){
    $sql = "select * from nguoi_dung where ten='".$ten."' ";
    return pdo_query_one($sql);
}


function user_count(){
    $sql="SELECT COUNT(*) as dem FROM nguoi_dung";
    return pdo_query($sql);
}

//truy vấn tất cả bản ghi của bảng người dùng
function user_selectall(){
    $sql = "SELECT * FROM nguoi_dung";
    return pdo_query($sql);
}

//truy vấn một bản ghi trong bảng người dùng
function user_select_by_id($id){
    $sql = "SELECT * FROM nguoi_dung WHERE id_nguoi = $id";
    return pdo_query_one($sql);
}

//Thêm mới người dùng
function user_insert($ten,$ho_ten,$dia_chi,$mat_khau,$cmnd,$email,$so_dien_thoai,$vai_tro){
    $sql = "INSERT INTO nguoi_dung(ten,ho_ten,dia_chi,mat_khau,cmnd,email,so_dien_thoai,vai_tro) VALUES (?,?,?,?,?,?,?,?)";
    pdo_execute( $sql,$ten,$ho_ten,$dia_chi,$mat_khau,$cmnd,$email,$so_dien_thoai,$vai_tro);
}

//Cập nhật người dùng
function user_update($id_nguoi,$ten,$ho_ten,$dia_chi,$mat_khau,$cmnd,$email,$so_dien_thoai,$vai_tro){
    $sql = "UPDATE nguoi_dung SET ten = ?, ho_ten = ?, dia_chi = ?, mat_khau = ?, cmnd = ?, email = ?, so_dien_thoai = ?, vai_tro = ? WHERE id_nguoi = ?";
    pdo_execute($sql,$ten,$ho_ten,$dia_chi,$mat_khau,$cmnd,$email,$so_dien_thoai,$vai_tro==1,$id_nguoi);
}

function user_update_password($id,$mat_khau){
    $sql = "UPDATE nguoi_dung SET mat_khau = '$mat_khau' WHERE id_nguoi = $id";
    return pdo_execute($sql);
}

//xóa người dùng
function user_delete($id_nguoi){
    $sql = "SELECT * FROM nguoi_dung WHERE id_nguoi = ?";
    pdo_execute($sql,$id_nguoi);
}

//check người dùng
function check_user($ten,$mat_khau){
    $sql="SELECT * FROM `nguoi_dung` WHERE ten='$ten' AND mat_khau='$mat_khau';";
    return pdo_query_one($sql);
}

//check email
function checkemail($email){
    $sql = "SELECT * FROM nguoi_dung WHERE email = '$email' ";
    return pdo_query_one($sql);
}

//check pass
function checkpass($mat_khau){
    $sql = "SELECT * FROM nguoi_dung WHERE mat_khau = '$mat_khau' ";
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
?>