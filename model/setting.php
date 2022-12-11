<?php
     function setting_selectall(){
        $sql="SELECT * FROM cai_dat";
        return pdo_query($sql);
    }

    function setting_insert($logo,$email,$dia_chi,$dien_thoai){
        $sql="INSERT INTO cai_dat(logo,email,dia_chi,dien_thoai) VALUES(?,?,?,?)";
        pdo_execute($sql,$logo,$email,$dia_chi,$dien_thoai);
    }

    function setting_update($id_cai_dat,$logo,$email,$dia_chi,$dien_thoai){
        if($logo!=""){
            $sql="UPDATE cai_dat SET logo='".$logo."', email='".$email."',dia_chi='".$dia_chi."',dien_thoai='".$dien_thoai."' WHERE id_cai_dat=".$id_cai_dat;
        }else {
            $sql="UPDATE cai_dat SET email='".$email."',dia_chi='".$dia_chi."',dien_thoai='".$dien_thoai."' WHERE id_cai_dat=".$id_cai_dat;
        }
        pdo_execute($sql);
    }

    function setting_delete($id_cai_dat){
        $sql = "DELETE FROM cai_dat WHERE id_cai_dat=?";
        pdo_execute($sql,$id_cai_dat);
    }     

    function setting_getone($id_cai_dat){
        $sql="SELECT * FROM cai_dat WHERE id_cai_dat=?";
        return pdo_query_one($sql,$id_cai_dat);
    }

   

?>