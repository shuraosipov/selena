<!-- Заголовок с пояснением в верху страницы -->
<p id="titlereception">	Удаленные обращения</p>

<hr>

<p id="undertitle">	База удаленных обращений сотрудников </p>
<!----------------------------------------->
<?php

// Запрос на выборку всех записей из таблицы `request` с группировкой по дате в обратном порядке
// LIMIT указан для посраничного вывода данных
// $start, $record_per_page берутся из подключенного файла paged.php
$query = "SELECT trash_request.id, 
				trash_request.title,
				trash_request.date,
				request_type.type,
				status.type,
				users.user,
				users.id,
				trash_request.support_id

		FROM trash_request,request_type,status,users
				
		WHERE request_type.id = trash_request.type
		
		AND trash_request.status = status.id
		
		AND trash_request.linkkey = users.id
		
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

// выводим имя сотрудника,взявшего на контроль обращения
echo "<p id='counter'>Взято на контроль:";

// подключаем модуль v_contol.php. в котором мы опредеяем сотрудника, 
// взявшего обращение на контроль
include 'v_control.php';

echo "</p>";



echo <<<HEREDOC
<!-- Контейтер, в котором выводится обращение-->
<div id="header_h">
		
	<!-- Номер обращения -->
		<div id="number_request">
			№ $q[0]
		</div>
	
	<!-- Статус обращения -->			
		<div id="status_request">
			$q[4]
		</div>
	
	<!-- Имя пользователя -->	
		<div id="user_request">
			От кого : $q[5] 
		</div>
	
	<!-- Дата и время обращения -->
		<div id="type_request">	
			$date 
		</div>
</div>



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
		
<!-- Ссылка на страницу edit_reception.php, в которой передается значенеи параметра id-->
<!-- Тема обращения-->
		$q[1]
		<br>		
<!-- Ссылки для изменения статуса и удаления обращения -->
		<a class="delete" href="recover_reception.php?id=$q[0]" title="восстановить">[Восстановить]</a>
	</li>
</ul>
HEREDOC;

// показываем количество комментариев для каждого обращения
$sql = "SELECT count( linkkey )
			FROM trash_comments
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
