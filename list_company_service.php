<?php
require_once 'constants.php';
if(isset($_POST['look'])){
    $company_id = intval(trim($_POST['look']));
    $sql = "SELECT * FROM `company_service` WHERE `company_id`=$company_id";
    $result = $dbc -> query($sql);
}else {
    $home_url = 'http://' . $_SERVER['HTTP_HOST'];
    header("Location: " . $home_url . '/error.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Company Service</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
<div class="wrapper">
    <?php require_once 'navbar.php'; ?>
    <div class="content">
        <div class="container">
            <div class="row">
                <?php
                foreach ($result as $item){
                    $service_id = $item['service_id'];
                    $service_name = $item['service_name'];
                    $service_picture = $item['service_picture'];
                    $service_info = $item['service_info'];
                    echo ("
                        <div class=\"col-lg-4 col-md-4 col-sm-12 list\">
                            <div class=\"card\" style=\"width: 18rem;\">
                                <img class=\"card-img-top\" src=\"images/$service_picture\" alt=\"Card image cap\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">$service_name</h5>
                                    <p class=\"card-text\">$service_info</p>
                                </div>
                                <div class=\"card-footer\">
                                    <form action=\"form_company_service.php\" method=\"post\">
                                        <a href=\"#\" onclick=\"parentNode.submit();\">Редактировать</a>
                                        <input type=\"hidden\" name=\"edit\" value=\"$service_id\"/>
                                    </form>
                                </div>
                                <div class=\"card-footer\">
                                    <form action=\"sql/crud_company_service.php\" method=\"post\">
                                        <a href=\"#\" onclick=\"parentNode.submit();\">Удалить</a>
                                        <input type=\"hidden\" name=\"delete\" value=\"$service_id\"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ");
                }
                ?>
            </div>
            <div class="text-center">
                <form action="form_company_service.php" method="post">
                    <input type="hidden" name="company_id" value="<?php echo $company_id ?>">
                    <button class="btn btn-primary btn-lg" type="submit">
                        Добавить услугу
                    </button>
                </form>
            </div>
            <br>
            <br>
        </div>
        <br>
        <br>
    </div>
    <?php require_once 'footer.php'; ?>
</div>
</body>
</html>