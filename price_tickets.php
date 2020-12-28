<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Price Tickets</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
<div class="wrapper">
    <?php require_once 'navbar.php'; ?>
    <div class="header">
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class=text_n>
                        <div class="col"><b>Эконом класс</b> <br>Цены от 1 700 рублей 	&#160;  &#160; </br></div></div>
                    <div class="col"><button type="button">Найти</button></div>
                </div>

                <div class="row">
                    <div class=text_n>
                        <div class="col"><b>Бизнес класс</b> <br>Цены от 30 000 рублей &#160; </br></div></div>
                    <div class="col"><button type="button">Найти</button></div>
                </div>

                <div class="row">
                    <div class=text_n>
                        <div class="col"><b>Первый класс</b> <br>Цены от 140 000 рублей</br></div></div>
                    <div class="col"><button type="button">Найти</button></div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php'; ?>
</body>
</html>