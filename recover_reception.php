<?php
//системыенй файл
include 'includes/system.php';
$id_request = $_GET['id'];


// переносим данные в таблицу request
$q_ins_request = "INSERT INTO `request`
				SELECT * FROM `trash_request`
				WHERE trash_request.id = '$id_request'";
$r_ins_request = mysql_query($q_ins_request) or die ("Ошибка при вставке 1".mysql_error());

//переносим данные в таблицу comments
$q_ins_comments = "INSERT INTO `comments` 
				SELECT * FROM `trash_comments` 
				WHERE trash_comments.linkkey = '$id_request'";
$r_ins_comments = mysql_query($q_ins_comments) or die ("Ошибка при вставке 2".mysql_error());

//переносим данные в таблицу trash_history
$q_ins_history = "INSERT INTO `history` 
				SELECT * FROM `trash_history` 
				WHERE trash_history.request_id = '$id_request'";
$r_ins_history = mysql_query($q_ins_history) or die ("Ошибка при вставке 3".mysql_error());


// удаляем все комментарии к обращение
$q_del_comments = "DELETE FROM `trash_comments` WHERE linkkey='$id_request'";
$r_del_comments = mysql_query($q_del_comments) or die ("Ошибка при удалении 1".mysql_error());

// удаляем все изменения истории обращения
$q_del_history ="DELETE FROM `trash_history` WHERE request_id='$id_request'";
$r_del_history = mysql_query($q_del_history) or die ("Ошибка при удалении 2".mysql_error());

// удаляем само обращение
$q_del_request = "DELETE FROM `trash_request` WHERE id='$id_request'";
$r_del_request = mysql_query($q_del_request) or die ("Ошибка при удалении 3".mysql_error());
echo <<<HERE
<meta http-equiv="Refresh" content="1;URL=recyclebin.php">
<title> SELENA | Восстановление</title>
Обращение восстановлено..
<noscript><a href="recyclebin.php">Перейти< /noscript>
HERE;

