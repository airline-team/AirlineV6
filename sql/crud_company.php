<?php
require_once '../constants.php';
if(isset($_POST['submit'])) {
    require_once '../function/duplicate_company.php';

    if(!empty($company_name) && !empty($company_email) && !empty($company_phone) && !empty($company_age) && !empty($company_info)) {

        $query = "SELECT * FROM `company` WHERE company_name = '$company_name'";
        $data = mysqli_query($dbc, $query);

        if(mysqli_num_rows($data) == 0) {
            $query ="INSERT INTO `company` (company_name, company_email,company_phone,company_age,company_info) 
                     VALUES ('$company_name','$company_email','$company_phone','$company_age','$company_info')";
            mysqli_query($dbc,$query);
            $home_url = 'http://' . $_SERVER['HTTP_HOST'];
            header("Location: " . $home_url . '/list_company.php');
        }
        else {
            echo '<span style="color: red; font-size: 30px;"><center>Данная компания уже соданна</center> </span>';
        }
    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center> Извините вы должны заполнить поля правильно</center> </span>';
    }
}
elseif (isset($_POST['edit'])){
    $company_id = intval(trim($_POST['company_id']));
    require_once '../function/duplicate_company.php';

    if(!empty($company_name) && !empty($company_email) && !empty($company_phone) && !empty($company_age) && !empty($company_info) && !empty($company_id)) {
        $query = "UPDATE `company` SET company_name='$company_name',company_email='$company_email',
                  company_phone='$company_phone',company_age='$company_age',company_info='$company_info'  WHERE company_id=$company_id";
        mysqli_query($dbc, $query);
        $home_url = 'http://' . $_SERVER['HTTP_HOST'];
        header("Location: " . $home_url . '/list_company.php');
    }
    else {
        echo '<span style="color: red; font-size: 30px;"><center> Извините вы должны заполнить поля правильно</center> </span>';
    }
}
elseif (isset($_POST['delete'])){
    $company_id = intval(trim($_POST['delete']));
    $query = "SELECT * FROM `company_service` WHERE company_id = '$company_id'";
    $data = mysqli_query($dbc, $query);

    if(mysqli_num_rows($data) == 0) {
        $query ="DELETE FROM `company` WHERE company_id=$company_id";
        mysqli_query($dbc, $query);
        $home_url = 'http://' . $_SERVER['HTTP_HOST'];
        header("Location: " . $home_url . '/list_company.php');
    }else {
        echo '<span style="color: red; font-size: 30px;"><center>Компания не может быть удалена,так как в ней остались услуги</center> </span>';
    }
}
else{
    echo '<span style="color: red; font-size: 30px;"><center>GET..</center> </span>';
}
