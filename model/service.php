<?php
    function service_selectall(){
        $sql="select * from dich_vu";
        return pdo_query($sql);
    }

    function service_insert($ten_dich_vu, $id_phong, $hinh_anh){
        $sql="INSERT INTO dich_vu(ten_dich_vu, id_phong, hinh_anh) VALUES(?,?,?)";
        pdo_execute($sql,$ten_dich_vu, $id_phong, $hinh_anh);
    }
    function service_update($id_dich_vu, $ten_dich_vu, $id_phong, $hinh_anh){
        if($hinh_anh!=""){
            $sql="UPDATE dich_vu SET ten_dich_vu='".$ten_dich_vu."', id_phong='".$id_phong."', hinh_anh='".$hinh_anh."' WHERE id_dich_vu=".$id_dich_vu;
        }else {
            $sql="UPDATE dich_vu SET ten_dich_vu='".$ten_dich_vu."', id_phong='".$id_phong."' WHERE id_dich_vu=".$id_dich_vu;
        }
        pdo_execute($sql);
    }

    function service_delete($id_dich_vu){
        $sql = "DELETE FROM dich_vu WHERE id_dich_vu=?";
        pdo_execute($sql,$id_dich_vu);
    }         

    function service_getone($id_dich_vu){
        $sql="SELECT * FROM dich_vu WHERE id_dich_vu=?";
        return pdo_query_one($sql,$id_dich_vu);
    }

    function load_service_room($id_phong){
        $sql="select * from dich_vu where id_phong=".$id_phong;
        return pdo_query($sql);
    }

?>