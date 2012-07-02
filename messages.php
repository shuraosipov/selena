<table id="message" align="center">
<tr align="center">
	<td>
		№ п/п
	</td>
	<td>
		Тема
	</td>
	
	<td>
		Дата обращения
	</td>
	
	<td>
		Срочность
	</td>
	
	<td>
		Статус
	</td>
	
</tr>
<?php 
$linkkey = $_SESSION['id_user'];
$query = "SELECT * FROM `request`,`request_type`,`status`
		WHERE request.linkkey = '$linkkey'
		AND request.type = request_type.id
		AND request.status = status.id
		ORDER BY request.date DESC";

$result = mysql_query($query) or die (mysql_error());
$counter = 1;
while ($r = mysql_fetch_array($result))
{
echo <<<HEREDOC

<tr>
	<td>
		<form method="get" action="view.php">
			<input type="hidden" name="id_request" value=$r[0]>
		$counter
	</td>
	<td>
		<a href="view.php?id_request=$r[0]" title="Нажмите для просмотра">$r[2]</a>
	</td>
	
	<td>
		$r[4]
	</td>
	
	<td>
		$r[10]
	</td>
	<td>
		$r[12]
		</form>	
	</td>
</tr>


HEREDOC;
$counter++;
}

?>
</table>