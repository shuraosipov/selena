<?php
//���������� ����
include 'includes/system.php';
$id_request = $_GET['id'];


// ��������� ������ � ������� trash_request
$q_ins_request = "INSERT INTO `trash_request`
				SELECT * FROM `request`
				WHERE request.id = '$id_request'";
$r_ins_request = mysql_query($q_ins_request) or die ("������ ��� ������� 1".mysql_error());

//��������� ������ � ������� trash_comments
$q_ins_comments = "INSERT INTO `trash_comments` 
				SELECT * FROM `comments` 
				WHERE comments.linkkey = '$id_request'";

$r_ins_comments = mysql_query($q_ins_comments) or die ("������ ��� ������� 2".mysql_error());

//��������� ������ � ������� trash_history
$q_ins_history = "INSERT INTO `trash_history` 
				SELECT * FROM `history` 
				WHERE history.request_id = '$id_request'";
$r_ins_history = mysql_query($q_ins_history) or die ("������ ��� ������� 3".mysql_error());




// ������� ��� ����������� � ���������
$q_del_comments = "DELETE FROM `comments` WHERE linkkey='$id_request'";
$r_del_comments = mysql_query($q_del_comments) or die ("������ ��� �������� 1".mysql_error());

// ������� ��� ��������� ������� ���������
$q_del_history ="DELETE FROM `history` WHERE request_id='$id_request'";
$r_del_history = mysql_query($q_del_history) or die ("������ ��� �������� 2".mysql_error());

// ������� ���� ���������
$q_del_request = "DELETE FROM `request` WHERE id='$id_request'";
$r_del_request = mysql_query($q_del_request) or die ("������ ��� �������� 3".mysql_error());
echo <<<HERE
<meta http-equiv="Refresh" content="1;URL=reception.php">
<title> SELENA | ��������</title>
��������� �������..
<noscript><a href="reception.php">�������< /noscript>
HERE;

