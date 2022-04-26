<?php
    $id = $_GET['id'];
    if($id==1) {
        session_start();
        session_unset();
        session_destroy();
        header('location:./');
    }
    else{
        header('location:./home.php');
    }