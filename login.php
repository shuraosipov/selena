<?php
session_start();
include 'includes/db.php';
include 'includes/config.php';

$alert = '';
$wrong_username = '';
$wrong_password = '';

if (isset($_POST['login']))
{
	// �������� �� ���������� �����
	if ($_POST['username'] == '' && $_POST['password']== '')
	{
		if ($_POST['username'] == '') {$wrong_username = '�� ������� ���';};
		if ($_POST['password'] == '') {$wrong_password = '�� ������ ������';};
		
		$user = $_POST['username'];
		$password = $_POST['password'];
		
		include 'v_login.php';
	}
	else
	{
		// ������� ������ �� �������� ������ � ������
		$username = htmlspecialchars($_POST['username'],ENT_QUOTES);
		$password = htmlspecialchars($_POST['password'],ENT_QUOTES);
		$password = md5($password . $salt);
		
		
		$query = "SELECT *
				FROM `users`
				WHERE `user`='$username'
				AND `password`='$password'";
		
		$result = mysql_query($query) or die ("���������� ��������� ������ �� ����� ����� � ������".mysql_error());
		if (mysql_num_rows($result) > 0) 
		{
			// ������������� ���������� ������
			$_SESSION['username'] = $username;
			
			while ($q = mysql_fetch_array($result))
			{
				// ���������� ���������� ��� ������������ (administrator, support, workers)
				$_SESSION['type'] = $q['type'];
				
				// ����������� ���������� id ������������
				$_SESSION['id_user'] = $q['id'];
				
				
			}
			
			// ��������������� �� �������� � ����������� �� ���� ������������
			switch ($_SESSION['type']) 
			{
					case 1:
					header("Location: users_a.php");
					break;
					
					case 2:
					header("Location: reception.php");
					break;
					
					case 3:
					header ("Location: request.php");
					
					default:
						;
					break;
			}
		}
		else
		{
		// ������������ ����� ��� ������
		$alert = '������������ ����� ��� ������';
		include 'v_login.php';
		}
	}
}
else
{
	include 'v_login.php';
}
mysql_close();
?>