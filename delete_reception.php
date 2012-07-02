<?php
//системыенй файл
include 'includes/system.php';
$id_request = $_GET['id'];


// переносим данные в таблицу trash_request
$q_ins_request = "INSERT INTO `trash_request`
				SELECT * FROM `request`
				WHERE request.id = '$id_request'";
$r_ins_request = mysql_query($q_ins_request) or die ("Ошибка при вставке 1".mysql_error());

//переносим данные в таблицу trash_comments
$q_ins_comments = "INSERT INTO `trash_comments` 
				SELECT * FROM `comments` 
				WHERE comments.linkkey = '$id_request'";

$r_ins_comments = mysql_query($q_ins_comments) or die ("Ошибка при вставке 2".mysql_error());

//переносим данные в таблицу trash_history
$q_ins_history = "INSERT INTO `trash_history` 
				SELECT * FROM `history` 
				WHERE history.request_id = '$id_request'";
$r_ins_history = mysql_query($q_ins_history) or die ("Ошибка при вставке 3".mysql_error());




// удаляем все комментарии к обращение
$q_del_comments = "DELETE FROM `comments` WHERE linkkey='$id_request'";
$r_del_comments = mysql_query($q_del_comments) or die ("Ошибка при удалении 1".mysql_error());

// удаляем все изменения истории обращения
$q_del_history ="DELETE FROM `history` WHERE request_id='$id_request'";
$r_del_history = mysql_query($q_del_history) or die ("Ошибка при удалении 2".mysql_error());

// удаляем само обращение
$q_del_request = "DELETE FROM `request` WHERE id='$id_request'";
$r_del_request = mysql_query($q_del_request) or die ("Ошибка при удалении 3".mysql_error());
echo <<<HERE
<meta http-equiv="Refresh" content="1;URL=reception.php">
<title> SELENA | Удаление</title>
Обращение удалено..
<noscript><a href="reception.php">Перейти< /noscript>
HERE;

