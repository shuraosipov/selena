<?php
//���������� ����
include 'includes/system.php';

// ���������� ����������
$id_request = $_GET['id_request'];
$status = $_GET['status'];
$id = $_GET['id'];
$username = $_GET['username'];
$editor_id = $_SESSION['id_user'];

// ��������� ������ �� ��������� ��������� � ������� `history`
$q_history = "INSERT INTO `history` (request_id,editor_id,status,date_edit)
			VALUES ('$id_request','$editor_id','$status',NOW())";
$r_history = mysql_query($q_history) 
	or die ("���������� �������� ������ � �������� history".mysql_error());

// ������ �� ���������� �������
$query = "UPDATE `request` SET status ='$status' WHERE id = '$id_request'";
$result = mysql_query($query) or die ("������".mysql_error());
echo <<<HERE
<meta http-equiv="Refresh" content="2;URL=allmessages.php?id=$id&username=$username">
<title> SELENA | �������� ����������</title>
������ �������...
<noscript><a href="allmessages.php?id=$id&username=$username">�������< /noscript>
HERE;
?>
