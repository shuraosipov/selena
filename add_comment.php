<?php
// подключаем системыный файл
require 'includes/system.php';
$id_user = $_SESSION['id_user'];
$linkkey = $_GET['id_request'];
$text = $_GET['text'];

if (isset($_GET['add_comment']))
{
	if ($_GET['text'] == '' || strlen($_GET['text']) > 250)
	{
echo <<<HERE
	<meta http-equiv="Refresh" content="1;URL=edit_reception.php?id=$linkkey">
	<title> SELENA | Добавление комментария</title>
	Ошибка... Отсутствует текст, либо он слишком длинный...
	<noscript><a href="edit_reception.php?id=$linkkey">Перейти< /noscript>
HERE;
	}
else
	{
// создаем запрос на добавление записи в таблицу comments
$query = "INSERT INTO comments (id_user,linkkey,text) 
		VALUES ('$id_user','$linkkey','$text')";
$result = mysql_query($query) or die ("Невоздожно добавить запись".mysql_error());

echo <<<HERE
<meta http-equiv="Refresh" content="1;URL=edit_reception.php?id=$linkkey">
<title> SELENA | Добавление комментария</title>
Комментарий добавлен...
<noscript><a href="edit_reception.php?id=$linkkey">Перейти< /noscript>
HERE;
	}
}
?>
