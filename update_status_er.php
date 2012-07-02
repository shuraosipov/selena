<?php
//системыенй файл
include 'includes/system.php';
$id_request = $_GET['id_request'];
$status = $_GET['status'];
$editor_id = $_SESSION['id_user'];	// id пользователя техподдержки

// добавляем запись об изменении обращения в таблицу `history`
$q_history = "INSERT INTO `history` (request_id,editor_id,status,date_edit)
			VALUES ('$id_request','$editor_id','$status',NOW())";
$r_history = mysql_query($q_history) 
	or die ("Невозможно добавить запсиь в таблитцу history".mysql_error());
	

$query = "UPDATE `request` SET status ='$status' WHERE id = '$id_request'";
$result = mysql_query($query) or die ("Ошибка".mysql_error());
echo <<<HERE
<meta http-equiv="Refresh" content="2;URL=edit_reception.php?id=$id_request">
<title> SELENA | успешное обнолвение</title>
Статус изменен...
<noscript><a href="reception.php?id=$id_request">Перейти< /noscript>
HERE;
?>
