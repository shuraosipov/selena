<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		<link rel="stylesheet" href="css/admin_header.css" type="text/css">
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/login_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
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
							$('#history').show();
					},function(){
							$('#history').hide();
						});	
					});
		</script>
	</head>
	
	<body>
	
		<div id="header">
			<?php include_once ('header.php');?>
		</div>
		
		
		
		
		
		

	</body>
</html>
