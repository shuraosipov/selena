<?php
$id_user = $_SESSION['id_user'];
$session_id =  session_id();

// ��������� ���� �� ������ � ������� session_id
$q_session_id = "SELECT id 
				FROM `online`
				WHERE session_id = '$session_id'
				LIMIT 1";
$r_session_id = mysql_query($q_session_id) 
or die ("���������� ��������� ������ �� ��������� session_id".mysql_error());

	// ���� ������ � ����� ������� ��� ����, ����� ��������� �����
if (mysql_num_rows($r_session_id) > 0) {

	$id = mysql_fetch_array($r_session_id); 
	$q_session_update = "UPDATE `online`
						SET `current_time`=NOW()
						WHERE id='$id'";
	$r_session_update = mysql_query($q_session_update) 
	or die ("���������� �������� ����".mysql_error());
	
} 
	// ���� ������ � ��� �� session_id �� ���������� ������� ����� ������
else 
{
	$q_session_insert = "INSERT INTO `online` ( `user_id` , `current_time` , `session_id` )
						VALUES ('$id_user', NOW() , '$session_id')";

	$r_session_insert = mysql_query($q_session_insert)
	or die ("���������� ��������� ������ �� ���������� ������<br>".mysql_error());
}
// �� ��������� ������������� ������� ������� ������� ������ �� ������� 
$q_delete_session = "DELETE FROM `online`
					WHERE `current_time` < NOW() - 
					INTERVAL '3' MINUTE";
$r_delete_session = mysql_query($q_delete_session) or die ("���������� ������� ������".mysql_error());
?>