<?php

// объявляем переменные
$id_user = $_GET['id'];			// id пользователя отправившего обащение
$username = $_GET['username'];	// id сотрудника техподдержки

// подключаем листалку
include 'paged_user.php';


?>


<p id="titlereception">
	<?php 

	// количество обращений от пользователя
	$q_count_req_user = "SELECT count(id) FROM `request` WHERE `linkkey` = '$id_user'";
	$r_count_req_user = mysql_query($q_count_req_user);
	$request_count = mysql_fetch_array($r_count_req_user);

		echo "Обращения от $username($request_count[0])";?>
</p>

<hr>

<p id="undertitle">
все обращения, отправленные сотрудником
</p>

<?php

// запрос на получение всех обращений отправленных пользователем
$query = "SELECT request.id,
			 	 title, 
				 status.type, 
				 request_type.type, 
				 request.date,
				 users.user,
				 status.id,
				 request.support_id
				 
		FROM request,status, request_type,users
		
		WHERE linkkey = '$id_user'
		
		AND users.id = '$id_user'
		
		AND request.status = status.id
		
		AND request.type = request_type.id
		
		GROUP BY title
		
		ORDER BY date DESC
		
		LIMIT $start,$record_per_page";

$result = mysql_query($query) or die ("<p>Ошибка в запросе №1</p>".mysql_error());
if (mysql_num_rows($result) == 0)
{
	echo "Нет ни одного обращения от пользователя";
}
else 
{	
	// выводим список всех обращений от пользователя
	while ($q = mysql_fetch_array($result))
	{

	// представляем дату в более удобном виде Час:Минута:Секунда день-месяц-год
	$date = date('H:i:s d-m-y',strtotime($q[4]));
		
	
	
echo <<<HEREDOC
	<div id="allreception">
HEREDOC;

	// выводим имя сотрудника,взявшего на контроль обращения
	echo "<p id='counter'>Взято на контроль:";
	
	// подключаем модуль v_contol.php. в котором мы опредеяем сотрудника, 
	// взявшего обращение на контроль
	include 'v_control.php';
	
	echo "</p>";

echo <<<HEREDOC
	
	<!-- Ссылка на страницу edit_reception.php, в которой передается значенеи параметра id-->
	<a class="reception" href="edit_reception.php?id=$q[0]" title="просмотр обращения">
	
		<!-- Имя пользователя -->	
		<div id="user_request">
			$q[5] 
		</div>
		
		<!-- Тема обращения-->
			$q[1] 
				
	
	<!-- Дата и время обращения -->
		<div id="type_request">	
			$date 
		</div>
	</a>


	<ul>
		<li>
HEREDOC;
		
		switch ($q[2]) {
			case "новый":
			echo "<image id='img' src='img/bell.png' title='Новое обращение'>";
			break;
			
			case "в обработке":
			echo "<image id='img'src='img/loading.png' title='В обработке'>";
			break;
			
			case "завершено":
			echo "<image id='img'src='img/complete.png' title='Завершено'>";;
			break;
			
			case "в исполнении":
			echo "<image id='img'src='img/gears.png' title='В исполнении'>";;
			break;
			
			default:
				;
			break;
		}



echo <<<HEREDOC
<!-- Ссылка на страницу edit_reception.php, в которой передается значенеи параметра id-->
<!-- Тема обращения-->
	
			
<!-- Ссылки для изменения статуса и удаления обращения -->					
	<a class="delete" href="update_status_oneuser.php?id_request=$q[0]&status=7&id=$id_user&username=$username"" title="изменить статус на завершено">[Завершить]</a>
	<a class="delete" href="update_status_oneuser.php?id_request=$q[0]&status=9&id=$id_user&username=$username" title="изменить статус на новый">[Новый]</a>
	<a class="delete" href="update_status_oneuser.php?id_request=$q[0]&status=6&id=$id_user&username=$username"" title="изменить статус на в исполнении">[В исполнении]</a>
	<a class="delete" href="update_status_oneuser.php?id_request=$q[0]&status=8&id=$id_user&username=$username"" title="изменить статус на в обработке">[В обработке]</a>
	<a class="delete" href="delete_reception.php?id=$q[0]">[Удалить]</a>
			
		</li>
		</ul>
HEREDOC;
	// количество комментариев
		$sql = "SELECT count( linkkey )
				FROM comments
				WHERE linkkey ='$q[0]'";
		$r = mysql_query($sql) or die ("Ошибка 2".mysql_error());
		$count = mysql_fetch_array($r);
echo <<<HEREDOC
	
		<p id="counter">Комментариев: $count[0]<p>
		<hr>
	
	</div>
HEREDOC;
	
	}
}

// Выводим пагинатор
echo "<div id=\"paginator\">";
if ($pages >=1 && $page <=$pages)
{
	echo "<a id=\"first_page\" href=\"?page=1&id=$id_user&username=$username\">На первую</a>";
	for ($x=$left_neighbor;$x<=$right_neighbor;$x++)
	{
		if ($x == $page)
		{
			echo "<span id=\"current_page\">$x</span>";
		}
		else 
		{
			echo "<span id=\"pages\"><a href=\"?page=$x&id=$id_user&username=$username\">$x</a></span>"." ";
		}
	} 
	echo "<a id=\"last_page\" href=\"?page=$pages&id=$id_user&username=$username\">На последнюю ($pages)</a>";
}
echo "</div>";


?>
