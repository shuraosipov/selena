<?php
//системыенй файл
include 'includes/system.php';
$id_request = $_GET['id_request'];
$type = $_GET['type'];
$editor_id = $_SESSION['id_user'];	// id пользователя техподдержки
	

$query = "UPDATE `request` SET type ='$type' WHERE id = '$id_request'";
$result = mysql_query($query) or die ("Ошибка".mysql_error());
echo <<<HERE
<meta http-equiv="Refresh" content="2;URL=edit_reception.php?id=$id_request">
<title> SELENA | Успешное обнолвение приоритета...</title>
Приоритет установлен...
<noscript><a href="edit_reception.php?id=$id_request">Перейти< /noscript>
HERE;
?>
