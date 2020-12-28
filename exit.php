<?php
session_start();
session_unset();
session_destroy();
$home_url = 'http://' . $_SERVER['HTTP_HOST'];
header('Location: ' . $home_url);
