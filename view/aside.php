<aside class="sidenav">
    <form action="index.php?ctr=add-booking" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="id_phong" value="<?= $id_phong ?>">
        <input type="hidden" name="ten_phong" value="<?= $ten_phong ?>">
        <input type="hidden" name="anh_phong" value="<?= $img_room ?>">
        <input type="hidden" name="gia_phong" value="<?= $gia_phong ?>">
        <div class="form-group-check">
            Check in
            <input type="text" placeholder="Checkin" name="ngay_vao" data-min-date=today id="check_in_date">
        </div>
        <div class="form-group-check">
            Check out
            <input type="text" placeholder="Checkout" name="ngay_tra" data-min-date=today id="check_out_date">
        </div>
        <div class="form-group">
            Người lớn
            <select name="nguoi_lon" id="nguoi_lon" required>
                <option value="">None</option>
                <?php
                $i;
                for ($i = 1; $i <= $nguoi_lon_max; $i++) {
                ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php

                } ?>
            </select>
        </div>
        <div class="form-group">
            Trẻ em
            <select name="tre_em" id="tre_em">
                <?php
                $i;
                for ($i = 0; $i <= $tre_em_max; $i++) {
                ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php

                } ?>
            </select>
        </div>
        <?php
        if (isset($_SESSION['booking']) && $_SESSION['booking'] > 0) {
            extract($_SESSION['booking']);
            if($_SESSION['booking'] || $trang_thai == 0){
                echo '<p style="color:red">Vui lòng chọn phòng khác</p>';
            }else {
                echo '<input type="submit" name="add-booking" value="Continue to book">';
            }
        }
        ?>

    </form>
</aside>