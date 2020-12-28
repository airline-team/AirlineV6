<?php require_once 'function/duplicate_user_auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
	<div class="wrapper">
    <?php require_once 'navbar.php'; ?>
        <div class="container">
            <content>
                <form action="sql/crud_user.php" method="POST">
                    <label for="username"><h3>Логин:</h3></label>
		            <input type="text" name="username">
		            <br>
		            <label for="password"><h3>Пароль:</h3></label>
		            <input type="password" name="password">
		            <br>
		            <button type="submit" name="login" class="btn btn-primary btn-lg">Вход</button>
                    <button type="submit" formaction="signup.php" class="btn btn-primary btn-lg">Зарегистрироваться</button>
	            </form>
            </content>
        </div>
    <?php require_once 'footer.php'; ?>
</body>
</html>