<div class="banner-room-type">
    <img src="./img/banner.png" alt="">
    <p><?php echo $ten_loai?></p>
</div>
<div class="content">
        <div class="room">
<?php
foreach ($list_room as $room) {
    extract($room);
    $img_phong = $img_path . $anh_phong;
    $link_phong= "index.php?ctr=room-detail&id_phong=".$id_phong;
    echo
    '

            <div class="rct1">
                <img src="'.$img_phong.'" alt="">
                <div class="price">
                    <p>'.$ten_phong.'</p>
                    <a href="'.$link_phong.'"><button>Xem chi tiết</button></a>
                </div>
            </div>
        
        ';
}
?>
      </div>
    </div>