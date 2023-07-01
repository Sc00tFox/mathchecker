<?php
	//======================================================
	//  Created by Semyon Toporov
	//	Copyright © Semyon Toporov 2020 All rights reserved. 
	//======================================================
	require("./engine/libs/core/php/functions.php");

	if (getSetting("site_available") == "1"){
		locationTo("index?page=home", 0);
		exit;
	}
?>

<!doctype html>
<html lang="ru">
	<head>
  		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  		<link rel="shortcut icon" href="./engine/images/index/favicon.ico" type="image/x-icon">
  		<title>Сайт недоступен!</title>
  		<style type="text/css">
 			* {
  				margin: 0;
  				padding: 0;
			}

			body, html {
  				height: 100%;
  				background: url(./engine/images/unavailable_background.png);
  				background-size: 100%;
  				overflow:  hidden; 
			}

			.text {
  				display: flex;
  				align-items: flex-start;
  				justify-content: center;
  				height: 100%;
  				
  				font-family: Roboto;
				font-style: normal;
				font-weight: normal;
				font-size: 64px;
			}
		</style>
 	</head>
	<body>
		<div class="text">
  			<p>Ведутся технические работы</p>
		</div>
	</body>
</html>