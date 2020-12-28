<?php
require_once 'constants.php';
$sql = "SELECT * FROM `company`";
$result = $dbc -> query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Company</title>
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
                    $company_id = $item['company_id'];
                    $company_name = $item['company_name'];
                    $company_email = $item['company_email'];
                    $company_phone = $item['company_phone'];
                    $company_age = $item['company_age'];
                    $company_info = $item['company_info'];
                    echo ("
                        <div class=\"col-lg-4 col-md-4 col-sm-12 list\">
                            <div class=\"card\" style=\"width: 18rem;\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">$company_name</h5>
                                    <p class=\"card-text\">$company_info</p>
                                </div>
                                <ul class=\"list-group list-group-flush\">
                                    <li class=\"list-group-item\">Email: $company_email</li>
                                    <li class=\"list-group-item\">Номер: $company_phone</li>
                                    <li class=\"list-group-item\">Сколько лет на рынке: $company_age</li>
                                </ul>
                                <div class=\"card-footer\">
                                    <form action=\"list_company_service.php\" method=\"post\">
                                        <a href=\"#\" onclick=\"parentNode.submit();\">Посмотреть услуги компании</a>
                                        <input type=\"hidden\" name=\"look\" value=\"$company_id\"/>
                                    </form>
                                </div>
                                <div class=\"card-footer\">
                                    <form action=\"form_company.php\" method=\"post\">
                                        <a href=\"#\" onclick=\"parentNode.submit();\">Редактировать</a>
                                        <input type=\"hidden\" name=\"edit\" value=\"$company_id\"/>
                                    </form>
                                </div>
                                <div class=\"card-footer\">
                                    <form action=\"sql/crud_company.php\" method=\"post\">
                                        <a href=\"#\" onclick=\"parentNode.submit();\">Удалить</a>
                                        <input type=\"hidden\" name=\"delete\" value=\"$company_id\"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        ");
                }
                ?>
            </div>
            <div class="text-center">
                <form action="form_company.php">
                    <button class="btn btn-primary btn-lg" type="submit">
                        Добавить компанию
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