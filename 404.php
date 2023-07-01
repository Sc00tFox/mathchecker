<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
?>

<!doctype html>
<html lang="ru">
	<head>
    	<meta charset="UTF-8">
    	<meta name="description" content="Сервис по проверки работ по математическим дисциплинам.">
    	<meta name="keywords" content="Математика, Мат. анализ, Математический анализ, Дискретная математика, Геометрия, Чёрный кот.">
    	<meta name="author" content="Team-9">
    	<meta name="viewport"
          content=" user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    	<link rel="stylesheet" href="./engine/libs/core/css/index/main.css">
    	<link rel="stylesheet" href="./engine/libs/core/css/index/style_of_404.css">
    	<link rel="shortcut icon" href="./engine/images/index/favicon.ico" type="image/x-icon">
    	<title>Упс! Что-то пошло не так</title>
	</head>
	
	<body>
        <?php require("./engine/libs/core/php/header.php"); ?>
    
		<section>
    		<div class="container-grey">
        		<div class="container-grey__box">
            		<h3>Оу, кажется, такой страницы не существует!</h3>
            		<div class="container-grey__box_404">
                		<h1>Страница 404</h1>
                		<img src="./engine/images/index/pic/404_1.svg" alt="404">
            		</div>
            		<img src="./engine/images/index/pic/404_2.svg" alt="404">
            		<a class="btn-orange" href="index?page=home">На главную</a>
        		</div>
    		</div>
		</section>
	</body>
    <?php require("./engine/libs/core/php/footer.php"); ?>
</html>