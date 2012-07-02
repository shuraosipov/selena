<?php
/*
 * session_isset.php
 * Проверяем началась ли сессия
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

