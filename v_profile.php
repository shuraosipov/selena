
<div id=viewrequest>

		<table id="message">
			<tr align="center">
				<td>ID профиля</td>
				<td>Логин пользователя</td>
				<td>Уровень доступа</td>
				<td>Дата регистрации</td>
			</tr>

<?php
// переменные
$id = $_GET['id_user'];

// запрос на выборку профиля пользователя
$query = "SELECT users.id, users.user, permissions.type, users.register_date
		FROM `users`,`permissions`
		WHERE users.id = '$id'
		AND users.type = permissions.id";

$result = mysql_query($query) or die ("Невозможно выполнить запрос : ".mysql_error());

while ($q = mysql_fetch_array($result))
{
	$_SESSION['login'] = $q[1];
	$_SESSION['id_worker'] = $q[0];
	$id = $q[0];
echo <<<HEREDOC
	
			<tr align="center">
				<td>$q[0]</td>
				<td>$q[1]</td>
				<td>$q[2]</td>
				<td>$q[3]</td>
			</tr>
			
		<a class="button" href="reset_password.php?id_user=$id">Сбросить пароль | </a> &nbsp 
		<a class="button" href="delete_profile.php?id_user=$id">Удалить профиль | </a> &nbsp
		<a class="button" href="edit_profile.php?id_user=$id">Редактировать профиль | </a> &nbsp
		
HEREDOC;
}
?>
		</table>
</div>






