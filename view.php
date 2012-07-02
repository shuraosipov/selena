<?php
// подключаем системный файл
include 'includes/system.php';
// подключаем онлайн проверку
include 'online.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | Просмотр обращения</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		
			<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
		<link rel="shortcut icon" href="img/favicon.png" type="text/x-ico">
	
	</head>
	
	<body>
		
		
<!-- Создаем таблицу,в которую будет находиться наше обращение -->
<div id="container">

		<div id="header">
			<?php include 'includes/header.php';?>
		</div>


<div id=viewRequest>

<table id="view">
	<tr class="header" align="center">
		<td>Обращение</td>
		<td>Текст обращения</td>
		<td>Отправлено</td>
		<td>Пометка</td>
	</tr>
	
<?php
$id = $_GET['id_request'];

// запрос на получение просматриваемого обращения
$query = "SELECT * FROM `request`,`request_type`,`status`
			WHERE request.id = '$id'
			AND request.type = request_type.id
			AND request.status = status.id";
$result = mysql_query($query) or die;
	while ($q = mysql_fetch_array($result))
{
echo <<<HEREDOC
<tr valign="top">
	<td>$q[title]</td>
	<td>$q[text]</td>
	<td>$q[date]</td>
	<td>$q[10]</td>
</tr>
HEREDOC;
}
//я специанльо внес изменения  для github aaa
?>	

</table>
</div>
</div>
</body>
</html>