
<div id=viewrequest>

		<table id="message">
			<tr align="center">
				<td>ID �������</td>
				<td>����� ������������</td>
				<td>������� �������</td>
				<td>���� �����������</td>
			</tr>

<?php
// ����������
$id = $_GET['id_user'];

// ������ �� ������� ������� ������������
$query = "SELECT users.id, users.user, permissions.type, users.register_date
		FROM `users`,`permissions`
		WHERE users.id = '$id'
		AND users.type = permissions.id";

$result = mysql_query($query) or die ("���������� ��������� ������ : ".mysql_error());

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
			
		<a class="button" href="reset_password.php?id_user=$id">�������� ������ | </a> &nbsp 
		<a class="button" href="delete_profile.php?id_user=$id">������� ������� | </a> &nbsp
		<a class="button" href="edit_profile.php?id_user=$id">������������� ������� | </a> &nbsp
		
HEREDOC;
}
?>
		</table>
</div>






