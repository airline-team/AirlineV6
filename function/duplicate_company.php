<?php
$company_name = mysqli_real_escape_string($dbc, trim($_POST['company_name']));
$company_email = mysqli_real_escape_string($dbc, trim($_POST['company_email']));
$company_phone = mysqli_real_escape_string($dbc, trim($_POST['company_phone']));
$company_age = mysqli_real_escape_string($dbc, trim($_POST['company_age']));
$company_info = mysqli_real_escape_string($dbc, trim($_POST['company_info']));