<?php
// ���������� ���������� ����
require 'includes/system.php';
$support_id = $_SESSION['id_user'];
$request_id = $_GET['id_request'];
$solution = $_GET['solution'];

if (isset($_GET['add_solution']))
{
	if ($_GET['solution'] == '' || strlen($_GET['solution']) > 500)
	{
echo <<<HERE
	<meta http-equiv="Refresh" content="1;URL=edit_reception.php?id=$request_id">
	<title> SELENA | ������� �����������</title>
	������... ����������� �����, ���� �� ������� �������...
	<noscript><a href="edit_reception.php?id=$request_id">�������< /noscript>
HERE;
	}
else
	{
		
// ��������� �� ������� �������
$q_exist_solution = "SELECT id 
					FROM solution
					WHERE request_id='$request_id'";
$r_exist_solution = mysql_query($q_exist_solution) or die;
if (mysql_num_rows($r_exist_solution) > 0 )
{		
	$q_update_solution = "UPDATE solution 
						SET text='$solution' 
						WHERE request_id = '$request_id' 
						AND support_id = '$support_id'";
	$r_update_solution = mysql_query($q_update_solution) or die (mysql_error());
echo <<<HERE
<meta http-equiv="Refresh" content="1;URL=edit_reception.php?id=$request_id">
<title> SELENA | ������� ��������</title>
������� ��������...
<noscript><a href="edit_reception.php?id=$request_id">�������< /noscript>
HERE;
	
}
else
{

		
// ������� ������ �� ���������� ������ � ������� comments
$query = "INSERT INTO solution (request_id,text,support_id) 
		VALUES ('$request_id','$solution','$support_id')";
$result = mysql_query($query) or die ("���������� �������� ������".mysql_error());

echo <<<HERE
<meta http-equiv="Refresh" content="1;URL=edit_reception.php?id=$request_id">
<title> SELENA | ������� �����������</title>
������� �����������...
<noscript><a href="edit_reception.php?id=$request_id">�������< /noscript>
HERE;
	}
}
}
?>
