<?php
// подключаем системыный файл
require 'includes/system.php';
$support_id = $_SESSION['id_user'];
$solution_id = $_GET['solution_id'];
$request_id = $_GET['request_id'];
if (isset($_GET['add_solution']))
{

$q_get_solution = "SELECT text
					FROM solution
					WHERE id = '$solution_id'";
$r_get_solution = mysql_query($q_get_solution) or die (mysql_error());

$result = mysql_fetch_array($r_get_solution);

$solution_text = $result[0];

// создаем запрос на добавление записи в таблицу comments
$query = "INSERT INTO solution (request_id,text,support_id)
		  VALUES ('$request_id','$solution_text','$support_id')";
		  
$result = mysql_query($query) or die ("Невоздожно добавить запись".mysql_error());

echo <<<HERE
<meta http-equiv="Refresh" content="1;URL=edit_reception.php?id=$request_id">
<title> SELENA | Решение установлено</title>
Решение установлено...
<noscript><a href="edit_reception.php?id=$request_id">Перейти< /noscript>
HERE;

}
?>
