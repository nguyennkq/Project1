<?php
    function roomtype_selectall(){
        $sql="SELECT * FROM loai_phong";
        return pdo_query($sql);
    }

    function roomtype_insert($ten_loai,$anh_loai){
        $sql="INSERT INTO loai_phong(ten_loai,anh_loai) VALUES (?,?)";
        pdo_execute($sql,$ten_loai,$anh_loai);
    }

   
    function roomtype_update($id_loai,$ten_loai,$anh_loai){
        if($anh_loai!=""){
            $sql = "UPDATE loai_phong SET ten_loai='".$ten_loai."', anh_loai='".$anh_loai."' WHERE id_loai=".$id_loai;
        }else {
            $sql= "UPDATE loai_phong SET ten_loai='".$ten_loai."' WHERE id_loai=".$id_loai;
        }
        pdo_execute($sql);
    }

    function roomtype_delete($id_loai){
        $sql="DELETE FROM loai_phong WHERE id_loai=?";
        pdo_execute($sql,$id_loai);
    }
    function roomtype_count(){
        $sql="SELECT COUNT(*) as dem FROM loai_phong";
        return pdo_query($sql);
    }
    
    function name_roomtype($id_loai){
        if($id_loai>0){
            $sql="select * from loai_phong where id_loai=".$id_loai;
            extract(pdo_query_one($sql));
            return $ten_loai;
        }else {
            return "";
        }
    }
    function roomtype_getone($id_loai){
        $sql="SELECT * FROM loai_phong WHERE id_loai=?";
        return pdo_query_one($sql,$id_loai);
    }

    function room_same_type($id_loai,$id_phong){
        $sql = "SELECT * FROM phong WHERE id_loai=".$id_loai." AND id_phong <> ".$id_phong;
        return pdo_query($sql);
    }
?>
