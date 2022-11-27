<?php
    function stastis_selectall(){
        $sql="SELECT loai_phong.id_loai as maloai, loai_phong.ten_loai as tenloai, count(phong.id_phong) as countphong, min(phong.gia_phong) as min_gia_phong, max(phong.gia_phong) as max_gia_phong, avg(phong.gia_phong) as avg_gia_phong";
        $sql.=" from phong LEFT JOIN loai_phong on loai_phong.id_loai=phong.id_loai";
        $sql.=" group by loai_phong.id_loai order by loai_phong.id_loai desc";
        $list_stastis=pdo_query($sql);
        return $list_stastis;
    }


    function thongke_selectall_nguoi(){
        $sql="SELECT nguoi_dung.id_nguoi as manguoi, nguoi_dung.ten as ten, count(phan_hoi.id_phan_hoi) as countphan_hoi";
        $sql.=" from nguoi_dung left join phan_hoi on nguoi_dung.id_nguoi=phan_hoi.id_nguoi";
        $sql.=" group by nguoi_dung.id_nguoi order by nguoi_dung.id_nguoi desc";
        $listthongkenguoidung=pdo_query($sql);
        return  $listthongkenguoidung;
    }
    function thongke_selectall_datphong(){
        $sql="SELECT phong.id_phong as maphong, phong.ten_phong as tenphong, count(chi_tiet.id_dat) as countnguoidat, sum(chi_tiet.thanh_tien) as sumtien";
        $sql.=" from phong left join chi_tiet on phong.id_phong=chi_tiet.id_phong";
        $sql.=" group by phong.id_phong order by phong.id_phong desc";
        $listthongkedatphong=pdo_query($sql);
        return  $listthongkedatphong;
    }


?>