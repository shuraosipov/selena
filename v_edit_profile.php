<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | �������������� �������</title>
		
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
			<?php include 'includes/admin_header.php';?>
		</div>
		
		
		<!-- ����� ��������� �� �������� ������ ������-->
		<div id="error">
			<?php echo $alert;?>
		</div>
		
		<!--  �������������� ������ ������� ���������� -->
			<div id="content1">
			
			<form method="post" action="edit_profile.php">
				<table id="request">
					<tr>
						<td valign="top">����� ������������</td>
						<td>
							<input type="text"  name="login" value="<?php echo $login;?>">
							<div id="alert"><?php echo $wrong_login;?></div>
						</td>
						
						<td rowspan="100%" valign="bottom">
							<input type="submit" name="submit" value="�����������">
						</td>				
					</tr>
					
					<tr>
						<td valign="top">������� �������</td>
						
						<td>
							<select name="id_permissions">
								<option value="1">������������� ������</option>
								<option value="2">������������</option>
								<option value="3">������������</option>
							</select>
						</td>
					</tr>
					
				</table>
			</form>
	</div>
			
		
		
		
		<!-- ����� ����� ������������ ���������� � ���������������� ������� -->
		
		
		<!-- ���������� ������ -->
		<div id="footer">
			<?php include 'includes/footer.php';?>
		</div>
		</div>
	</body>
	
</html>	
