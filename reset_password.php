<?php
// подключение файла с настройками
include 'includes/system.php';

// значения переменным
$alert = '';
$id = $_SESSION['id_worker'];
$password =md5('123' . $salt);

// запрос на обновление пароля пользователя
$query = "UPDATE `users`
		SET password = '$password'
		WHERE id = '$id'";
$result = mysql_query($query) or die ("Невозможно сбросить пароль :".mysql_error());

header("Location: profile.php?id_user=$id");

$alert = 'пароль успешно изменен на 123';
?>