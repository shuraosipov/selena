<?php
include 'includes/system.php';
$alert = '';
$wrong_login ='';
$wrong_length = '';
$wrong_username = '';
$wrong_password = '';
$id_user = $_SESSION['id_worker'];
$login = $_SESSION['login']; 

if (isset($_POST['submit']))
{
	if ($_POST['login'] == '' || strlen($_POST['login']) > 32)
	{
		$wrong_login = 'логин заполнен неверно';	
		include 'v_edit_profile.php';
		
	}	
	else 
	{
		$login = mysql_real_escape_string($_POST['login']);
		$type = mysql_real_escape_string($_POST['id_permissions']);
		
		$query = "UPDATE `users` 
				SET user = '$login', type='$type'
				WHERE id = '$id_user'";
		$result = mysql_query($query) or die ("Невозможно выполнить запрос . ".mysql_error());
		$alert = 'запись успешно обновлена';
		include 'v_edit_profile.php';
			
	}	

}
else 
{
	include 'v_edit_profile.php';
}
?>
