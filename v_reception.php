<!-- Заголовок с пояснением в верху страницы -->
<p id="titlereception">	Обращения пользователей</p>

<hr>

<p id="undertitle">	База обращений сотрудников </p>
<!----------------------------------------->
<?php

// Запрос на выборку всех записей из таблицы `request` с группировкой по дате в обратном порядке
// LIMIT указан для посраничного вывода данных
// $start, $record_per_page берутся из подключенного файла paged.php
$query = "SELECT request.id, 
				request.title,
				request.date,
				request_type.type,
				status.type,
				users.user,
				users.id,
				request.support_id

		FROM request,request_type,status,users
				
		WHERE request_type.id = request.type
		
		AND request.status = status.id
		
		AND request.linkkey = users.id
		
		ORDER BY date DESC
		
		LIMIT $start,$record_per_page";

$result = mysql_query($query) 
or die ("Ошибка, неправильный запрос на получение всех записей из таблицы request: ".mysql_error());


// выводим список всех полученных записей после запроса
while ($q = mysql_fetch_array($result))
{
	
// представляем дату в более удобном виде Час:Минута:Секунда день-месяц-год
$date = date('H:i:s d-m-y',strtotime($q[2]));


echo <<<HEREDOC

<!-- Открытие контейнера allreception, куда помещаются все обращения-->


<div id="allreception">
HEREDOC;




echo "</p>";
// выводим имя сотрудника,взявшего на контроль обращения
	echo "<p id='counter'>Взято на контроль:";
	
	// подключаем модуль v_contol.php. в котором мы опредеяем сотрудника, 
	// взявшего обращение на контроль
	include 'v_control.php';
	
	echo "</p>";


echo <<<HEREDOC
<!-- Контейтер, в котором выводится обращение-->

		
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

// показываем определенные значок в зависимости от статуса обращения 
		switch ($q[4])
		{
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
		

<!-- Ссылки для изменения статуса и удаления обращения -->
		<a class="delete" href="update_status.php?id_request=$q[0]&status=7" title="изменить статус на завершено">[Завершить]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=9" title="изменить статус на новый">[Новый]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=6" title="изменить статус на в исполнении">[В исполнении]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=8" title="изменить статус на в обработке">[В обработке]</a>
		<a class="delete" href="delete_reception.php?id=$q[0]" title="удалить обращение">[Удалить]</a>
	</li>
</ul>
HEREDOC;

// показываем количество комментариев для каждого обращения
$sql = "SELECT count( linkkey )
			FROM comments
			WHERE linkkey ='$q[0]'";
$r = mysql_query($sql) or die ("Ошибка 2".mysql_error());
$count = mysql_fetch_array($r);

echo <<<HEREDOC
	<p id="counter">Комментариев: $count[0]<p>
	<hr>

<!-- Закрытие контейнера allreception -->
</div>
HEREDOC;

}


// Выводим пагинатор
echo "<div id=\"paginator\">";
if ($pages >=1 && $page <=$pages)
{
	echo "<a id=\"first_page\" href=\"?page=1\">На первую</a>";
	for ($x=$left_neighbor;$x<=$right_neighbor;$x++)
	{
		if ($x == $page)
		{
			echo "<span id=\"current_page\">$x</span>";
		}
		else 
		{
			echo "<span id=\"pages\"><a href=\"?page=$x\">$x</a></span>"." ";
		}
	} 
	echo "<a id=\"last_page\" href=\"?page=$pages\">На последнюю ($pages)</a>";
}
echo "</div>";

mysql_close();
?>

