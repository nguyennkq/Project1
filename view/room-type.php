<main>
    <?php
    include "view/search.php";
    ?>
    <!-- chia layout -->
    <div class="box-right-content">
        <div class="banner-room-type">
            <img src="./img/banner.png" alt="">
            <p>Loại phòng</p>
        </div>
        <div class="content">
            <div class="room">
                <?php foreach ($list_roomtype as $roomtype) {
                    extract($roomtype);
                    $link_roomtype = "index.php?ctr=room&id_loai=" . $id_loai;
                    $img = $img_path . $anh_loai;
                    echo
                    '
            <div class="rct1">
            <img src="' . $img . '" alt="">
            <h3>' . $ten_loai . '</h3>
           
            <div class="price">
                <a href="' . $link_roomtype . '"><button>Danh sách phòng</button></a>
            </div>
        </div>';
                }
                ?>
            </div>
        </div>
    </div>

</main>

<!-- <div class="list">
    <li>1 phòng tắm</li>
    <li>2 giường</li>
    <li>2-3 người</li>
</div> -->

<!-- <p>2,000,000 per night</p> -->
