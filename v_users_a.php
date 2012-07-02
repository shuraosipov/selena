<div id="content1">
	<table id="message">
		<tr align="center">
			<td>№</td>
			<td>Имя пользователя</td>
			<td>Тип пользователя</td>
		</tr>
	
<?php
// запрос на выборку всех пользователей
	$query = "SELECT users.id,users.user,permissions.type
			FROM `users`,`permissions`
			WHERE users.type = permissions.id";
	$result = mysql_query($query) or die ("Невозможно выполнить запрос".mysql_error());
	while ($q = mysql_fetch_array($result))
	{
	
echo <<<HEREDOC
		<tr align="center">
			<td>
				<form method="GET" action="profile.php">
				<input type="hidden" name="id_user" value=$q[id]>
				$q[id]
			</td>
			<td>
				<a href="profile.php?id_user=$q[id]">
				$q[user]</a>
			</td>
			<td>
				$q[type]
				</form>
			</td>
		</tr>
HEREDOC;
	}
?>
	</table>
</div>


