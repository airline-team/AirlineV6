<?php
require_once 'constants.php';
if(isset($_POST['edit'])){
    $button_type = "edit";
    $button_name = "Обновить";
    $service_id = intval(trim($_POST['edit']));
    $sql = "SELECT * FROM `company_service` WHERE `service_id` = $service_id";
    $result = $dbc -> query($sql);
    $result = mysqli_fetch_array($result);
    $company_id = $result['company_id'];
    $service_name = $result['service_name'];
    $service_picture = $result['service_picture'];
    $service_info = $result['service_info'];
}else{
    $company_id = intval(trim($_POST['company_id']));
    $button_type = "submit";
    $button_name = "Создать";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Company Service</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
<div class="wrapper">
    <?php require_once 'navbar.php'; ?>

    <div class="container">
        <form action="sql/crud_company_service.php" method="post" id="form_company_service"
              name="form_company_service" enctype="multipart/form-data" onsubmit="return validate_service()">
            <div class="form-group">
                <label style="color: white">Название сервиса:</label>
                <input type="text" id="service_name" name="service_name"
                       value="<?php if(isset($_POST['edit']))echo $service_name ?>"
                       class="form-control" placeholder="Страхование">
            </div>
            <div class="form-group">
                <label style="color: white">Расскажите о самых главных достоинствах сервиса</label>
                <textarea style="resize: none" id="service_info" name="service_info" class="form-control"
                          rows="3"><?php if(isset($_POST['edit']))echo $service_info ?></textarea>
            </div>
            <label style="color: white">Загрузите привлекающую картинку !</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="service_picture" name="service_picture">
                <label class="custom-file-label" for="service_picture">Choose file</label>
            </div>
            <br>
            <br>
            <?php
            if($button_type == "edit") {
                echo "<input type=\"hidden\" name=\"service_id\" value=\"$service_id\"/>";
                echo "<input type=\"hidden\" name=\"old_picture\" value=\"$service_picture\"/>";
            }
            echo "<input type=\"hidden\" name=\"company_id\" value=\"$company_id\"/>";
            echo "<button type=\"$button_type\" id=\"$button_type\" name=\"$button_type\" class=\"btn btn-primary\">$button_name</button>";
            ?>
        </form>
    </div>
    <br>
    <br>
    <br>
    <?php require_once 'footer.php'; ?>
    <script src="validation.js"></script>
</body>
</html>