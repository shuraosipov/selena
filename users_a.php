<?php
// подключаем системный файл
include 'includes/system.php';
// подключаем файл для определения пользователей онлайн
include 'online.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | Панель управления</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
		
	</head>
	
	<body>
		<div id="container">
			<!-- Подключаем заголовок -->
			<div id="header">
				<?php include 'includes/admin_header.php';?>
			</div>
			
			<!-- Здесь будет отображаться таблица со всеми пользователями из файла users_a.php -->
			
			<div id="main">
				<?php include 'v_users_a.php';?>
			</div>
			
			<!-- Подключаем подвал -->
			<div id="footer">
				<?php include 'includes/footer.php';?>
			</div>
		</div>
	</body>
	
</html>	
