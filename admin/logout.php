<?php
    session_start();

    	include 'conn.php';

    	session_destroy();
    	unset($_SESSION['userSession']);
    	header('location:../index.php');

    ?>