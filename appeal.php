<?php

/*
 * appeal.php
 * ��������� ��������� �������� � ��������� ��������� � ����
 * 
 */

// ���������� ��������� ����
include 'includes/system.php';

// ���������� ���� ��� ����������� ������������� ������
include 'online.php';



// ������������� ���������� �������� ��-���������
$alert = '';
$wrong_title = '';
$wrong_text = '';
$title = '';
$text = '';


// �������� ������ � ����� request.php
if (isset($_POST['send_request'])) 
{
	
	//��������� ��������� ������
	
	if ($_POST['title_request'] == '' || $_POST['text_request'] == '' || strlen($_POST['title_request']) > 50 || strlen($_POST['text_request']) > 250)
	{
		// ���� ���� �� ���������, ����� ������ ��������������
		if(($_POST['title_request']) == '') {$wrong_title = '���� �� ���������';}
		if(($_POST['text_request']) == '') {$wrong_text = '���� �� ���������';}

		// ��������� ����� ������, ���� �� ������������ - ������ ��������������
		if (strlen($_POST['title_request']) > 50) {$wrong_title = '����� ������ �� ������ 50 ��������';}
		if (strlen($_POST['text_request']) > 250) {$wrong_text = '����� ������ �� ������ 250 ��������';}
				
		
		$title = $_POST['title_request'];
		$text = $_POST['text_request'];
		
		include 'v_appeal.php';
	}
	else 
	{
		// ���� ���� ���������, ����� ������������ ������ � ��������� ���������� ��� ������� 
		$title = mysql_real_escape_string($_POST['title_request']);
		$text = mysql_real_escape_string($_POST['text_request']);
		$type = $_POST['type_request'];
		$linkkey = $_POST['user_req'];
		
		// ��������� ������ � ������� `request`
		$query = "INSERT INTO `request` (`title`,`text`,`type`,`linkkey`)
			VALUES ('$title','$text','$type','$linkkey')";
		$result = mysql_query($query) or die ("���������� �������� ������ ".mysql_error());
		
		$alert = '��������� ������� ����������';
		include 'v_appeal.php';
	}
	
}
else
{	
	include 'v_appeal.php';
}

?>