<?php require 'includes/system.php';?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>SELENA | Отчеты</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/login_style.css" type="text/css">
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
					
	</head>
		
		<body>
			<div id="container">	
						<!-- Подключаем заголовок -->
						<div id="header">
							<?php include 'includes/support_header.php';?>
						</div>
					
						<div id="left_side">
							<?php include 'leftside.php';?>
						</div>
						
						
						
						<div id="right_side">
							<?php include 'rightside.php';?>
						</div>
						
						
						<div id="main">
						
							<!-- Шапка с пояснением в верху страницы -->
							<p id="titlereception">
								Отчетность в виде PDF
							</p>
							
							<hr>
							<p id="undertitle">
								Сохранить или распечатать отчеты в формате PDF
							</p>
							
							<ul>
							<li><a href="statement_worker.php" target="_blank" title="ссылка откроется в новом окне">Отчет по сотрудникам</a></li>
							<li><a href="statement_request_lastmonth.php" target="_blank">Отчет по обращениям за последний месяц</a></li>
							<li><a href="statement_request_all.php" target="_blank" title="ссылка откроется в новом окне">Обращения за все время</a></li>
							<li><a href="">Наиболее активные пользователи</a></li>
							</ul>
						</div>
						
						
						<div id="footer">
							<?php include 'includes/footer.php';?>
						</div>	
					
				
			</div>
		
		
		
	
				
					
		</body>
</html>
