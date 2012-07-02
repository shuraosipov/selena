<table id="workers">
<caption><a href="reception.php">Все обращения</a></caption>
<?php
$sum = 0;
// делаем запрос на выборку количества обращений с различными статусами
$query = "SELECT count(*),status.type,status.id
		FROM request,status
		WHERE request.status = status.id
		GROUP BY status.type";
$result = mysql_query($query) 
or die ("Невозможно выполнить запрос на получение количества новых обращений".mysql_error());

while ($status = mysql_fetch_array($result))
{
	$value = $status[0];
	echo "
	<tr>
		<td>
			<a href='request_by_status.php?status=$status[2]&type=$status[1]'>$status[1] ($status[0])</a>
		</td>
	</tr>";
}

?>
<tr>
		<td>
			<?php

			// делаем запрос на получение общего количества обращений
				$q_all_request = "SELECT count(id) FROM `request`";
				$r_all_request = mysql_query($q_all_request) or die;
				$all_count = mysql_fetch_array($r_all_request);
				echo "Всего ($all_count[0])";
			?>
	
			</td>
	</tr>


</table>
