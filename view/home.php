<div class="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="./img/banner.png" alt="" />
            <div class="text">
                <h5>Welcome to</h5>
                <h1>2HAN</h1>
                <p>Chúng tôi rất vinh dự khi được phục vụ quý khách</p>
                <a href="loaiphong.html"><button>Đặt phòng</button></a>
            </div>
        </div>
        <div class="swiper-slide">
            <img src="./img/banner_contact.jpg" alt="" />
            <div class="text">
                <h5>Welcome to</h5>
                <h1>2HAN</h1>
                <p>Chúng tôi rất vinh dự khi được phục vụ quý khách</p>
            </div>
        </div>
        <div class="swiper-slide">
            <img src="./img/banner_service.jpg" alt="" />
            <div class="text">
                <h5>Welcome to</h5>
                <h1>2HAN</h1>
                <p>Chúng tôi rất vinh dự khi được phục vụ quý khách</p>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-scrollbar"></div>
</div>

<div class="content1">
    <form action="index.php?ctr=room-search" method="POST">
        <div class="checkin">
            <label for=""><i class="fa-solid fa-calendar-days"></i></label>
            <input type="text" id="check_in_date" placeholder="Checkin" name="ngay_vao" data-min-date=today>
        </div>
        <div class="checkout">
            <label for=""><i class="fa-solid fa-calendar-days"></i></label>
            <input type="text" id="check_out_date" placeholder="Checkout" name="ngay_tra" data-min-date=today>
        </div>
        <div class="adults">
            <label for="">Người lớn</label>
            <select name="nguoi_lon">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <div class="children">
            <label for="">Trẻ em</label>
            <select name="tre_em">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <input type="submit" name="search" value="Check">
    </form>


    <div class="most-rooms">
        <h1>Phòng được quan tâm nhiều</h1>
        <div class="box-rooms">
            <?php
            foreach ($top3 as $room) {
                extract($room);
                $link_room = "index.php?ctr=roomdetail&id_phong=" . $id_phong;
                $img = $img_path . $anh_phong;
            ?>
                <div class="item-rooms">

                    <a href="<?= $link_room ?>">
                        <img src="<?= $img ?>" height="300px" alt="">
                    </a>
                    <div class="desc">
                        <div class="top-desc">
                            <h3><?= $ten_phong ?></h3>
                            <p><?= $gia_phong ?>/Ngày</p>
                        </div>
                        <p style="color: #F4694C;"><?= $dien_tich ?>m2</p>
                        <p class="main-desc">
                            <?= $mo_ta ?>
                        </p>
                        <div class="buttom-desc">
                            <p><?= $nguoi_lon_max ?> Người lớn | <?= $tre_em_max ?> Trẻ em</p>
                            <a href="<?= $link_room ?>">View room <i class="fa-solid fa-caret-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="block">
        <h1>Dịch vụ của chúng tôi</h1>
        <div class="about-service">
            <div class="item">
                <i class="fas fa-user-shield"></i>
                <h3>AN TOÀN</h3>
                <p>An ninh được đảm bảo an toàn cho quý khách.</p>
            </div>
            <div class="item">
                <i class="fas fa-coffee"></i>
                <h3>CÀ PHÊ</h3>
                <p>Cà phê được phục vụ cho mỗi sớm mai thức dậy.</p>
            </div>
            <div class="item">
                <i class="fa-solid fa-bell"></i>
                <h3>BÁO THỨC</h3>
                <p>Dịch vụ báo thức mỗi buổi sáng, đúng giờ.</p>
            </div>
            <div class="item">
                <i class="fa-solid fa-wifi"></i>
                <h3>WIFI</h3>
                <p>Tốc độ mạng chất lượng, đường truyền ổn định.</p>
            </div>
        </div>
    </div>
    <div class="feedback-our-about">
        <div class="box-items">
            <div class="items">
                <img src="./img/user.png" alt="" width="50px" height="50px">
                <div>
                    <h3>"Tuyệt vời"</h3>
                    <p class="desc">Điều rất quan trọng là khách hàng phải nhận thức được nhu cầu của khách hàng.</p>
                    <p>Khánh Nguyên</p>
                </div>
            </div>
            <div class="items">
                <img src="./img/user.png" alt="" width="50px" height="50px">
                <div>
                    <h3>"Thanh toán nhanh chóng"</h3>
                    <p class="desc">Sử dụng dịch vụ thanh toán tại khách sạn rất tốt, tuyệt vời, nhiều ưu đãi.</p>
                    <p>Ngọc Ánh</p>
                </div>
            </div>
            <div class="items">
                <img src="./img/user.png" alt="" width="50px" height="50px">
                <div>
                    <h3>"Dịch vụ tuyệt vời"</h3>
                    <p class="desc">Khách sạn có nhiều vụ hướng tới nhu cầu sử dụng của khách hàng.</p>
                    <p>Khánh An</p>
                </div>
            </div>
        </div>
    </div>
</div>