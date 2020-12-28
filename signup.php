<?php require_once 'function/duplicate_user_auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
<div class="wrapper">
    <?php require_once 'navbar.php'; ?>

    <div class="container">
        <content>
            <form action="sql/crud_user.php" method="post" id="form_signup" name="form_signup" onsubmit="return validate_signup()">
                <label for="username"><h3>Ввведите логин:</h3></label>
                <input type="text" id="username" name="username">
                <br>
                <label for="password"><h3>Ввведите пароль:</h3></label>
                <input type="password" id="password" name="password">
                <br>
                <label for="repeat_password"><h3>Повторите пароль:</h3></label>
                <input type="password" id="repeat_password" name="repeat_password">
                <br>
                <div class="g-recaptcha" data-sitekey="6LdxAgwaAAAAAHRgX-q_QERS4T5Gh3sVw0-6MVG3"></div>
                <br>
                <button class="btn btn-primary btn-lg" type="submit" name="create">Создать</button>
            </form>
        </content>
    </div>
    <br>
    <br>
    <br>
    <?php require_once 'footer.php'; ?>
    <script src="validation.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</div>
</body>
</html>