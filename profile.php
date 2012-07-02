<?php
// подключаем системный файл
include 'includes/system.php';
// подключаем страницу разметки
include 'online.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | Просмотр профиля</title>
		
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
			
			
			<!-- Вывод сообщения об успешном сбросе пароля-->
			<div id="alert">
				<?php echo @$alert;?>
			</div>
			
			
			<!-- Здесь будет отображаться информация о пользовательском профиле -->
			<div id="main">
				<?php include 'v_profile.php';?>
			</div>
			
			<!-- Подключаем подвал -->
			<div id="footer">
				<?php include 'includes/footer.php';?>
			</div>
		</div>
	</body>
	
</html>	
