<?php

// ��������� ����������
$id_user = $_GET['id'];			// id ������������ ������������ ��������
$username = $_GET['username'];	// id ���������� ������������

// ���������� ��������
include 'paged_user.php';


?>


<p id="titlereception">
	<?php 

	// ���������� ��������� �� ������������
	$q_count_req_user = "SELECT count(id) FROM `request` WHERE `linkkey` = '$id_user'";
	$r_count_req_user = mysql_query($q_count_req_user);
	$request_count = mysql_fetch_array($r_count_req_user);

		echo "��������� �� $username($request_count[0])";?>
</p>

<hr>

<p id="undertitle">
��� ���������, ������������ �����������
</p>

<?php

// ������ �� ��������� ���� ��������� ������������ �������������
$query = "SELECT request.id,
			 	 title, 
				 status.type, 
				 request_type.type, 
				 request.date,
				 users.user,
				 status.id,
				 request.support_id
				 
		FROM request,status, request_type,users
		
		WHERE linkkey = '$id_user'
		
		AND users.id = '$id_user'
		
		AND request.status = status.id
		
		AND request.type = request_type.id
		
		GROUP BY title
		
		ORDER BY date DESC
		
		LIMIT $start,$record_per_page";

$result = mysql_query($query) or die ("<p>������ � ������� �1</p>".mysql_error());
if (mysql_num_rows($result) == 0)
{
	echo "��� �� ������ ��������� �� ������������";
}
else 
{	
	// ������� ������ ���� ��������� �� ������������
	while ($q = mysql_fetch_array($result))
	{

	// ������������ ���� � ����� ������� ���� ���:������:������� ����-�����-���
	$date = date('H:i:s d-m-y',strtotime($q[4]));
		
	
	
echo <<<HEREDOC
	<div id="allreception">
HEREDOC;

	// ������� ��� ����������,�������� �� �������� ���������
	echo "<p id='counter'>����� �� ��������:";
	
	// ���������� ������ v_contol.php. � ������� �� ��������� ����������, 
	// �������� ��������� �� ��������
	include 'v_control.php';
	
	echo "</p>";

echo <<<HEREDOC
	
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
		
		switch ($q[2]) {
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
<!-- ������ �� �������� edit_reception.php, � ������� ���������� �������� ��������� id-->
<!-- ���� ���������-->
	
			
<!-- ������ ��� ��������� ������� � �������� ��������� -->					
	<a class="delete" href="update_status_oneuser.php?id_request=$q[0]&status=7&id=$id_user&username=$username"" title="�������� ������ �� ���������">[���������]</a>
	<a class="delete" href="update_status_oneuser.php?id_request=$q[0]&status=9&id=$id_user&username=$username" title="�������� ������ �� �����">[�����]</a>
	<a class="delete" href="update_status_oneuser.php?id_request=$q[0]&status=6&id=$id_user&username=$username"" title="�������� ������ �� � ����������">[� ����������]</a>
	<a class="delete" href="update_status_oneuser.php?id_request=$q[0]&status=8&id=$id_user&username=$username"" title="�������� ������ �� � ���������">[� ���������]</a>
	<a class="delete" href="delete_reception.php?id=$q[0]">[�������]</a>
			
		</li>
		</ul>
HEREDOC;
	// ���������� ������������
		$sql = "SELECT count( linkkey )
				FROM comments
				WHERE linkkey ='$q[0]'";
		$r = mysql_query($sql) or die ("������ 2".mysql_error());
		$count = mysql_fetch_array($r);
echo <<<HEREDOC
	
		<p id="counter">������������: $count[0]<p>
		<hr>
	
	</div>
HEREDOC;
	
	}
}

// ������� ���������
echo "<div id=\"paginator\">";
if ($pages >=1 && $page <=$pages)
{
	echo "<a id=\"first_page\" href=\"?page=1&id=$id_user&username=$username\">�� ������</a>";
	for ($x=$left_neighbor;$x<=$right_neighbor;$x++)
	{
		if ($x == $page)
		{
			echo "<span id=\"current_page\">$x</span>";
		}
		else 
		{
			echo "<span id=\"pages\"><a href=\"?page=$x&id=$id_user&username=$username\">$x</a></span>"." ";
		}
	} 
	echo "<a id=\"last_page\" href=\"?page=$pages&id=$id_user&username=$username\">�� ��������� ($pages)</a>";
}
echo "</div>";


?>
