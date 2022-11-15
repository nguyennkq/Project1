<?php
    include "sidebar.php";
    include "header.php";

    if(isset($_GET['ctr']) && ($_GET['ctr'] !='')){
        $ctr= $_GET['ctr'];
        switch($ctr){
            case 'add-roomtype':
                include "roomtype/add-roomtype.php";
                break;
            case 'list-roomtype':
                include "roomtype/list-roomtype.php";
                break;
            default:
                include "home.php";
                break;
        }
    }else {
        include "home.php";
    }
?>
</div>
</div>
