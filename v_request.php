<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | Обращение</title>
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		
		
		
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
		<link rel="shortcut icon" href="img/favicon.png" type="text/x-ico">
		
		
				
		<script src="includes/jquery.js"></script>
		<script type="text/javascript">
			
			// Подсветка текущей ссылки	
				$(document).ready(function(){
					$('#navcontainer a').click(function(){
							$('#navcontainer a').removeClass('current');
							$('#navcontainer a').addClass('button');
							$(this).removeClass('button');
							$(this).addClass('current');
						});
				});
			// спрятать  историю обращений
				$(document).ready(function(){
							$('#history').hide();
					});	
			// Показать, скрыть историю переписки
				$(document).ready(function(){
					$('#content2 p').toggle(function(){
							$('#history').hide();
					},function(){
							$('#history').show();
						});	
					});
		</script>
	</head>
<body>

<div id="container">
<!-- Подключаем шапку -->
<div id="header">
<?php include 'includes/header.php';?>
</div>

<!-- Всплывающее сообщение об ошибке над формой отправки обращения-->
	<div id="error">
		<?php echo $alert;?>
	</div>
	
<!-- Форма отправки запроса в верхней части экрана-->	
	<div id="content1">
			<form method="post" action="request.php">
				
						<div id="request_header">Тема *</div>
					
						<div id="request_title"><input type="text"  name="title_request" value="<?php echo $title;?>"></div>
							
							<div id="alert"><?php echo $wrong_title;?></div>
						
						
						
						<div id="request_header">Обращение *</div>
						
						
						<div id="request_text">	
						<input id="rqs_text" type="text" name="text_request" ></div>
							<div id="alert"><?php echo $wrong_text;?></div>
						
						<div id="request_type">
							<label><input type="radio" name="type_request" value="1">Высокий</label>
							<label><input type="radio" name="type_request" value="2">Средний</label>
							<label><input type="radio" name="type_request" value="3" checked="checked">Низкий</label>
						</div>
						
						<div id="request_button">
							<input type="submit" name="send_request" value="Обратиться">
						</div>
							
						
			</form>
	</div>

<!--  Форма, в которой отображаются все обращения пользователя и их статус-->
 	<div id="content2">
		<p>Нажмите сюда, чтобы открыть историю обращений</p>
			<div id="history">
				<?php include 'messages.php';?>
			</div>
	</div>


<!-- Подключаем подвал -->
<!-- <div id="footer">
	<?php include 'includes/footer.php';?>
</div>
 -->
</div>
</body>
</html>	


