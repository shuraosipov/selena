<?php
//��������� ����
require 'includes/system.php';
$request_id = $_GET['request_id'];
$support_id = $_SESSION['id_user'];

// ��������� id ���������� ������������ � ������� `request`
$q_update_control = "UPDATE `request`
					SET support_id = '$support_id'
					WHERE id = '$request_id'";
$r_update_control = mysql_query($q_update_control)
or die ("���������� �������� ������ �� ������������".mysql_error());
echo "<meta http-equiv='Refresh' content='3;URL=edit_reception.php?id=$request_id'>";
echo "�� ����� ��������� �� ��������";

