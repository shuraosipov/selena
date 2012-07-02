<?php
include 'includes/system.php';

$id = $_SESSION['id_worker'];

$query = "DELETE FROM users,request
		USING users,request
		WHERE users.id = '$id'
		AND request.linkkey = '$id'";
$result = mysql_query($query) or die ("".mysql_error());
$alert = 'пользователь '.$_SESSION['login'].' удален';
$login = '';
$wrong_login = '';
include 'v_edit_profile.php';
?>
