<!-- ��������� � ���������� � ����� �������� -->
<p id="titlereception">	��������� �������������</p>

<hr>

<p id="undertitle">	���� ��������� ����������� </p>
<!----------------------------------------->
<?php

// ������ �� ������� ���� ������� �� ������� `request` � ������������ �� ���� � �������� �������
// LIMIT ������ ��� ������������ ������ ������
// $start, $record_per_page ������� �� ������������� ����� paged.php
$query = "SELECT request.id, 
				request.title,
				request.date,
				request_type.type,
				status.type,
				users.user,
				users.id,
				request.support_id

		FROM request,request_type,status,users
				
		WHERE request_type.id = request.type
		
		AND request.status = status.id
		
		AND request.linkkey = users.id
		
		ORDER BY date DESC
		
		LIMIT $start,$record_per_page";

$result = mysql_query($query) 
or die ("������, ������������ ������ �� ��������� ���� ������� �� ������� request: ".mysql_error());


// ������� ������ ���� ���������� ������� ����� �������
while ($q = mysql_fetch_array($result))
{
	
// ������������ ���� � ����� ������� ���� ���:������:������� ����-�����-���
$date = date('H:i:s d-m-y',strtotime($q[2]));


echo <<<HEREDOC

<!-- �������� ���������� allreception, ���� ���������� ��� ���������-->


<div id="allreception">
HEREDOC;




echo "</p>";
// ������� ��� ����������,�������� �� �������� ���������
	echo "<p id='counter'>����� �� ��������:";
	
	// ���������� ������ v_contol.php. � ������� �� ��������� ����������, 
	// �������� ��������� �� ��������
	include 'v_control.php';
	
	echo "</p>";


echo <<<HEREDOC
<!-- ���������, � ������� ��������� ���������-->

		
	<!-- ������ �� �������� edit_reception.php, � ������� ���������� �������� ��������� id-->
	<a class="reception" href="edit_reception.php?id=$q[0]" title="�������� ���������">
	
		<!-- ��� ������������ -->	
		<div id="user_request">
			$q[5] 
		</div>
		
		<!-- ���� ���������-->
			$q[1] 
				
	
	<!-- ���� � ����� ��������� -->
		<div id="type_request">	
			$date 
		</div>
	</a>



<ul>
	<li>
		
HEREDOC;

// ���������� ������������ ������ � ����������� �� ������� ��������� 
		switch ($q[4])
		{
			case "�����":
			echo "<image id='img' src='img/bell.png' title='����� ���������'>";
			break;
			
			case "� ���������":
			echo "<image id='img'src='img/loading.png' title='� ���������'>";
			break;
			
			case "���������":
			echo "<image id='img'src='img/complete.png' title='���������'>";;
			break;
			
			case "� ����������":
			echo "<image id='img'src='img/gears.png' title='� ����������'>";;
			break;
			
			default:
				;
			break;
		}
		
echo <<<HEREDOC
		

<!-- ������ ��� ��������� ������� � �������� ��������� -->
		<a class="delete" href="update_status.php?id_request=$q[0]&status=7" title="�������� ������ �� ���������">[���������]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=9" title="�������� ������ �� �����">[�����]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=6" title="�������� ������ �� � ����������">[� ����������]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=8" title="�������� ������ �� � ���������">[� ���������]</a>
		<a class="delete" href="delete_reception.php?id=$q[0]" title="������� ���������">[�������]</a>
	</li>
</ul>
HEREDOC;

// ���������� ���������� ������������ ��� ������� ���������
$sql = "SELECT count( linkkey )
			FROM comments
			WHERE linkkey ='$q[0]'";
$r = mysql_query($sql) or die ("������ 2".mysql_error());
$count = mysql_fetch_array($r);

echo <<<HEREDOC
	<p id="counter">������������: $count[0]<p>
	<hr>

<!-- �������� ���������� allreception -->
</div>
HEREDOC;

}


// ������� ���������
echo "<div id=\"paginator\">";
if ($pages >=1 && $page <=$pages)
{
	echo "<a id=\"first_page\" href=\"?page=1\">�� ������</a>";
	for ($x=$left_neighbor;$x<=$right_neighbor;$x++)
	{
		if ($x == $page)
		{
			echo "<span id=\"current_page\">$x</span>";
		}
		else 
		{
			echo "<span id=\"pages\"><a href=\"?page=$x\">$x</a></span>"." ";
		}
	} 
	echo "<a id=\"last_page\" href=\"?page=$pages\">�� ��������� ($pages)</a>";
}
echo "</div>";

mysql_close();
?>

