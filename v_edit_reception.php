<?php
// объявление переменных значения, которых получены со страница reception.php
$id_request = $_GET['id']; //id запроса
$id_user = $_SESSION['id_user']; //id пользователя

// запрос на выборку обращения из таблицы `request`,в которой id = $id_request
$query = "SELECT request.id, request.title, request.text,	request.date,	request_type.type,	
				status.type, users.user,	users.id,	status.id,	category.name, request.support_id, request.category
				
		FROM request,request_type,status,users,category
		
		WHERE request_type.id = request.type
		
		AND request.status = status.id
		
		AND request.linkkey = users.id
		
		AND request.id = '$id_request'
		
		AND request.category = category.id";

$result = mysql_query($query) 
or die ("Ошибка, неправильный запрос на получение записи из таблицы request".mysql_error());

// выводим полученную запись
while ($q = mysql_fetch_array($result))
{
$date = date('h:i:s d-m-Y',strtotime($q[3]));
echo <<<HEREDOC

<!-- Заголовок страницы -->
<p id="titlereception">
Обработка обращения от <a href="allmessages.php?id=$q[7]&username=$q[6]" title="Все сообщения от пользователя">$q[6]<a/>
</p>

<hr>

<p id="undertitle">
Изменение статуса, категории, добавление комментариев
</p>	





<!-- Открытие контейнера allreception -->
<div id="allreception">
HEREDOC;
$q_select_control = "SELECT users.user
					FROM users
					WHERE users.id = '$q[10]'";
$r_select_control = mysql_query($q_select_control) or die;
$support_name = mysql_fetch_array($r_select_control);
$control =  $support_name[0];
if (!isset($control)) $control = 'Нет'; 


echo <<<HEREDOC
		<!-- Статус обращения -->
		<div id="title">Статус:</div>	<div id="desc">$q[5]</div>
		
		<!-- Тема обращения -->
		<div id="title">Тема обращения:</div> <div id="desc">$q[1]</div>
		
		<!-- Текст обращения -->
		<div id="title">Обращение:</div> <div id="desc">$q[2]</div>
		
		 
		
		<!-- Дата размещения -->
		<div id="title">Время: </div> <div id="desc">$date</div>
		
		
		<!-- Категория -->
		<div id="title">Категория: </div> <div id="desc">$q[9]</div>
		
		<!-- Приоритет -->
		<div id="title">Приоритет: </div> <div id="desc">$q[4]</div>		
		
		<!-- Ответственный -->
		<div id="title">Ответственный: </div> <div id="desc">$control</div>	
HEREDOC;
$q_select_solution = "SELECT solution.text
					 FROM solution,request
					 WHERE solution.request_id = $id_request";
$r_select_solution = mysql_query($q_select_solution) or die;
$solution_text = mysql_fetch_array($r_select_solution);
$text = $solution_text[0];
if (!isset($text)) $text = '<div class="red">Решение отсутствует</div>'; 

echo <<<HEREDOC
		
		
		<!-- Решение -->
		<div id="title">Решение: </div> <div class="green" id="desc">$text</div>	
</div>

<!-- Предлагаемые варианты решения инцидента-->
<p id="titlereception">
Предлагаемые варианты решения:
<hr>
</p>
<p id="undertitle">
Похожие обращения
</p>	
HEREDOC;
// подключаем поисковую систему Sphinx, которая будет искать похожие обращения
// и выдавать варианты решения данного инцидента
include '1_search.php';





echo <<<HEREDOC
<!-- Создаем таблицу-контейнер, в которую помещаем обработчики статуса и категории-->
<p id="titlereception">
Изменение категории и статуса:
<hr>
</p>
		<!-- Обновление статуса-->	
		
		<form method="get" action="update_status_er.php">
		<div id="title">Статус:</div> 
		<div id="edit">
				<select name="status">
					<option value="9">Новый</option>
					<option value="8">В обработке</option>
					<option value="7">Завершен</option>
					<option value="6">В исполнении</option>
				</select>
				<input type="hidden" name="id_request" value=$id_request>
			
		</div>
		<div id="edit">	
			<input type="submit" value="Установить">	
		</div>
		</form>
		
		
		<!-- Обновление категории-->
		<form method="get" action="update_category.php">
		<div id="title">Категория:</div> 
		<div id="edit">
					<select name="category">
					<option value="0">Без категории</option>
					<option value="1">Программная ошибка</option>
					<option value="2">Аппаратная ошибка</option>
					<option value="3">Технические неисправности</option>
					<option value="4">Консультативная помощь</option>
				</select>
				<input type="hidden" name="id_request" value=$id_request>
				
		</div>
		<div id="edit">	
			<input type="submit" value="Установить">	
			
		</div>
		</form>
		
		<!-- Обновление категории-->
		<form method="get" action="update_type.php">
		<div id="title">Приоритет:</div> 
		<div id="edit">
					<select name="type">
					<option value="1">Высокий</option>
					<option value="2">Средний</option>
					<option value="3">Низкий</option>
					
				</select>
				<input type="hidden" name="id_request" value=$id_request>
				
		</div>
		<div id="edit">	
			<input type="submit" value="Установить">	
		
		</div>
		</form>
		
		<!-- Ответственный-->
		<div id="title">Ответственный:</div>
		<div id="desc"><a id="keep_control" href="update_control.php?request_id=$q[0]">Взять на контроль</a></div>
		
		<!-- Решение инцидента-->
		<form method="get" action="solution.php">
			<div id="title">Решение:</div>
			<div id="edit">
				<textarea rows="3" cols="40" wrap="hard" name="solution"></textarea>
				<input type="hidden" name="id_request" value=$id_request>
				<input type="submit" name="add_solution" value="Отправить">
			</div>
		</form>
		
		


<!-- История обработки обращения -->
<p class="under" id="titlereception">
История обработки обращения
</p>
<hr>
<p id="undertitle">
все изменения с обращением 
</p>	
HEREDOC;
$q_history = "SELECT users.user, status.type, history.date_edit
			FROM history, users,status
			WHERE request_id ='$id_request'
			AND users.id = history.editor_id
			AND status.id = history.status
			ORDER BY history.date_edit DESC
			LIMIT 0 , 30";
$r_history = mysql_query($q_history) 
	or die ("Невозможно выполнить запрос на получение истории".mysql_error());
while ($history = mysql_fetch_array($r_history)) 
{
$date = date('H:i:s d-m-Y',strtotime($history[2]));
echo <<<HEREHIST
	<div id="comments">
		 Пользователь $history[0] статус $history[1]   время $date		
	</div>
HEREHIST;
}





echo <<<HEREDOC

<p id="titlereception">
комментарии
</p>
<hr>
<p id="undertitle">
все комментарии к данному обращению
</p>	
HEREDOC;

// Выводим все комментарии к данному обращению
$query = "SELECT user,text,date
		FROM users,comments
		WHERE linkkey = '$id_request'
		AND users.id = comments.id_user
		ORDER BY date DESC"; 
$result = mysql_query($query) or die ("Невозможно выполнить вопрос".mysql_error());
while ($q = mysql_fetch_array($result))
{
$date = date('h:i:s d-m-Y',strtotime($q[2]));
echo <<<HERE
	
	<div id="comments">
		 $q[0] написал $date : $q[1] 	
		
	</div>
	

HERE;
		 
}
echo <<<HEREDOC

<!-- Отправка комментария -->
<p>Оставить комментарий</p>
	<form method="GET" action="add_comment.php">
		<textarea rows="3" cols="40" wrap="hard" name="text"></textarea>
		<input type="hidden" name="id_request" value=$id_request>
		<br><br>
		<input type="submit" name="add_comment" value="Отправить">
	</form>		


</div>
HEREDOC;
}

?>





