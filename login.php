<?php
session_start();
include 'includes/db.php';
include 'includes/config.php';

$alert = '';
$wrong_username = '';
$wrong_password = '';

if (isset($_POST['login']))
{
	// проверка на заполнение полей
	if ($_POST['username'] == '' && $_POST['password']== '')
	{
		if ($_POST['username'] == '') {$wrong_username = 'на указано имя';};
		if ($_POST['password'] == '') {$wrong_password = 'на введен пароль';};
		
		$user = $_POST['username'];
		$password = $_POST['password'];
		
		include 'v_login.php';
	}
	else
	{
		// создаем запрос на проверку логина и пароля
		$username = htmlspecialchars($_POST['username'],ENT_QUOTES);
		$password = htmlspecialchars($_POST['password'],ENT_QUOTES);
		$password = md5($password . $salt);
		
		
		$query = "SELECT *
				FROM `users`
				WHERE `user`='$username'
				AND `password`='$password'";
		
		$result = mysql_query($query) or die ("Невозможно выполнить запрос на поиск имени и пароля".mysql_error());
		if (mysql_num_rows($result) > 0) 
		{
			// устанавливаем переменные сессии
			$_SESSION['username'] = $username;
			
			while ($q = mysql_fetch_array($result))
			{
				// присваивам переменной тип пользователя (administrator, support, workers)
				$_SESSION['type'] = $q['type'];
				
				// присваиваем переменной id пользователя
				$_SESSION['id_user'] = $q['id'];
				
				
			}
			
			// перенаправление на страницу в зависимотси от типа пользователя
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
		// неправильный логин или пароль
		$alert = 'неправильный логин или пароль';
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