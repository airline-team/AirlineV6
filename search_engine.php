<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Engine</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
<div class="wrapper">
    <?php require_once 'navbar.php'; ?>

    <div class="header">
        <form class="form" action="sql/search.php" method="POST">
            <div class="search-box">
                <div class="form-group">
                    <label style="color: white; font-size: 25px;">Поиск по слову или числу по таблицам:company and company_sevice</label>
                    <br>
                    <br>
                    <input type="text" name="search_this" class="form-control" placeholder="Здесь должен быть какой-то текст">
                </div>
                <button class="btn btn-primary btn-lg" type="submit">Найти</button>
            </div>
        </form>
    </div>


    <?php require_once 'footer.php'; ?>
</body>
</html>