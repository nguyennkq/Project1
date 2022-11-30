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
            <input type="text" id="myID" placeholder="Checkin" name="ngay_vao"  data-min-date=today>
        </div>
        <div class="checkout">
            <label for=""><i class="fa-solid fa-calendar-days"></i></label>
            <input type="text" id="myID" placeholder="Checkout" name="ngay_tra"  data-min-date=today>
        </div>
        <div class="adults">
            <label for="">Người lớn</label>
            <select name="nguoi_lon">
                <!-- <option value="0">0</option> -->
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

                    <a href="<?=$link_room?>">
                        <img src="<?= $img ?>" height="300px" alt="">
                    </a>
                    <div class="desc">
                        <div class="top-desc">
                            <h3><?= $ten_phong ?></h3>
                            <p><?= $gia_phong ?>/Ngày</p>
                        </div>
                        <p style="color: #F4694C;"><?= $dien_tich ?>m2</p>
                        <p class="main-desc">
                            <?=$mo_ta?>
                        </p>
                        <div class="buttom-desc">
                            <p><?=$nguoi_lon_max?> Người lớn | <?=$tre_em_max?> Trẻ em</p>
                            <a href="<?=$link_room?>">View room <i class="fa-solid fa-caret-right"></i></a>
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
                <i class="fa-solid fa-mug-saucer"></i>
                <h3>RESTAURANT</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit dicta quae natus quasi ratione quis id, tenetur atque blanditiis.</p>
            </div>
            <div class="item">
                <i class="fa-solid fa-leaf"></i>
                <h3>SPA</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit dicta quae natus quasi ratione quis id, tenetur atque blanditiis.</p>
            </div>
            <div class="item">
                <i class="fa-solid fa-users"></i>
                <h3>MEETING ROOMS</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit dicta quae natus quasi ratione quis id, tenetur atque blanditiis.</p>
            </div>
            <div class="item">
                <i class="fa-solid fa-wifi"></i>
                <h3>FREE WIFI</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit dicta quae natus quasi ratione quis id, tenetur atque blanditiis.</p>
            </div>
        </div>
    </div>
</div>