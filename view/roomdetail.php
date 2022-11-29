<?php
extract($room_one);
$img_room = $img_path . $anh_phong;
?>
<main>
    <?php
        include "view/aside.php";
    ?>
    <div class="box-right-content">

        <?php
        extract($room_one);
        $img_room = $img_path . $anh_phong;
        echo
        '
            <div class="box-image">
                <div>
                    <img src="' . $img_room . '" alt="">
                </div>
            </div>
            
        ';
        ?>

        <div class="room-detail">
            <div class="description">
                <h1>Mô tả chi tiết phòng</h1>
                <p><?= $mo_ta ?></p>
                <div class="facilities">
                    <h3>Room facilities</h3>
                    <div class="box-facilities">
                        <p>
                            <img src="./img/ic_bedroom.png" alt="">
                            1 bedroom
                        </p>
                        <p>
                            <img src="./img/ic_livingroom.png" alt="">
                            1 living room
                        </p>
                        <p>
                            <img src="./img/ic_bathroom.png" alt="">
                            1 bathroom
                        </p>
                        <p>
                            <img src="./img/ic_diningroom 1.png" alt="">
                            1 dining room
                        </p>
                        <p>
                            <img src="./img/ic_wifi 1.png" alt="">
                            10 mbp/s
                        </p>
                        <p>
                            <img src="./img/ic_ac 1.png" alt="">
                            1 unit ready
                        </p>
                        <p>
                            <img src="./img/ic_kulkas.png" alt="">
                            2 refigrator
                        </p>
                        <p>
                            <img src="./img/ic_tv.png" alt="">
                            2 television
                        </p>
                    </div>
                </div>
            </div>
            <!-- <div class="booking">
                <form action="index.php?ctr=addcart" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_phong" value="<?= $id_phong ?>">
                    <input type="hidden" name="ten_phong" value="<?= $ten_phong ?>">
                    <input type="hidden" name="anh_phong" value="<?= $img_room ?>">
                    <input type="hidden" name="gia_phong" value="<?= $gia_phong ?>">
                    <div class="form-group">
                        Check in
                        <input type="date" name="ngay_vao">
                    </div>
                    <div class="form-group">
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
            </div> -->
        </div>
        <div class="box-service">
            <h3>Service</h3>
            <div class="service">
                <?php
                foreach ($load_service_room as $service_room) {
                    extract($service_room);
                    $img_service = $img_path . $hinh_anh;
                    echo
                    '
                    <div>
                        <img src="' . $img_service . '" alt="" width="300px" height="200px">
                        <h3>' . $ten_dich_vu . '</h3>
                    </div>
                        ';
                }
                ?>
            </div>
        </div>
        <div class="comment">
            <form action="" method="post">
                <div class="rating">
                    <h3>Rating</h3>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="item-comment">
                    <img src="./img/avatar.jpg" alt="" width="50px" height="50px">
                    <input type="text" placeholder="Nhập phản hồi của bạn ở đây...">
                </div>
                <br>
                <input type="submit" value="Gửi phản hồi">
            </form>
        </div>
    </div>
</main>