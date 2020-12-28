<?php
session_start();
$host = 'localhost';
$username_db = 'root';
$password_db = '';
$db_name = 'airline';
$dbc = mysqli_connect($host, $username_db, $password_db, $db_name);
