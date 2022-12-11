<?php
foreach ($list_setting as $setting) {
    extract($setting);
?>


    <footer class="footer">
        <div class="box-footer">
            <div>
                <h3>2HAN</h3>
                <p>Công ty khởi nghiệp đầu tiên về khách sạn tại khu vực Nam Từ Liêm, mang đến cho quý khách những trải nghiệm tuyệt vời tại khách sạn.</p>
            </div>
            <div>
                <p><a href="">VỀ CHÚNG TÔI</a></p>
                <p><a href="index.php?ctr=contact">LIÊN HỆ</a></p>
                <p><a href="index.php?ctr=roomtype">PHÒNG</a></p>
                <p><a href="index.php?ctr=service">DỊCH VỤ</a></p>
                <p><a href="">ƯU ĐÃI</a></p>
            </div>
            <div>
                <p>Address : <?= $dia_chi ?></p>
                <p>Phone number : +<?= $dien_thoai ?></p>
                <p>Email: <?= $email ?></p>
            </div>
        </div>
        <div class="social">
            <p><i class="fa-brands fa-youtube"></i></p>
            <p><i class="fa-brands fa-facebook"></i></p>
            <p><i class="fa-brands fa-twitter"></i></p>
        </div>
    </footer>
<?php
}
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="./src/js/jquery.min.js"></script>
<script src="./src/js/getdate.js"></script>
<script src="./src/js/slide.js"></script>
<script>
    document.getElementById('nguoi_lon').value = "<?php if (isset($nguoi_lon)) echo $nguoi_lon ?>";
    document.getElementById('tre_em').value = "<?php if (isset($tre_em)) echo $tre_em ?>";
</script>

</body>

</html>