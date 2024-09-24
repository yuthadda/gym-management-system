<?php

    session_start();

    if(isset($_SESSION['username']))
    {
        header('location:view/index.php');
    }
    else
    {
        header('location:login.php');
    }


?>