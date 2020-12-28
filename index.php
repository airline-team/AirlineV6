<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Airline VolSU</title>
    <?php require_once 'header.php'; ?>
</head>
<body>
	<div class="wrapper">
	<?php require_once 'navbar.php'; ?>

        <div class="header">
            <h1> Покупка авиабилетов </h1>
            <p> По самым выгодным ценам </p>
            <button type="button">Поиск билетов</button>
        </div>
	
	<?php require_once 'footer.php'; ?>
</body>
</html>