<?php
//���������� ����
include 'includes/system.php';
$id_request = $_GET['id_request'];
$type = $_GET['type'];
$editor_id = $_SESSION['id_user'];	// id ������������ ������������
	

$query = "UPDATE `request` SET type ='$type' WHERE id = '$id_request'";
$result = mysql_query($query) or die ("������".mysql_error());
echo <<<HERE
<meta http-equiv="Refresh" content="2;URL=edit_reception.php?id=$id_request">
<title> SELENA | �������� ���������� ����������...</title>
��������� ����������...
<noscript><a href="edit_reception.php?id=$id_request">�������< /noscript>
HERE;
?>
