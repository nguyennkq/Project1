<?php
        // Lấy ra tất cả giá trị ở bảng đặt phòng
        function booking(){
            $sql="SELECT * FROM dat_phong";
            return pdo_query($sql);
        }

        // lấy ra tất cả ở bảng chi tiết theo id đặt 
        // function bookingdetail_selectall($id_dat){
        //     $sql="SELECT * FROM chi_tiet where id_dat=".$id_dat;
        //     return pdo_query($sql);
        // }

        // lấy ra tất cả ở bảng đặt phòng theo id đặt
        function booking_selectall($id_dat){
            $sql="SELECT * FROM dat_phong where id=".$id_dat;
            return pdo_query($sql);
        }
// Lấy ra tất cả các phòng mà một người đã đặt
        function bookingdetail_selectall_by_user($id_ng){
            $sql="SELECT c.*, d.tong_tien,d.ngay_dat, n.ho_ten FROM nguoi_dung n INNER JOIN  dat_phong d ON d.id_nguoi=n.id_nguoi INNER JOIN chi_tiet c ON c.id_dat = d.id WHERE n.id_nguoi=?";
            return pdo_query($sql,$id_ng);
        }

        function bookingdetail_selectall($id_dat){
            $sql="SELECT d.*, c.*,p.* FROM dat_phong d INNER JOIN chi_tiet c ON d.id=c.id_dat INNER JOIN phong p ON c.id_phong = p.id_phong WHERE d.id=?";
            return pdo_query($sql,$id_dat);
        }



// Chèn vào bảng đặt phòng
    function booking_insert($ngay_dat,$tong_tien,$thanh_toan,$ho_ten,$email,$dien_thoai,$id_nguoi){
        $conn=pdo_get_connection();
        $sql="INSERT INTO dat_phong(ngay_dat,tong_tien,thanh_toan,ho_ten,email,dien_thoai,id_nguoi) VALUES ('".$ngay_dat."','".$tong_tien."','".$thanh_toan."','".$ho_ten."','".$email."','".$dien_thoai."','".$id_nguoi."')";
        $conn->exec($sql);
        $last_id=$conn->lastInsertId();
        return $last_id;
    }

    
    // Chèn vào bảng đặt phòng khi chưa đăng nhập
    function booking_insert_user_null($ngay_dat,$tong_tien,$thanh_toan,$ho_ten,$email,$dien_thoai){
        $conn=pdo_get_connection();
        $sql="INSERT INTO dat_phong(ngay_dat,tong_tien,thanh_toan,ho_ten,email,dien_thoai) VALUES ('".$ngay_dat."','".$tong_tien."','".$thanh_toan."','".$ho_ten."','".$email."','".$dien_thoai."'";
        $conn->exec($sql);
        $last_id=$conn->lastInsertId();
        return $last_id;
    }


    // Chèn vào bảng chi tiết
    function bookingdetail_insert($ngay_vao,$ngay_tra,$nguoi_lon,$tre_em,$so_luong,$gia_phong,$thanh_tien,$ten_phong,$anh_phong,$id_dat,$id_phong){
        $sql="INSERT INTO chi_tiet(ngay_vao,ngay_tra,nguoi_lon,tre_em,so_luong,don_gia,thanh_tien,ten_phong,anh_phong,id_dat,id_phong) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        pdo_execute($sql,$ngay_vao,$ngay_tra,$nguoi_lon,$tre_em,$so_luong,$gia_phong,$thanh_tien,$ten_phong,$anh_phong,$id_dat,$id_phong);
    }

    
// Đếm số lượng đặt phòng
    function booking_count(){
        $sql="SELECT COUNT(*) as dem FROM dat_phong";
        return pdo_query($sql);
    }

//   Xóa chi tiết theo id chi tiết
    function bookingdetail_delete($id_chi_tiet){
        $sql="DELETE FROM chi_tiet WHERE id_chi_tiet=".$id_chi_tiet;
        pdo_execute($sql);
    }
//  Xóa đặt phòng theo id đặt
    function booking_delete($id_dat){
        $sql="DELETE FROM dat_phong WHERE id=".$id_dat;
        pdo_execute($sql);
    }


?>