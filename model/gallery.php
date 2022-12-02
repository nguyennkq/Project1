<?php
    function gallery_selectall(){
        $sql="select * from thu_vien";
        return pdo_query($sql);
    }

    function gallery_insert($anh_thu_vien, $id_phong){
        $sql="INSERT INTO thu_vien(anh_thu_vien,id_phong) VALUES(?,?)";
        pdo_execute($sql,$anh_thu_vien,$id_phong);
    }

    function gallery_update($id_thu_vien,$anh_thu_vien,$id_phong){
        if($anh_thu_vien!=""){
            $sql="UPDATE thu_vien SET anh_thu_vien='".$anh_thu_vien."', id_phong='".$id_phong."' WHERE id_thu_vien=".$id_thu_vien;
        }else {
            $sql="UPDATE thu_vien SET id_phong='".$id_phong."' WHERE id_thu_vien=".$id_thu_vien;
        }
        pdo_execute($sql);
    }

    function gallery_delete($id_thu_vien){
        $sql = "DELETE FROM thu_vien WHERE id_thu_vien=?";
        pdo_execute($sql,$id_thu_vien);
    }         

    function gallery_count(){
        $sql="SELECT COUNT(*) FROM thu_vien";
        return pdo_query($sql);
    }

    function gallery_getone($id_thu_vien){
        $sql="SELECT * FROM thu_vien WHERE id_thu_vien=?";
        return pdo_query_one($sql,$id_thu_vien);
    }

    function load_gallery_room($id_phong){
        $sql="SELECT * FROM thu_vien where id_phong=".$id_phong;
        return pdo_query($sql);
    }


?>