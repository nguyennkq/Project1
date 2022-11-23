<div class="container">
  <div class="banner-service">
    <img src="./img/banner_service.jpg" alt="" />
    <p>SERVICE</p>
  </div>
  <div class="box-service-page">
    <?php foreach ($list_service as $service){
      extract($service);
      $list_service = "index.php?ctr=service&id_dich_vu=" . $id_dich_vu;
      $img= $img_path . $hinh_anh;
      echo'<section class="service-item">
      <img src="'.$img.'" alt="" />
      <h1>'.$ten_dich_vu.'</h1></section>';   
    }  
    ?>
  </div>
</div>

