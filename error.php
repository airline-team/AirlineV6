<!DOCTYPE html>
<html lang="en">
<head>
	<title>Error</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
	<div class="wrapper">
	<div class="navbar">
		<div class="main">
			<a href="index.php">Главная страница</a>
		</div>
		<div class="menu">
		<ul>
			<li><a href="list_tickets.php">Список билетов</a><li>
			<li><a href="price_tickets.php">Цена билетов</a><li>
			<li><a href="#">Список компаний</a><li>
			<li><a href="#">Журнал продаж билетов</a><li>
			<li><a href="exit.php">Выйти</a><li>		
		</ul>
		</div>
		</div>	 

<div class="container">
<content>
<span style="color: red; font-size: 30px;"> Извините,вы уже авторизированный пользователь,чтобы зайти с другого аккаунта - нужно выйти с предыдущего</span>
</content>
</div>

    <?php require_once 'footer.php'; ?>
</body>
</html>