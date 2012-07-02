<?php
// подключаем системный файл
include 'includes/system.php';

//объявляем переменнные полученные co страницы edit_reception.php 
$id_request = $_GET['id_request'];	// id обращения
$status = $_GET['status'];			// id статуса 
$category = $_GET['category'];		// id категории
$editor_id = $_SESSION['id_user'];	// id пользователя техподдержки

// добавляем запись об изменении обращения в таблицу `history`
$q_history = "INSERT INTO `history` (request_id,editor_id,status,date_edit)
			VALUES ('$id_request','$editor_id','$status',NOW())";
$r_history = mysql_query($q_history) 
	or die ("Невозможно добавить запсиь в таблитцу history".mysql_error());


//обновляем записи категорию и статус обращения в таблице `request`
$query = "UPDATE `request` 
		SET status ='$status',category='$category' 
		WHERE id = '$id_request'";

$result = mysql_query($query) 
or die ("Ошибка, неправильный запрос на обновление категории и статуса".mysql_error());

// после успешного выполнения запроса делаем переадресацию на страницу edit_reception.php 
echo <<<HERE
	<!-- Делаем переадресацию на страницу обработки обращения через 2 секунды-->
	<meta http-equiv="Refresh" content="2;URL=edit_reception.php?id=$id_request">
	
	<!-- Название страницы -->
	<title> SELENA | успешное обнолвение</title>
	
	<!-- Название страницы -->
	Статус изменен...
	
	<!-- Если поддержка скриптов в браузере отключена, появится ссылка на страницу edit_reception.php -->
	<noscript><a href="URL=edit_reception.php?id=$id_request">Перейти< /noscript>
HERE;
mysql_close();
?>
