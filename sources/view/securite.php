<?php
    if(isset($_SESSION['user'])){
        $action = "fiches";
    }else{
        $page = "login";
    }