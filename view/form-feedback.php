<?php
session_start();
include "../model/pdo.php";
include "../model/feedback.php";

$id_phong = $_REQUEST['id_phong'];
$list_feedback = feedback_select_by_room($id_phong);
?>

<div>
    <?php
    foreach ($list_feedback as $feedback) {
        extract($feedback);
        echo
        '
            <div class="info-feedback">
                <div class="top-feedback">
                    <h3> ' . $ho_ten . '</h3>
                    <p>' . $thoi_diem . '</p>
                </div>
                <div class="desc">
                    ' . $binh_luan . '
                </div>
            </div>
            ';
    }
    ?>
</div>


<?php
if (isset($_SESSION['user']['id_nguoi'])) {
    $id_nguoi = $_SESSION['user']['id_nguoi'];
?>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id_phong" value="<?php echo $id_phong ?>">
        <input type="hidden" name="id_nguoi" value="<?php echo $id_nguoi ?>">
        <div class="rating">
            <!-- <h3>Rating</h3> -->
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
        </div>
        <div class="item-comment">
            <img src="./img/avatar.jpg" alt="" width="50px" height="50px">
            <input type="text" name="binh_luan" placeholder="Nhập bình luận của bạn ở đây..." required>
        </div>
        <br>
        <input type="submit" name="send" value="Gửi phản hồi">
    </form>
<?php

} else {
    echo '<div class="message">Bạn phải đăng nhập để bình luận</div>';;
}
?>

<?php
if (isset($_POST['send']) && ($_POST['send'])) {
    $binh_luan = $_POST['binh_luan'];
    $id_phong = $_POST['id_phong'];
    $id_nguoi = $_POST['id_nguoi'];
    $thoi_diem = date('Y/m/d');
    feedback_insert($binh_luan, $thoi_diem, $id_phong, $id_nguoi);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>