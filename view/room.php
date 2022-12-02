<main>
    <?php
    include "view/search.php";
    ?>
    <div class="box-right-content">
        <div class="banner-room-type">
            <img src="img/banner.png" alt="">
            <p><?php echo $ten_loai ?></p>
        </div>
        <div class="content">
            <div class="room">
                <?php
                foreach ($list_room as $room) {
                    extract($room);
                    $img_phong = $img_path . $anh_phong;
                    $link_phong = "index.php?ctr=roomdetail&id_phong=" . $id_phong;
                    // echo
                    // '
                ?>
                    <div class="box-item-room">
                        <a href="<?= $link_phong ?>">
                            <img src="<?= $img_phong ?>" alt="">
                        </a>
                        <div class="desc">
                            <div class="top-desc">
                                <h3><?= $ten_phong ?></h3>
                                <p><?= $gia_phong ?> VNĐ/Ngày</p>
                            </div>
                            <p style="color: #F4694C;"><?= $dien_tich ?>m2</p>
                            <p class="main-desc">
                                <?= $mo_ta ?>
                            </p>
                            <div class="buttom-desc">
                                <p><?= $nguoi_lon_max ?> Người lớn | <?= $tre_em_max ?> Trẻ em</p>
                                <a href="index.php?ctr=roomdetail&id_phong=<?= $id_phong ?>">View room <i class="fa-solid fa-caret-right"></i></a>
                            </div>
                            <button><?= $trang_thai == 1 ? 'Còn trống' : 'Đã đặt' ?></button>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</main>