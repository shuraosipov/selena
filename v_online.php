<?php
echo "Online<br>";
// ������� �� ������������� ������
$q_users_online = "SELECT user 
				FROM `online`,`users`
				WHERE online.user_id = users.id
				GROUP BY user
				ORDER BY user";
$r_users_online = mysql_query($q_users_online) or die("������".mysql_error());
while ($users = mysql_fetch_array($r_users_online))
{
	
	echo $users[0];
	
}
?>