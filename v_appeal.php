<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | Сформировать обращение</title>
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
					
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
		<link rel="shortcut icon" href="img/favicon.png" type="text/x-ico">
		
		
				
	
	</head>
<body>

<div id="container">
<!-- Подключаем шапку -->
<div id="header">
<?php include 'includes/support_header.php';?>
</div>

<!-- Всплывающее сообщение об ошибке над формой отправки обращения-->
	<div id="error">
		<?php echo $alert;?>
	</div>
	
<!-- Форма отправки запроса в верхней части экрана-->	
	<div id="content1">
			<form method="post" action="appeal.php">
				
						<div id="request_header">Тема *</div>
					
						<div id="request_title"><input type="text"  name="title_request" value="<?php echo $title;?>"></div>
							
							<div id="alert"><?php echo $wrong_title;?></div>
						
						
						
						<div id="request_header">Обращение *</div>
						
						
						<div id="request_text">	
						<input id="rqs_text" type="text" name="text_request" ></div>
							<div id="alert"><?php echo $wrong_text;?></div>
						
						<div id="request_header">Пользователь</div>
						<div id="request_title">
						<select name="user_req">
						<?php 
							
							$q_sel_user = "SELECT id,user
											FROM users";
							$r_sel_user = mysql_query($q_sel_user) or die (mysql_error());
							while ($result = mysql_fetch_array($r_sel_user))
							{
								echo "<option value=$result[0]>$result[1]</option>";
							}
							
						?>
						</select>
						</div>
						
						
						
						<div id="request_type">
							<label><input type="radio" name="type_request" value="1">Высокий</label>
							<label><input type="radio" name="type_request" value="2">Средний</label>
							<label><input type="radio" name="type_request" value="3" checked="checked">Низкий</label>
						</div>
						
						
						
						
						
						<div id="request_button">
							<input type="submit" name="send_request" value="Отправить">
						</div>
							
						
			</form>
	</div>




<!-- Подключаем подвал -->
<div id="footer">
	<?php include 'includes/footer.php';?>
</div>

</div>
</body>
</html>	


