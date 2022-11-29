<div class="box-right">
    <header>
        <h3>Admin</h3>
        <div class="right">
            <div class="icon">
                <p><i class="fa-solid fa-magnifying-glass"></i></p>
                <p><i class="fa-solid fa-bell"></i></p>
            </div>
            |
            <div class="account">
                <?php
                    if(isset($_SESSION['user'])){
                        extract($_SESSION['user']);
                        if($vai_tro==0){
                            echo
                            '
                            <p >Admin: <span style="color: #F4694C;">'.$ho_ten.'</span></p>
                            <a class="logout" href="index.php?ctr=logout"><i class="fa-solid fa-right-to-bracket"></i></a>
                            ';
                        }
                    
                ?>
                <?php
                    }else {
                        echo 
                        '
                        <p>Admin</p>
                        ';
                    }
                ?>
                <!-- <img src="../img/avatar.jpg" alt="" width="40px" height="40px"> -->
            </div>
        </div>
    </header>