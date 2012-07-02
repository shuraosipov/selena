<?php
// подключаем системный файл
require 'includes/system.php';

//подключаем страницу разметки
include 'v_chat.php';
?>

<div id="main">
<form method="post" id="form">
		<table>
			<tr>
				<td><label>Ваше имя</label></td>
				<td><input class="text user" id="nick" type="text" MAXLENGTH="25" /></td>
			</tr>
			<tr>
				<td><label>Сообщение</label></td>
				<td><input class="text" id="message" type="text" MAXLENGTH="255" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input id="send" type="submit" value="Отправить" /></td>
			</tr>
		</table>
	</form>
<div id="container">
<div class="content">
			<h1>Последние сообщения</h1>
			<div id="loading"><img src="css/images/loading.gif" alt="Загрузка..." /></div>
			<p>
		</div>
</div>




<?php 

?>
</div>