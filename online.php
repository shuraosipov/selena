<?php
$id_user = $_SESSION['id_user'];
$session_id =  session_id();

// провер€ем есть ли запись с такимже session_id
$q_session_id = "SELECT id 
				FROM `online`
				WHERE session_id = '$session_id'
				LIMIT 1";
$r_session_id = mysql_query($q_session_id) 
or die ("Ќевозможно выполнить запрос на получение session_id".mysql_error());

	// ≈сли запись с такой сессией уже есть, тогда обновл€ем врем€
if (mysql_num_rows($r_session_id) > 0) {

	$id = mysql_fetch_array($r_session_id); 
	$q_session_update = "UPDATE `online`
						SET `current_time`=NOW()
						WHERE id='$id'";
	$r_session_update = mysql_query($q_session_update) 
	or die ("Ќевозможно обновить дату".mysql_error());
	
} 
	// ≈сли записи с тем де session_id не обранужено создаем новую запись
else 
{
	$q_session_insert = "INSERT INTO `online` ( `user_id` , `current_time` , `session_id` )
						VALUES ('$id_user', NOW() , '$session_id')";

	$r_session_insert = mysql_query($q_session_insert)
	or die ("Ќевозможно выполнить запрос на добавдение записи<br>".mysql_error());
}
// ѕо истечении определенного периода времени удал€ем запись из таблицы 
$q_delete_session = "DELETE FROM `online`
					WHERE `current_time` < NOW() - 
					INTERVAL '3' MINUTE";
$r_delete_session = mysql_query($q_delete_session) or die ("Ќевозможно удалить запись".mysql_error());
?>