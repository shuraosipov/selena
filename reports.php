<?php
// ���������� ��������� ����
require 'includes/system.php';

// Standard inclusions
include_once("pchart/pChart/pData.class");
include_once("pchart/pChart/pChart.class");





//include 'r_category.php';
//include 'r_category_lastmonth.php';
//include 'r_category_currentmonth.php';
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>SELENA | ����������</title>

		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/login_style.css" type="text/css">
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">

	</head>

		<body>

		<div id="container">

				<!-- ���������� ��������� -->
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
					<?php include 'v_reports.php';?>
				</div>

				<div id="footer">
					<?php include 'includes/footer.php';?>
				</div>

		</div>



		</body>
</html>
