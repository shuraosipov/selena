<?php
// ����������� ����� � �����������
include 'includes/system.php';

// �������� ����������
$alert = '';
$id = $_SESSION['id_worker'];
$password =md5('123' . $salt);

// ������ �� ���������� ������ ������������
$query = "UPDATE `users`
		SET password = '$password'
		WHERE id = '$id'";
$result = mysql_query($query) or die ("���������� �������� ������ :".mysql_error());

header("Location: profile.php?id_user=$id");

$alert = '������ ������� ������� �� 123';
?>