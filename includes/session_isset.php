<?php
/*
 * session_isset.php
 * ��������� �������� �� ������
*/

session_start();
if (!isset($_SESSION['username'])) {
header("Location: login.php");
}
else
{
	return false;	
}



?>

