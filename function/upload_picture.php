<?php
$service_picture_name = "";
if(!empty($_FILES["service_picture"])){
    $service_picture = $_FILES["service_picture"];

    if($service_picture["error"] !== UPLOAD_ERR_OK){
        echo "<p>Произошла ошибка.</p>";
        exit;
    }

    $fileType = exif_imagetype($service_picture["tmp_name"]);
    $allowed = array(IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG);

    if(!in_array($fileType,$allowed)){
        echo "<p>Тип файла не разрешен</p>";
        exit;
    }

    $name = preg_replace("/[^A-Z0-9._-]/i","_",$service_picture["name"]);
    $i = 0;
    $parts = pathinfo($name);

    while (file_exists(UPLOAD_DIR . $name)){
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    $success = move_uploaded_file($service_picture["tmp_name"],UPLOAD_DIR . $name);
    if(!$success){
        echo "<p>Не удалось сохранить файл.</p>";
        exit;
    }
    chmod(UPLOAD_DIR . $name,0644);

    $service_picture_name = $name;
}
$company_id = intval(trim($_POST['company_id']));
$service_name = mysqli_real_escape_string($dbc, trim($_POST['service_name']));
$service_info = mysqli_real_escape_string($dbc, trim($_POST['service_info']));