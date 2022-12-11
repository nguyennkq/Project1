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
                    <img id="mainImage" src="' . $img_room . '" alt="">
                </div>
            </div>
        ';
        ?>
        <br />

        <div id="divId" onclick="changeImageOnClick(event)">
            <?php
            foreach ($load_gallery_room as $gallery) {
                extract($gallery);
                $img_gallery = $img_path . $anh_thu_vien;
                echo
                '
                <img class="imgStyle" src="' . $img_gallery . '" />
                ';
            }
            ?>
            <?php
            echo '<img class="imgStyle" src="' . $img_room . '" />';
            ?>
        </div>

        <div class="room-detail">
            <div class="description">
                <h1>Mô tả chi tiết phòng</h1>
                <p><?= $mo_ta ?></p>
                <div class="facilities">
                    <h3>Tiện ích</h3>
                    <div class="box-facilities">
                        <p>
                            <img src="./img/ic_bedroom.png" alt="">
                            1 phòng ngủ
                        </p>
                        <p>
                            <img src="./img/ic_livingroom.png" alt="">
                            1 phòng khách
                        </p>
                        <p>
                            <img src="./img/ic_bathroom.png" alt="">
                            1 phòng tắm
                        </p>
                        <p>
                            <img src="./img/ic_diningroom 1.png" alt="">
                            1 phòng ăn
                        </p>
                        <p>
                            <img src="./img/ic_wifi 1.png" alt="">
                            10 mbp/s
                        </p>
                        <p>
                            <img src="./img/ic_kulkas.png" alt="">
                            2 tủ lạnh
                        </p>
                        <p>
                            <img src="./img/ic_tv.png" alt="">
                            1 tivi
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="box-service">
            <h3>Dịch vụ</h3>
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
        <div class="hotel-rules">
            <h3>Nội quy chung</h3>
            <ul>
                <li>-Không hút thuốc, tiệc tùng, hoặc sự kiện</li>
                <li>-Giờ nhận phòng từ 8:00</li>
                <li>-Không nuôi động vật</li>
            </ul>
        </div>
        <div class="room-same">
            <h3>Phòng cùng loại</h1>
                <div class="item-room-same">
                    <?php
                    foreach ($room_same_type as $room_same) {
                        extract($room_same);
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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            //  jQuery là thư viện được viết từ JavaScript
            $(document).ready(function() {
                // là một sự kiện được kích hoạt khi tài liệu html được load và cây DOM được tạo thành 
                $("#feedback").load("view/form-feedback.php", {
                    id_phong: <?= $id_phong ?>
                });
                // Load form bình luận dựa theo id phòng
            });

            // Gallery phòng
            var images = document.getElementsByTagName("img");

            for (var i = 0; i < images.length; i++) {
                images[i].onmouseover = function() {
                    this.style.cursor = "hand";
                    this.style.borderColor = "red";
                };
                images[i].onmouseout = function() {
                    this.style.cursor = "pointer";
                    this.style.borderColor = "grey";
                };
            }

            function changeImageOnClick(event) {
                // debugger;
                var targetElement = event.srcElement;
                // debugger;
                if (targetElement.tagName === "IMG") {
                    mainImage.src = targetElement.getAttribute("src");
                }
            }
        </script>

        <h3 style="margin-top: 12px;">Phản hồi</h3>
        <div class="comment" id="feedback">

        </div>
    </div>
</main>