<div class="container">
    <div class="banner-contact">
        <img src="./img/banner_contact.jpg" alt="" />
        <p>CONTACT US</p>
    </div>
    <article class="contact-page">
        <h1>We’ll love to hear your feedback. Kindly send us a mail</h1>
        <form action="index.php?ctr=contact" method="POST">
            <div>
                <input class="form-control" type="email" name="email" placeholder="Your mail" required>
            </div><br>
            <div>
                <input class="form-control" type="text" name="dien_thoai" placeholder="Your phone" required>
            </div> <br>
            <div>
                <input class="form-control" type="text" name="dia_chi" placeholder="Your address" required>
            </div> <br>
            <textarea cols="100%" rows="10" placeholder="Type your message" name="noi_dung" required></textarea><br><br>
            <input type="submit" value="SEND MESSAGE" name="contact" class="button">
            <!-- <button type="submit" name="contact">SEND MESSAGE</button> -->
        </form>
    </article>
    <div class="contact-our">
        <div>
            <i class="fa-solid fa-phone"></i>
            <p><a href="tel:+0932476977">0932476977</a></p>
        </div>
        <div>
            <i class="fa-solid fa-envelope"></i>
            <p><a href="mailto: nguyenthega2k2@gmail.com" target="_blank">nguyenthega2k2@gmail.com</a></p>
        </div>
        <div>
            <i class="fa-solid fa-location-dot"></i>
            <p>Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
        </div>
    </div>
</div>