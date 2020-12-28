<?php
require_once 'constants.php';
if(isset($_POST['edit'])){
    $button_type = "edit";
    $button_name = "Обновить";
    $user_id = intval(trim($_SESSION['user_id']));
    $sql = "SELECT * FROM `user_info` WHERE user_id = '$user_id'";
    $result = $dbc -> query($sql);
    $result = mysqli_fetch_array($result);
    $info_id = $result['id'];
    $user_fio = $result['user_fio'];
    $user_phone = $result['user_phone'];
    $user_trip = $result['user_trip'];
}else{
    $username = mysqli_real_escape_string($dbc, trim($_SESSION['username']));
    $sql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = $dbc -> query($sql);
    $result = mysqli_fetch_array($result);
    $user_id = $result['id'];
    $button_type = "submit";
    $button_name = "Добавить";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form User Info</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
<div class="wrapper">
    <?php require_once 'navbar.php'; ?>

    <div class="container">
        <form action="sql/crud_user_info.php" method="post" id="form_user_info"
              name="form_user_info" onsubmit="return validate_user_info()">
            <div class="form-group">
                <label style="color: white">Введите ФИО:</label>
                <input type="text" id="user_fio" name="user_fio"
                       value="<?php if(isset($_POST['edit']))echo $user_fio ?>"
                       class="form-control" placeholder="Пупкин Иван Владимирович">
            </div>
            <div class="form-group">
                <label style="color: white">Введите номер телефона:</label>
                <input type="tel" id="user_phone" name="user_phone"
                       value="<?php if(isset($_POST['edit']))echo $user_phone ?>"
                       class="form-control" placeholder="+79664554112">
            </div>
            <div class="form-group">
                <label style="color: white">Введите города в которых вы путешествовали</label>
                <input type="text" id="user_trip" name="user_trip"
                       value="<?php if(isset($_POST['edit']))echo $user_trip ?>"
                       class="form-control" placeholder="Москва,Венеция,Колыма">
            </div>
            <br>
            <?php
            if($button_type == "edit") {
                echo "<input type=\"hidden\" name=\"info_id\" value=\"$info_id\"/>";
            }else{
                echo "<input type=\"hidden\" name=\"user_id\" value=\"$user_id\"/>";
            }
            echo "<button type=\"$button_type\" id=\"$button_type\" name=\"$button_type\" class=\"btn btn-primary\">$button_name</button>";
            ?>
        </form>
    </div>
    <br>
    <br>
    <br>
    <?php require_once 'footer.php'; ?>
    <script src="validation.js"></script>
    <script type="text/javascript" src="http://yastatic.net/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="function/speller.js"></script>
</body>
</html>