<?php
/*
* v_control.php 
* определение сотрудника, взявшего обращение на контроль
* данный модуль подкючается в модуле reception.php
*/
$q_select_control = "SELECT users.user
					FROM users,request
					WHERE users.id = '$q[7]'";
$r_select_control = mysql_query($q_select_control) or die;
$support_name = mysql_fetch_array($r_select_control);
echo $support_name[0];
?>