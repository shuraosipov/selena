<?php

/*
 * appeal.php
 * провер€ем введенные значени€ и добавл€ем обращение в базу
 * 
 */

// подключаем системный файл
include 'includes/system.php';

// подключаем файл дл€ определени€ пользователей онлайн
include 'online.php';



// устанавливаем переменным значени€ по-умолчанию
$alert = '';
$wrong_title = '';
$wrong_text = '';
$title = '';
$text = '';


// получаем данные с формы request.php
if (isset($_POST['send_request'])) 
{
	
	//провер€ем введенные данные
	
	if ($_POST['title_request'] == '' || $_POST['text_request'] == '' || strlen($_POST['title_request']) > 50 || strlen($_POST['text_request']) > 250)
	{
		// если пол€ не заполнены, тогда выдаем предупреждение
		if(($_POST['title_request']) == '') {$wrong_title = 'поле не заполнено';}
		if(($_POST['text_request']) == '') {$wrong_text = 'поле не заполнено';}

		// провер€ем длину строки, если не укладываемс€ - выдаем предупреждение
		if (strlen($_POST['title_request']) > 50) {$wrong_title = 'длина строки не больше 50 символов';}
		if (strlen($_POST['text_request']) > 250) {$wrong_text = 'длина строки не больше 250 символов';}
				
		
		$title = $_POST['title_request'];
		$text = $_POST['text_request'];
		
		include 'v_appeal.php';
	}
	else 
	{
		// если пол€ заполнены, тогда обрабатываем строки и объ€вл€ем переменные дл€ запроса 
		$title = mysql_real_escape_string($_POST['title_request']);
		$text = mysql_real_escape_string($_POST['text_request']);
		$type = $_POST['type_request'];
		$linkkey = $_POST['user_req'];
		
		// добавл€ем запись в таблицу `request`
		$query = "INSERT INTO `request` (`title`,`text`,`type`,`linkkey`)
			VALUES ('$title','$text','$type','$linkkey')";
		$result = mysql_query($query) or die ("Ќевозможно добавить запись ".mysql_error());
		
		$alert = 'обращение успешно отправлено';
		include 'v_appeal.php';
	}
	
}
else
{	
	include 'v_appeal.php';
}

?>