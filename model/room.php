<?php

// require_once 'pdo.php';
    function room_selectall(){
        $sql="SELECT * FROM phong";
        return pdo_query($sql);
    }

    function room_selectallbyid($id_loai){
        $sql = "SELECT * from phong where 1";
        // if ($keyw != "") {
        //     $sql .= " and ten_hh like '%" . $keyw . "%'";
        // }
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
    // $nguoi_lon<=nguoi_lon_max AND $tre_em<=tre_em_max

    function room_insert($ten_phong,$gia_phong,$mo_ta,$anh_phong,$nguoi_lon_max,$tre_em_max,$trang_thai,$dien_tich,$id_loai){
        $sql="INSERT INTO phong(ten_phong,gia_phong,mo_ta,anh_phong,nguoi_lon_max,tre_em_max,trang_thai,dien_tich,id_loai) VALUES (?,?,?,?,?,?,?,?,?)";
        pdo_execute($sql,$ten_phong,$gia_phong,$mo_ta,$anh_phong,$nguoi_lon_max,$tre_em_max,$trang_thai,$dien_tich,$id_loai);
    }

    function room_update($id_phong,$ten_phong,$gia_phong,$mo_ta,$anh_phong,$nguoi_lon_max,$tre_em_max,$trang_thai,$dien_tich,$id_loai){
        if($anh_phong!=""){
            $sql="UPDATE phong SET ten_phong='".$ten_phong."', gia_phong='".$gia_phong."',mo_ta='".$mo_ta."', anh_phong='".$anh_phong."',nguoi_lon_max='".$nguoi_lon_max."', tre_em_max='".$tre_em_max."', trang_thai='".$trang_thai."'=1,dien_tich='".$dien_tich."', id_loai='".$id_loai."' WHERE id_phong=".$id_phong;
        }else {
            $sql="UPDATE phong SET ten_phong='".$ten_phong."', gia_phong='".$gia_phong."',mo_ta='".$mo_ta."',nguoi_lon_max='".$nguoi_lon_max."', tre_em_max='".$tre_em_max."', trang_thai='".$trang_thai."'=1,dien_tich='".$dien_tich."', id_loai='".$id_loai."' WHERE id_phong=".$id_phong;
        }
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



?>