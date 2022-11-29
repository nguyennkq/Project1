<?php
    

    // Hiển thị thông tin chi tiết đặt phòng
        // function booking_detail($id_nguoi){
        //     $sql="SELECT nguoi_dung.*, dat_phong.*, chi_tiet.*, phong.* FROM nguoi_dung
        //         JOIN dat_phong ON nguoi_dung.id_nguoi=dat_phong.id_nguoi
        //         JOIN chi_tiet ON chi_tiet.id_dat=dat_phong.id_dat
        //         JOIN phong ON chi_tiet.id_phong=phong.id_phong WHERE dat_phong.id_nguoi=".$id_nguoi;
        //     return pdo_query($sql);
        // }

        function dat_phong(){
            $sql="SELECT * FROM dat_phong";
            return pdo_query($sql);
        }


        function bookingdetail_selectall($id_dat){
            $sql="SELECT * FROM chi_tiet where id_dat=".$id_dat;
            return pdo_query($sql);
        }

        function booking_selectall($id_dat){
            $sql="SELECT * FROM dat_phong where id=".$id_dat;
            return pdo_query($sql);
        }


    function booking_insert($ngay_dat,$tong_tien,$thanh_toan,$ho_ten,$email,$dien_thoai,$id_nguoi){
        $conn=pdo_get_connection();
        $sql="INSERT INTO dat_phong(ngay_dat,tong_tien,thanh_toan,ho_ten,email,dien_thoai,id_nguoi) VALUES ('".$ngay_dat."','".$tong_tien."','".$thanh_toan."','".$ho_ten."','".$email."','".$dien_thoai."','".$id_nguoi."')";
        $conn->exec($sql);
        $last_id=$conn->lastInsertId();
        return $last_id;
        // pdo_execute($sql,$ngay_dat,$tong_tien,$thanh_toan,$ho_ten,$email,$dien_thoai,$id_nguoi);
    }

    function bookingdetail_insert($ngay_vao,$ngay_tra,$nguoi_lon,$tre_em,$so_luong,$gia_phong,$thanh_tien,$ten_phong,$anh_phong,$id_dat,$id_phong){
        $sql="INSERT INTO chi_tiet(ngay_vao,ngay_tra,nguoi_lon,tre_em,so_luong,don_gia,thanh_tien,ten_phong,anh_phong,id_dat,id_phong) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        pdo_execute($sql,$ngay_vao,$ngay_tra,$nguoi_lon,$tre_em,$so_luong,$gia_phong,$thanh_tien,$ten_phong,$anh_phong,$id_dat,$id_phong);
    }

    
    // function booking_delete($id_dat){
    //     $sql = "DELETE FROM dat_phong WHERE id_dat=?";
    //     pdo_execute($sql,$id_dat);
    // }         

    function booking_count(){
        $sql="SELECT COUNT(*) as dem FROM dat_phong";
        return pdo_query($sql);
    }

    // function booking_getone($id_dat){
    //     $sql="SELECT * FROM dat_phong WHERE id_dat=?";
    //     return pdo_query_one($sql,$id_dat);
    // }


?>