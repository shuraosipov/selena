<?php
// ���������� ���������� ����
require 'includes/system.php';
$id_user = $_SESSION['id_user'];
$linkkey = $_GET['id_request'];
$text = $_GET['text'];

if (isset($_GET['add_comment']))
{
	if ($_GET['text'] == '' || strlen($_GET['text']) > 250)
	{
echo <<<HERE
	<meta http-equiv="Refresh" content="1;URL=edit_reception.php?id=$linkkey">
	<title> SELENA | ���������� �����������</title>
	������... ����������� �����, ���� �� ������� �������...
	<noscript><a href="edit_reception.php?id=$linkkey">�������< /noscript>
HERE;
	}
else
	{
// ������� ������ �� ���������� ������ � ������� comments
$query = "INSERT INTO comments (id_user,linkkey,text) 
		VALUES ('$id_user','$linkkey','$text')";
$result = mysql_query($query) or die ("���������� �������� ������".mysql_error());

echo <<<HERE
<meta http-equiv="Refresh" content="1;URL=edit_reception.php?id=$linkkey">
<title> SELENA | ���������� �����������</title>
����������� ��������...
<noscript><a href="edit_reception.php?id=$linkkey">�������< /noscript>
HERE;
	}
}
?>
