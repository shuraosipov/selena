<?php
// ���������� ��������� ����
require 'includes/system.php';

$id_user = $_SESSION['id_user'];
// �� ��������� ������������� ������� ������� ������� ������ �� ������� 
$q_delete_session = "DELETE FROM `online`
					WHERE `user_id` = '$id_user'";
$r_delete_session = mysql_query($q_delete_session) or die ("���������� ������� ������".mysql_error());

session_destroy();

include 'v_logout.php';
?>
