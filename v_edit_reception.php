<?php
// ���������� ���������� ��������, ������� �������� �� �������� reception.php
$id_request = $_GET['id']; //id �������
$id_user = $_SESSION['id_user']; //id ������������

// ������ �� ������� ��������� �� ������� `request`,� ������� id = $id_request
$query = "SELECT request.id, request.title, request.text,	request.date,	request_type.type,	
				status.type, users.user,	users.id,	status.id,	category.name, request.support_id, request.category
				
		FROM request,request_type,status,users,category
		
		WHERE request_type.id = request.type
		
		AND request.status = status.id
		
		AND request.linkkey = users.id
		
		AND request.id = '$id_request'
		
		AND request.category = category.id";

$result = mysql_query($query) 
or die ("������, ������������ ������ �� ��������� ������ �� ������� request".mysql_error());

// ������� ���������� ������
while ($q = mysql_fetch_array($result))
{
$date = date('h:i:s d-m-Y',strtotime($q[3]));
echo <<<HEREDOC

<!-- ��������� �������� -->
<p id="titlereception">
��������� ��������� �� <a href="allmessages.php?id=$q[7]&username=$q[6]" title="��� ��������� �� ������������">$q[6]<a/>
</p>

<hr>

<p id="undertitle">
��������� �������, ���������, ���������� ������������
</p>	





<!-- �������� ���������� allreception -->
<div id="allreception">
HEREDOC;
$q_select_control = "SELECT users.user
					FROM users
					WHERE users.id = '$q[10]'";
$r_select_control = mysql_query($q_select_control) or die;
$support_name = mysql_fetch_array($r_select_control);
$control =  $support_name[0];
if (!isset($control)) $control = '���'; 


echo <<<HEREDOC
		<!-- ������ ��������� -->
		<div id="title">������:</div>	<div id="desc">$q[5]</div>
		
		<!-- ���� ��������� -->
		<div id="title">���� ���������:</div> <div id="desc">$q[1]</div>
		
		<!-- ����� ��������� -->
		<div id="title">���������:</div> <div id="desc">$q[2]</div>
		
		 
		
		<!-- ���� ���������� -->
		<div id="title">�����: </div> <div id="desc">$date</div>
		
		
		<!-- ��������� -->
		<div id="title">���������: </div> <div id="desc">$q[9]</div>
		
		<!-- ��������� -->
		<div id="title">���������: </div> <div id="desc">$q[4]</div>		
		
		<!-- ������������� -->
		<div id="title">�������������: </div> <div id="desc">$control</div>	
HEREDOC;
$q_select_solution = "SELECT solution.text
					 FROM solution,request
					 WHERE solution.request_id = $id_request";
$r_select_solution = mysql_query($q_select_solution) or die;
$solution_text = mysql_fetch_array($r_select_solution);
$text = $solution_text[0];
if (!isset($text)) $text = '<div class="red">������� �����������</div>'; 

echo <<<HEREDOC
		
		
		<!-- ������� -->
		<div id="title">�������: </div> <div class="green" id="desc">$text</div>	
</div>

<!-- ������������ �������� ������� ���������-->
<p id="titlereception">
������������ �������� �������:
<hr>
</p>
<p id="undertitle">
������� ���������
</p>	
HEREDOC;
// ���������� ��������� ������� Sphinx, ������� ����� ������ ������� ���������
// � �������� �������� ������� ������� ���������
include '1_search.php';





echo <<<HEREDOC
<!-- ������� �������-���������, � ������� �������� ����������� ������� � ���������-->
<p id="titlereception">
��������� ��������� � �������:
<hr>
</p>
		<!-- ���������� �������-->	
		
		<form method="get" action="update_status_er.php">
		<div id="title">������:</div> 
		<div id="edit">
				<select name="status">
					<option value="9">�����</option>
					<option value="8">� ���������</option>
					<option value="7">��������</option>
					<option value="6">� ����������</option>
				</select>
				<input type="hidden" name="id_request" value=$id_request>
			
		</div>
		<div id="edit">	
			<input type="submit" value="����������">	
		</div>
		</form>
		
		
		<!-- ���������� ���������-->
		<form method="get" action="update_category.php">
		<div id="title">���������:</div> 
		<div id="edit">
					<select name="category">
					<option value="0">��� ���������</option>
					<option value="1">����������� ������</option>
					<option value="2">���������� ������</option>
					<option value="3">����������� �������������</option>
					<option value="4">��������������� ������</option>
				</select>
				<input type="hidden" name="id_request" value=$id_request>
				
		</div>
		<div id="edit">	
			<input type="submit" value="����������">	
			
		</div>
		</form>
		
		<!-- ���������� ���������-->
		<form method="get" action="update_type.php">
		<div id="title">���������:</div> 
		<div id="edit">
					<select name="type">
					<option value="1">�������</option>
					<option value="2">�������</option>
					<option value="3">������</option>
					
				</select>
				<input type="hidden" name="id_request" value=$id_request>
				
		</div>
		<div id="edit">	
			<input type="submit" value="����������">	
		
		</div>
		</form>
		
		<!-- �������������-->
		<div id="title">�������������:</div>
		<div id="desc"><a id="keep_control" href="update_control.php?request_id=$q[0]">����� �� ��������</a></div>
		
		<!-- ������� ���������-->
		<form method="get" action="solution.php">
			<div id="title">�������:</div>
			<div id="edit">
				<textarea rows="3" cols="40" wrap="hard" name="solution"></textarea>
				<input type="hidden" name="id_request" value=$id_request>
				<input type="submit" name="add_solution" value="���������">
			</div>
		</form>
		
		


<!-- ������� ��������� ��������� -->
<p class="under" id="titlereception">
������� ��������� ���������
</p>
<hr>
<p id="undertitle">
��� ��������� � ���������� 
</p>	
HEREDOC;
$q_history = "SELECT users.user, status.type, history.date_edit
			FROM history, users,status
			WHERE request_id ='$id_request'
			AND users.id = history.editor_id
			AND status.id = history.status
			ORDER BY history.date_edit DESC
			LIMIT 0 , 30";
$r_history = mysql_query($q_history) 
	or die ("���������� ��������� ������ �� ��������� �������".mysql_error());
while ($history = mysql_fetch_array($r_history)) 
{
$date = date('H:i:s d-m-Y',strtotime($history[2]));
echo <<<HEREHIST
	<div id="comments">
		 ������������ $history[0] ������ $history[1]   ����� $date		
	</div>
HEREHIST;
}





echo <<<HEREDOC

<p id="titlereception">
�����������
</p>
<hr>
<p id="undertitle">
��� ����������� � ������� ���������
</p>	
HEREDOC;

// ������� ��� ����������� � ������� ���������
$query = "SELECT user,text,date
		FROM users,comments
		WHERE linkkey = '$id_request'
		AND users.id = comments.id_user
		ORDER BY date DESC"; 
$result = mysql_query($query) or die ("���������� ��������� ������".mysql_error());
while ($q = mysql_fetch_array($result))
{
$date = date('h:i:s d-m-Y',strtotime($q[2]));
echo <<<HERE
	
	<div id="comments">
		 $q[0] ������� $date : $q[1] 	
		
	</div>
	

HERE;
		 
}
echo <<<HEREDOC

<!-- �������� ����������� -->
<p>�������� �����������</p>
	<form method="GET" action="add_comment.php">
		<textarea rows="3" cols="40" wrap="hard" name="text"></textarea>
		<input type="hidden" name="id_request" value=$id_request>
		<br><br>
		<input type="submit" name="add_comment" value="���������">
	</form>		


</div>
HEREDOC;
}

?>





