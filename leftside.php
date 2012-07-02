<?php
echo <<<HERE
<table id="workers">
<caption>Все пользователи</caption>
HERE;
// делаем запрос на выборку все профили с типом "пользователи" из базы
$counter = '1';
$query = "SELECT users.id,users.user
		FROM users 
		WHERE type=3
		ORDER BY user";
$result = mysql_query($query) 
or die ("Невозможно выполнить запрос на получение аккаунтов с типом ПОЛЬЗОВАТЕЛЬ ".mysql_error());

while ($r = mysql_fetch_array($result))
{


echo <<<HERE
<tr>
	<td>
	<a href="allmessages.php?id=$r[0]&username=$r[1]">$r[1]</a>
	</td>
	
HERE;
$counter++;

$q_online = "SELECT user_id
			FROM `online`
			WHERE user_id = $r[0]";
$r_online =mysql_query($q_online) 
or die ("Невозможно выполнить запрос на получение списка онлайн <br>".mysql_error());
if (mysql_num_rows($r_online) > 0)
{
	echo "<td><span id='online'>Онлайн</span></td></tr>";	
}
else 
{
	echo "<td></td></tr>";
}
}
?>

</table>
