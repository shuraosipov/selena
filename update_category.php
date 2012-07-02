<?php
// подключаем системный файл
include 'includes/system.php';

//объявляем переменнные полученные co страницы edit_reception.php 
$id_request = $_GET['id_request'];	// id обращения
$category = $_GET['category'];		// id категории
$editor_id = $_SESSION['id_user'];	// id пользователя техподдержки



//обновляем категорию в таблице `request`
$query = "UPDATE `request` 
		SET category='$category' 
		WHERE id = '$id_request'";

$result = mysql_query($query) 
or die ("Ошибка, неправильный запрос на обновление категории".mysql_error());

// после успешного выполнения запроса делаем переадресацию на страницу edit_reception.php 
echo <<<HERE
	<!-- Делаем переадресацию на страницу обработки обращения через 2 секунды-->
	<meta http-equiv="Refresh" content="2;URL=edit_reception.php?id=$id_request">
	
	<!-- Название страницы -->
	<title> SELENA | успешное обнолвение</title>
	
	<!-- Название страницы -->
	Категория изменена...
	
	<!-- Если поддержка скриптов в браузере отключена, появится ссылка на страницу edit_reception.php -->
	<noscript><a href="URL=edit_reception.php?id=$id_request">Перейти< /noscript>
HERE;
?>