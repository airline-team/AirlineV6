<?php
require_once '../constants.php';
if(isset($_POST['create'])){
    if (!$_POST["g-recaptcha-response"]) {
        exit("Произошла ошибка,воможно,вы не заполнили капчу !");
    } else {
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $key = "";
        $query = array(
            "secret" => $key,
            "response" => $_POST["g-recaptcha-response"],
            "remoteip" => $_SERVER['REMOTE_ADDR']
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        $data = json_decode(curl_exec($ch), $assoc = true);
        curl_close($ch);
        if (!$data['success']) {
            exit("Давно не виделись,ИИ...");
        }
    }
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $repeat_password = mysqli_real_escape_string($dbc, trim($_POST['repeat_password']));
    if(!empty($username) && !empty($password) && !empty($repeat_password) && ($password == $repeat_password)) {
        $query = "SELECT * FROM `users` WHERE username = '$username'";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data) == 0) {
            $query ="INSERT INTO `users` (username, password) VALUES ('$username', SHA('$password'))";
            mysqli_query($dbc,$query);
            $_SESSION["user_id"] = 0;
            $_SESSION["username"] = $username;
            $home_url = 'http://' . $_SERVER['HTTP_HOST'];
            header("Location: " . $home_url . '/personal_profile.php');
        }
        else {
            echo '<span style="color: red; font-size: 30px;"><center>Извините, данный логин занят</center> </span>';
        }

    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center>Извините,вы должны заполнить поля правильно</center> </span>';
    }
}
elseif(isset($_POST['login'])) {
    $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    if(!empty($user_username) && !empty($user_password)) {
        $query = "SELECT `user_id` , `username` FROM `users` WHERE username = '$user_username' AND password = SHA('$user_password')";
        $data = mysqli_query($dbc,$query);
        if(mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_assoc($data);
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["username"] = $row['username'];
            $home_url = 'http://' . $_SERVER['HTTP_HOST'];
            header("Location: " . $home_url . '/personal_profile.php');
        }
        else {
            echo '<span style="color: red; font-size: 30px;"><center>Извините, вы должны ввести правильные имя пользователя и пароль!</center> </span>';
        }
    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center> Извините, вы должны заполнить поля правильно</center> </span>';
    }
}