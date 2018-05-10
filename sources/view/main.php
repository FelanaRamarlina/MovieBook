<?php

    require('./view/header.php');

    if(isset($page)){
        require("./view/".$page.".php");
    }

    require('./view/footer.php');
?>






