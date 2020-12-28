<?php
require_once '../constants.php';
define("UPLOAD_DIR","../images/");

if(isset($_POST['submit'])) {
    require_once '../function/upload_picture.php';

    if(!empty($company_id) && !empty($service_name) && !empty($service_info)) {
        $query = "SELECT * FROM `company_service` WHERE service_name = '$service_name' AND company_id = '$company_id'";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data) == 0) {
            $query ="INSERT INTO `company_service` (company_id,service_name, service_info,service_picture) 
                     VALUES ('$company_id','$service_name','$service_info','$service_picture_name')";
            mysqli_query($dbc,$query);
            $home_url = 'http://' . $_SERVER['HTTP_HOST'];
            header("Location: " . $home_url . '/list_company.php');
        }
        else {
            echo '<span style="color: red; font-size: 30px;"><center>Данный сервис уже содан</center> </span>';
        }
    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center> Извините вы должны заполнить поля правильно</center> </span>';
    }
}
elseif (isset($_POST['edit'])){
    require_once '../function/upload_picture.php';
    $service_id = intval(trim($_POST['service_id']));
    $old_picture = mysqli_real_escape_string($dbc, trim($_POST['old_picture']));

    if(!empty($company_id) && !empty($service_id) && !empty($service_name) && !empty($service_info)) {
        $query = "UPDATE `company_service` SET service_name='$service_name',service_info='$service_info',
                  service_picture='$service_picture_name',company_id='$company_id' WHERE service_id=$service_id";
        mysqli_query($dbc, $query);
        unlink(UPLOAD_DIR . $old_picture);
        $home_url = 'http://' . $_SERVER['HTTP_HOST'];
        header("Location: " . $home_url . '/list_company.php');
    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center> Извините вы должны заполнить поля правильно</center> </span>';
    }
}
elseif (isset($_POST['delete'])){
    $service_id = intval(trim($_POST['delete']));
    $sql = "SELECT * FROM `company_service` WHERE `service_id` = $service_id";
    $result = $dbc -> query($sql);
    $result = mysqli_fetch_array($result);
    $service_picture = $result['service_picture'];
    $query ="DELETE FROM `company_service` WHERE service_id=$service_id";
    mysqli_query($dbc, $query);
    unlink(UPLOAD_DIR . $service_picture);
    $home_url = 'http://' . $_SERVER['HTTP_HOST'];
    header("Location: " . $home_url . '/list_company.php');
}
else{
    echo '<span style="color: red; font-size: 30px;"><center>GET..</center> </span>';
}