<?php
require_once 'constants.php';
if(isset($_POST['edit'])){
    $button_type = "edit";
    $button_name = "Обновить";
    $company_id = intval(trim($_POST['edit']));
    $sql = "SELECT * FROM `company` WHERE `company_id` = $company_id";
    $result = $dbc -> query($sql);
    $result = mysqli_fetch_array($result);
    $company_name = $result['company_name'];
    $company_email = $result['company_email'];
    $company_phone = $result['company_phone'];
    $company_age = $result['company_age'];
    $company_info = $result['company_info'];
}else{
    $button_type = "submit";
    $button_name = "Создать";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Company</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
<div class="wrapper">
    <?php require_once 'navbar.php'; ?>

    <div class="container">
        <form action="sql/crud_company.php" method="post" id="form_company" name="form_company" onsubmit="return validate_company()">
            <div class="form-group">
                <label style="color: white">Название компании:</label>
                <input type="text" id="company_name" name="company_name"
                       value="<?php if(isset($_POST['edit']))echo $company_name ?>"
                       class="form-control" placeholder="Путешествуй в РФ">
            </div>
            <div class="form-group">
                <label style="color: white">Email:</label>
                <input type="email" id="company_email"
                       value="<?php if(isset($_POST['edit']))echo $company_email ?>"
                       name="company_email" class="form-control"
                       aria-describedby="emailHelp" placeholder="your_company@box.ru">
            </div>
            <div class="form-group">
                <label style="color: white">Номер:</label>
                <input type="tel" id="company_phone"
                       value="<?php if(isset($_POST['edit']))echo $company_phone ?>"
                       name="company_phone" class="form-control"
                       placeholder="+79664554112">
            </div>
            <div class="form-group">
                <label style="color: white">Как давно вы на рынке</label>
                <input type="text" id="company_age"
                       value="<?php if(isset($_POST['edit']))echo $company_age ?>"
                       name="company_age" class="form-control"
                       placeholder="12 месяцев">
            </div>
            <div class="form-group">
                <label style="color: white">Расскажите о самых главных достоинствах компании</label>
                <textarea style="resize: none" id="company_info" name="company_info" class="form-control"
                          rows="3"><?php if(isset($_POST['edit']))echo $company_info ?></textarea>
            </div>
            <?php
                if($button_type == "edit") echo "<input type=\"hidden\" name=\"company_id\" value=\"$company_id\"/>";
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