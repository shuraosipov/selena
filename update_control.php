<?php
//системный файл
require 'includes/system.php';
$request_id = $_GET['request_id'];
$support_id = $_SESSION['id_user'];

// обновляем id сотрудника техподдержки в таблице `request`
$q_update_control = "UPDATE `request`
					SET support_id = '$support_id'
					WHERE id = '$request_id'";
$r_update_control = mysql_query($q_update_control)
or die ("Невозможно обновить данные по техноддержке".mysql_error());
echo "<meta http-equiv='Refresh' content='3;URL=edit_reception.php?id=$request_id'>";
echo "Вы взяли обращение на контроль";

