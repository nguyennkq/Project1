<div class="container">
  <div class="banner-service">
    <img src="./img/banner_service.jpg" alt="" />
    <p>DỊCH VỤ</p>
  </div>
    <div class="box-service-page">
      <?php
      foreach ($list_service as $service) {
        extract($service);
        $link = $img_path . $hinh_anh;
        echo
        '
          <section class="service-item">
            <img src="' . $link . '" alt="" />
            <h1>' . $ten_dich_vu . '</h1>
          </section>
          ';
      }

      ?>
  </div>
</div>