<?php
require_once '../constants.php';
if(isset($_POST['submit'])){
    $user_id = intval(trim($_POST['user_id']));
    $user_fio = mysqli_real_escape_string($dbc, trim($_POST['user_fio']));
    $user_phone = mysqli_real_escape_string($dbc, trim($_POST['user_phone']));
    $user_trip = mysqli_real_escape_string($dbc, trim($_POST['user_trip']));
    if(!empty($user_fio) && !empty($user_phone) && !empty($user_trip) && !empty($user_id)) {
        $query ="INSERT INTO `user_info` (user_fio,user_phone, user_trip,user_id) 
                     VALUES ('$user_fio','$user_phone','$user_trip','$user_id')";
        mysqli_query($dbc,$query);
        $query = "SELECT `id` FROM `user_info` WHERE user_id = '$user_id'";
        $data = mysqli_query($dbc,$query);
        $row = mysqli_fetch_assoc($data);
        $user_id_of_info = $row['id'];
        $query = "UPDATE `users` SET user_id='$user_id_of_info' WHERE id=$user_id";
        mysqli_query($dbc,$query);
        $_SESSION['user_id'] = $user_id_of_info;
        $home_url = 'http://' . $_SERVER['HTTP_HOST'];
        header("Location: " . $home_url . '/personal_profile.php');
    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center>Извините,вы должны заполнить поля правильно</center> </span>';
    }
}
elseif(isset($_POST['edit'])) {
    $id = intval(trim($_POST['info_id']));
    $user_fio = mysqli_real_escape_string($dbc, trim($_POST['user_fio']));
    $user_phone = mysqli_real_escape_string($dbc, trim($_POST['user_phone']));
    $user_trip = mysqli_real_escape_string($dbc, trim($_POST['user_trip']));
    if(!empty($user_fio) && !empty($user_phone) && !empty($user_trip) && !empty($id)) {
        $query = "UPDATE `user_info` SET user_fio='$user_fio', user_phone='$user_phone', 
                  user_trip='$user_trip' WHERE id=$id";
        mysqli_query($dbc,$query);
        $home_url = 'http://' . $_SERVER['HTTP_HOST'];
        header("Location: " . $home_url . '/personal_profile.php');
    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center> Извините, вы должны заполнить поля правильно</center> </span>';
    }
}