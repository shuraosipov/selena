<table id="workers">
<caption><a href="reception.php">��� ���������</a></caption>
<?php
$sum = 0;
// ������ ������ �� ������� ���������� ��������� � ���������� ���������
$query = "SELECT count(*),status.type,status.id
		FROM request,status
		WHERE request.status = status.id
		GROUP BY status.type";
$result = mysql_query($query) 
or die ("���������� ��������� ������ �� ��������� ���������� ����� ���������".mysql_error());

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

			// ������ ������ �� ��������� ������ ���������� ���������
				$q_all_request = "SELECT count(id) FROM `request`";
				$r_all_request = mysql_query($q_all_request) or die;
				$all_count = mysql_fetch_array($r_all_request);
				echo "����� ($all_count[0])";
			?>
	
			</td>
	</tr>


</table>
