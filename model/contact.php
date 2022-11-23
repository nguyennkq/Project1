<?php
    function contact_selectall(){
        $sql="select * from lien_he";
        return pdo_query($sql);
    }

    function contact_insert($email,$dien_thoai,$dia_chi,$noi_dung){
        $sql="INSERT INTO lien_he(email,dien_thoai,dia_chi,noi_dung) VALUES(?,?,?,?)";
        pdo_execute($sql,$email,$dien_thoai,$dia_chi,$noi_dung);
    }

    function contact_delete($id_lien_he){
        $sql = "DELETE FROM lien_he WHERE id_lien_he=?";
        pdo_execute($sql,$id_lien_he);
    }         

    function contact_getone($id_lien_he){
        $sql="SELECT * FROM lien_he WHERE id_lien_he=?";
        return pdo_query_one($sql,$id_lien_he);
    }
?>