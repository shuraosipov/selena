<?php 
$query = "SELECT request.id, request.title,
				request.text,	request.date,
				request_type.type,	status.type,
				users.user,	users.id,	status.id
		FROM request,request_type,status,users
		WHERE request_type.id = request.type
		AND request.status = status.id
		AND request.linkkey = users.id
		AND request.id = '$id_request'";

$result = mysql_query($query) or die ("������ ��������".mysql_error());
while ($q = mysql_fetch_array($result))
echo <<<HEREDOC
<div id="left">
<p>��������� ��������� �� <a href="allmessages.php?id=$q[7]" title="��� ��������� �� ������������">$q[6]<a/></p>

<fieldset>
	<legend>�: $q[0]</legend>
		
	<table id="edit_reception">
		<tr>
			<td>����:</td>
			<td>$q[1]</td>
		</tr>
		
		<tr>
			<td>������:</td>
			<td>
				<form method="GET" action="update_status.php">
					<select name="status">
						<option value="$q[8]">$q[5]</option>
						<option value="8">� ���������</option>
						<option value="7">���������</option>
						<option value="6">� ����������</option>
					</select>
			</td>
		</tr>	 
		
		<tr>
			<td>����:</td>
			<td>$q[3]</td>
		</tr>
		
		<tr>
			<td>���:</td>
			<td>$q[4]</td>
		</tr>
		
		<tr>
			<td>�����:</td>
			<td>$q[2]</td>
		</tr>

		<tr>
			<td colspan="2">
				<input type="hidden" name="id_request" value=$id_request>
				
			</td>
		</tr>
	</table>
	
</fieldset>
<br>
<input type="submit" name="update" value="���������">

</form>
<p>�������� �����������</p>

<!-- �������� ����������� -->
	<form method="GET" action="add_comment.php">
		<textarea rows="5" cols="40" wrap="hard" name="text"></textarea>
		<br>
			<input type="hidden" name="id_request" value=$id_request>
		<br><br>
		<input type="submit" name="add_comment" value="���������">
	</form>		
</div>
HEREDOC;
?>