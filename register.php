<?php
session_start();
include 'includes/db.php';
include 'includes/config.php';

$alert = '';
$wrong_username = '';
$wrong_password = '';

if (isset($_POST['register']))
{
	// �������� �� ���������� �����
	if ($_POST['username'] == '' || $_POST['password']== '' || $_POST['password1']== '')
	{
		$wrong_username = '�� ���������';
		$wrong_password = '�� ���������';
		
		include 'v_register.php';
	}
	else
	{
		
		// ������� ������ �� �������� ������ � ������
		$username = htmlspecialchars($_POST['username'],ENT_QUOTES);
		$password = htmlspecialchars($_POST['password'],ENT_QUOTES);
		$password1 = htmlspecialchars($_POST['password1'],ENT_QUOTES);
		
		
		// ���������� ��������� ������
		if ($password != $password1)
		{
			$alert = '��������� ������ �� ���������';
			include 'v_register.php';
		}
		else 
		{
			$password = md5($password . $salt);
			
			
			$query = "SELECT *
					FROM `users`
					WHERE `user`='$username'";
			
			$result = mysql_query($query) or die ("���������� ��������� ������ �� ����� ����� � ������".mysql_error());
			if (mysql_num_rows($result) > 0) 
			{
				// ������ ��������� � ������� ������ ������
				$alert = '������������ � ����� ������ ��� ����������';
				include 'v_register.php';
				
			}
			else
			{
				// ��������� ������ � ����
			$query  = "INSERT INTO `users` (`user`,`password`)
					VALUES ('$username','$password')";
			$result = mysql_query($query) or die ("���������� �������� ������ : ".mysql_error());
			$alert = "�� ������� ������������������<br><a href=\"login.php\">������ �� ������ ����� � �������</a>";
			 
			include 'v_register.php';
			
			}
		}
	}
}
else
{
	include 'v_register.php';
}
mysql_close();
?>