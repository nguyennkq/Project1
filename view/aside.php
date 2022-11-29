<aside class="sidenav">
    <form action="index.php?ctr=add-booking" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_phong" value="<?= $id_phong ?>">
        <input type="hidden" name="ten_phong" value="<?= $ten_phong ?>">
        <input type="hidden" name="anh_phong" value="<?= $img_room ?>">
        <input type="hidden" name="gia_phong" value="<?= $gia_phong ?>">
        <div class="form-group-check">
            Check in
            <input type="date" name="ngay_vao">
        </div>
        <div class="form-group-check">
            Check out
            <input type="date" name="ngay_tra">
        </div>
        <div class="form-group">
            Người lớn
            <select name="nguoi_lon" id="">
                <option value="" selected hidden>No of Adults</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="form-group">
            Trẻ em
            <select name="tre_em" id="">
                <option value="" selected hidden>No of Children</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>

        <input type="submit" name="addcart" value="Continue to book">
    </form>
</aside>