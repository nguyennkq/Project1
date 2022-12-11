<div class="container">
  <div class="banner-service">
    <img src="./img/banner_service.jpg" alt="" />
    <p>THƯ VIỆN ẢNH</p>
  </div>
    <div class="box-service-page">
      <?php
      foreach ($list_gallery as $gallery) {
        extract($gallery);
        $link = $img_path . $anh_thu_vien;
        echo
        '
          <section class="service-item">
            <img src="' . $link . '" alt="" />
          </section>
          ';
      }

      ?>
  </div>
</div>