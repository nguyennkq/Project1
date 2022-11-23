<div class="container">
  <div class="banner-gallery">
    <img src="./img/banner_service.jpg" alt="" />
    <p>ALBUM</p>
  </div>
  <div class="box-gallery-page">
    <?php foreach ($list_gallery as $gallery){
      extract($gallery);
      $list_gallery = "index.php?ctr=gallery&id_thu_vien=" . $id_thu_vien;
      $img= $img_path . $anh_thu_vien;
      echo'<section class="gallery-item">
      <img src="'.$img.'" alt="" />';   
    }  
    ?>
      
  </div>
</div>
