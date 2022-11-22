<?php

    function user_selectall(){
        $sql="SELECT * FROM nguoi_dung";
        return pdo_query($sql);
    }

    function user_insert($ten,$ho_ten,$dia_chi,$mat_khau,$cmnd,$email,$so_dien_thoai,$vai_tro){
        $sql="INSERT INTO nguoi_dung(ten,ho_ten,dia_chi,mat_khau,cmnd,email,so_dien_thoai,vai_tro) VALUES (?,?,?,?,?,?,?,?)";
        pdo_execute($sql,$ten,$ho_ten,$dia_chi,$mat_khau,$cmnd,$email,$so_dien_thoai,$vai_tro);
    }

    
    function user_update($id_nguoi,$ten,$ho_ten,$dia_chi,$mat_khau,$cmnd,$email,$so_dien_thoai,$vai_tro){
        $sql = "UPDATE nguoi_dung SET ten=?,ho_ten=?,dia_chi=?, mat_khau=?,cmnd=?,email=?,so_dien_thoai=?,vai_tro=? WHERE id_nguoi=?";
        pdo_execute($sql,$ten,$ho_ten,$dia_chi,$mat_khau,$cmnd,$email,$so_dien_thoai,$vai_tro==1,$id_nguoi,);
    }

    function user_delete($id_nguoi){
        $sql = "DELETE FROM nguoi_dung WHERE id_nguoi=?";
        pdo_execute($sql,$id_nguoi);
    }    

    function user_getone($id_nguoi){
        $sql="SELECT * FROM nguoi_dung WHERE id_nguoi=?";
        return pdo_query_one($sql,$id_nguoi);
    }

    function user_login($ten,$mat_khau){
        $sql="SELECT * FROM nguoi_dung WHERE ten='".$ten."'AND mat_khau='".$mat_khau."'";
        return pdo_query_one($sql);
    }

    function user_forget($email){
        $sql= "SELECT * FROM nguoi_dung WHERE email='".$email."'";
        return pdo_query_one($sql);
    }
    
?>