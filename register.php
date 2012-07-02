<?php
session_start();
include 'includes/db.php';
include 'includes/config.php';

$alert = '';
$wrong_username = '';
$wrong_password = '';

if (isset($_POST['register']))
{
	// проверка на заполнение полей
	if ($_POST['username'] == '' || $_POST['password']== '' || $_POST['password1']== '')
	{
		$wrong_username = 'не заполнено';
		$wrong_password = 'не заполнено';
		
		include 'v_register.php';
	}
	else
	{
		
		// создаем запрос на проверку логина и пароля
		$username = htmlspecialchars($_POST['username'],ENT_QUOTES);
		$password = htmlspecialchars($_POST['password'],ENT_QUOTES);
		$password1 = htmlspecialchars($_POST['password1'],ENT_QUOTES);
		
		
		// сравниваем введенные пароли
		if ($password != $password1)
		{
			$alert = 'введенные пароли не совпадают';
			include 'v_register.php';
		}
		else 
		{
			$password = md5($password . $salt);
			
			
			$query = "SELECT *
					FROM `users`
					WHERE `user`='$username'";
			
			$result = mysql_query($query) or die ("Невозможно выполнить запрос на поиск имени и пароля".mysql_error());
			if (mysql_num_rows($result) > 0) 
			{
				// выдаем сообщение о наличие такого логина
				$alert = 'пользователь с таким именем уже существует';
				include 'v_register.php';
				
			}
			else
			{
				// добавляем данные в базу
			$query  = "INSERT INTO `users` (`user`,`password`)
					VALUES ('$username','$password')";
			$result = mysql_query($query) or die ("Невозможно добавить данные : ".mysql_error());
			$alert = "Вы успешно зарегистрировались<br><a href=\"login.php\">Теперь вы можете войти в систему</a>";
			 
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