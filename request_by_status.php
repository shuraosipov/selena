<?php // подключаем системный файл 
require 'includes/system.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | Обращения по статусам</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
		<script src="includes/jquery.js"></script>
		<script type="text/javascript">

		$(document).ready(funtion(){
			
			});	
		</script>
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
			<?php include 'v_request_by_status.php';?>
		</div>
		
		<div id="footer">
			<?php include 'includes/footer.php';?>
		</div>
		
	</div>	
		
		
	</body>
	
</html>	
