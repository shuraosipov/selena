<?php
// ���������� ��������� ����
include 'includes/system.php';

//��������� ����������� ���������� co �������� edit_reception.php 
$id_request = $_GET['id_request'];	// id ���������
$category = $_GET['category'];		// id ���������
$editor_id = $_SESSION['id_user'];	// id ������������ ������������



//��������� ��������� � ������� `request`
$query = "UPDATE `request` 
		SET category='$category' 
		WHERE id = '$id_request'";

$result = mysql_query($query) 
or die ("������, ������������ ������ �� ���������� ���������".mysql_error());

// ����� ��������� ���������� ������� ������ ������������� �� �������� edit_reception.php 
echo <<<HERE
	<!-- ������ ������������� �� �������� ��������� ��������� ����� 2 �������-->
	<meta http-equiv="Refresh" content="2;URL=edit_reception.php?id=$id_request">
	
	<!-- �������� �������� -->
	<title> SELENA | �������� ����������</title>
	
	<!-- �������� �������� -->
	��������� ��������...
	
	<!-- ���� ��������� �������� � �������� ���������, �������� ������ �� �������� edit_reception.php -->
	<noscript><a href="URL=edit_reception.php?id=$id_request">�������< /noscript>
HERE;
?>