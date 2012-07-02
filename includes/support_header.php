<?php 
// делаем запрос на получение количества удаленных сообщений
$q_rem_request = "SELECT count(id) FROM `trash_request`";
$r_rem_request = mysql_query($q_rem_request) or die (mysql_error());
$rem_count = mysql_fetch_array($r_rem_request);

?>
<div id="logo">
	SELENA
</div>
<div id="navcontainer"> 

	<a class="button" href="reception.php">Обращения</a>
	<a class="button" href="appeal.php">Заявка</a>
	<a class="button" href="reports.php">Статистика</a>
	<a class="button" href="statement.php">Отчеты</a>
	<a class="button" href="recyclebin.php">Корзина (<?php echo $rem_count[0]?>)</a>

</div>
<div id="quit">
		<a class="button" href="logout.php">Выйти</a>
</div>


<div id="name">
	<?php   echo $username = $_SESSION['username'];?>	
</div>


					
				
	