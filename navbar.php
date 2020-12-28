<div class="navbar">
    <div class="main">
        <a href="index.php">Главная страница</a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="list_tickets.php">Список билетов</a><li>
            <li><a href="price_tickets.php">Цена билетов</a><li>
            <li><a href="list_company.php">Список компаний</a><li>
            <li><a href="#">Журнал продаж билетов</a><li>
            <li><a href=<?php
                if(empty($_SESSION['username']))echo "login.php";
                else echo "personal_profile.php";
                ?>>
                    <?php
                    if(empty($_SESSION['username']))echo "Войти";
                    else echo "Личный кабинет";
                    ?>
                </a><li>
        </ul>
    </div>
</div>