<?php
// ���������� ��������� ����
include 'includes/system.php';
// ���������� �������� ��������
include 'online.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | �������� �������</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">

	</head>
	
	<body>
		
		<div id="container">
			<!-- ���������� ��������� -->
			<div id="header">
				<?php include 'includes/admin_header.php';?>
			</div>
			
			
			<!-- ����� ��������� �� �������� ������ ������-->
			<div id="alert">
				<?php echo @$alert;?>
			</div>
			
			
			<!-- ����� ����� ������������ ���������� � ���������������� ������� -->
			<div id="main">
				<?php include 'v_profile.php';?>
			</div>
			
			<!-- ���������� ������ -->
			<div id="footer">
				<?php include 'includes/footer.php';?>
			</div>
		</div>
	</body>
	
</html>	
