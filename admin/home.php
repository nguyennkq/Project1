<div class="box-dashboard">

    <?php
    foreach ($room_count as $room) {
        extract($room);
        echo '
        <section class="service-item">
        <i class="fa-solid fa-bed"></i>
        <h1>' . $dem . '</h1>
        <p>TOTAL ROOMS</p>
    </section>

        ';
    }
    ?>

    <?php
    foreach ($roomtype_count as $roomtype) {
        extract($roomtype);
        echo '
        <section class="service-item">
        <i class="fa-solid fa-bookmark"></i>
        <h1>' . $dem . '</h1>
        <p>RESERVATIONS</p>
    </section>
        ';
    }
    ?>


    <?php
    foreach ($user_count as $user) {
        extract($user);
        echo '
        <section class="service-item">
        <i class="fa-solid fa-users"></i>
        <h1>' . $dem . '</h1>
        <p>STAFFS</p>
    </section>
        ';
    }
    ?>

    <?php
    foreach ($feedback_count as $feedback) {
        extract($feedback);
        echo '
        <section class="service-item">
        <i class="fa-solid fa-comments"></i>
        <h1>' . $dem . '</h1>
        <p>COMPLAINTS</p>
        </section>
        ';
    }
    ?>

</div>
<div class="box-dashboard">
    <?php
    foreach ($booking_count as $booking) {
        extract($booking);
        echo '
        <section class="service-item">
        <i class="fa-solid fa-bars"></i>
        <h1>' . $dem . '</h1>
        <p>BOOKED ROOMS</p>
        </section>
        ';
    }
    ?>

    <section class="service-item">
        <i class="fa-solid fa-circle-check"></i>
        <h1>21</h1>
        <p>AVAILABLE ROOMS</p>
    </section>
    <section class="service-item">
        <i class="fa-solid fa-square-check"></i>
        <h1>21</h1>
        <p>CHECKED IN</p>
    </section>
    <section class="service-item">
        <i class="fa-solid fa-spinner"></i>
        <h1>21</h1>
        <p>TOTAL PENDING PAYMENTS</p>
    </section>
</div>