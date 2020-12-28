<?php
session_start();
if(!empty($_SESSION['username'])){
    $home_url = 'http://' . $_SERVER['HTTP_HOST'];
    header("Location: " . $home_url . '/error.php');
}