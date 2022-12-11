<?php

    function room_selectall(){
        $sql="SELECT * FROM phong";
        return pdo_query($sql);
    }

    function room_selectallbyid($id_loai){
        $sql = "SELECT * from phong where 1";
       
        if ($id_loai > 0) {
            $sql .= " and id_loai = '" . $id_loai . "'";
        }
        $sql .= " order by id_phong desc ";
        return pdo_query($sql);
    }

    function search_room($nguoi_lon,$tre_em){
        $sql="SELECT * FROM phong WHERE  1";
        $sql.=" AND '".$nguoi_lon."'<= nguoi_lon_max";
        $sql.=" AND '".$tre_em."'<= tre_em_max";
        return pdo_query($sql);
    }

    function room_insert($ten_phong,$gia_phong,$mo_ta,$anh_phong,$nguoi_lon_max,$tre_em_max,$trang_thai,$dien_tich,$luot_xem,$id_loai){
        $sql="INSERT INTO phong(ten_phong,gia_phong,mo_ta,anh_phong,nguoi_lon_max,tre_em_max,trang_thai,dien_tich,luot_xem,id_loai) VALUES (?,?,?,?,?,?,?,?,?,?)";
        pdo_execute($sql,$ten_phong,$gia_phong,$mo_ta,$anh_phong,$nguoi_lon_max,$tre_em_max,$trang_thai,$dien_tich,$luot_xem,$id_loai);
    }

    function room_update($id_phong,$ten_phong,$gia_phong,$mo_ta,$anh_phong,$nguoi_lon_max,$tre_em_max,$trang_thai,$dien_tich,$luot_xem,$id_loai){
        if($anh_phong!=""){
            $sql="UPDATE phong SET ten_phong='".$ten_phong."', gia_phong='".$gia_phong."',mo_ta='".$mo_ta."', anh_phong='".$anh_phong."',nguoi_lon_max='".$nguoi_lon_max."', tre_em_max='".$tre_em_max."', trang_thai='".$trang_thai."'=1,dien_tich='".$dien_tich."',luot_xem='".$luot_xem."', id_loai='".$id_loai."' WHERE id_phong=".$id_phong;
        }else {
            $sql="UPDATE phong SET ten_phong='".$ten_phong."', gia_phong='".$gia_phong."',mo_ta='".$mo_ta."',nguoi_lon_max='".$nguoi_lon_max."', tre_em_max='".$tre_em_max."', trang_thai='".$trang_thai."'=1,dien_tich='".$dien_tich."',luot_xem='".$luot_xem."', id_loai='".$id_loai."' WHERE id_phong=".$id_phong;
        }
        pdo_execute($sql);
    }

    
    function room_update_after_booking($id_phong){
            $sql="UPDATE phong SET trang_thai=0 WHERE id_phong=".$id_phong;
        pdo_execute($sql);
    }

    function room_delete($id_phong){
        $sql = "DELETE FROM phong WHERE id_phong=?";
        pdo_execute($sql,$id_phong);
    }         

    function room_count(){
        $sql="SELECT COUNT(*) as dem FROM phong";
        return pdo_query($sql);
    }

    function room_getone($id_phong){
        $sql="SELECT * from phong WHERE id_phong=?";
        return pdo_query_one($sql,$id_phong);
    }

    function room_view($id_phong){
        $sql = "UPDATE phong set luot_xem = luot_xem + 1 where id_phong = ?";
        pdo_execute($sql, $id_phong);
    }

    function room_selectall_top3()
{
    $sql = "SELECT * FROM phong where 1 order by luot_xem desc limit 0,3";
    return pdo_query($sql);
}


?>