<?php
    function feedback_insert($binh_luan,$thoi_diem,$id_phong,$id_nguoi){
        $sql="INSERT into phan_hoi(binh_luan,thoi_diem,id_phong,id_nguoi) values('$binh_luan','$thoi_diem','$id_phong','$id_nguoi')";
        pdo_execute($sql);
    }
    
    function feedback_delete($id_phan_hoi){
        $sql="DELETE from phan_hoi where id_phan_hoi=".$id_phan_hoi;
        pdo_execute($sql);
    }
    function feedback_select_by_room($id_phong){
        $sql = "SELECT b.*, p.ten_phong, n.ho_ten FROM phong p INNER JOIN  phan_hoi b ON p.id_phong=b.id_phong INNER JOIN nguoi_dung n ON b.id_nguoi = n.id_nguoi WHERE b.id_phong=? ORDER BY thoi_diem DESC";
        return pdo_query($sql, $id_phong);
    }
    function thong_ke_feedback(){
        $sql = "SELECT phong.id_phong, phong.ten_phong,"
                . " COUNT(*) count_fb,"
                . " MIN(phan_hoi.thoi_diem) cu_nhat,"
                . " MAX(phan_hoi.thoi_diem) moi_nhat"
                . " FROM phan_hoi phan_hoi "
                . " JOIN phong ON phong.id_phong=phan_hoi.id_phong "
                . " GROUP BY phong.id_phong, phong.ten_phong"
                . " HAVING count_fb > 0";
        return pdo_query($sql);
    }

    function feedback_count(){
        $sql="SELECT COUNT(*) as dem FROM phan_hoi";
        return pdo_query($sql);
    }
?>