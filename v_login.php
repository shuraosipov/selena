<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>SELENA | �����������</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/login_style.css" type="text/css">

	</head>
	<body>
		
		<div id="error">
			<?php echo $alert;?>
		</div>
		
		<div id="content">
		
		<fieldset>
			<legend>�����������</legend>
		
		<form method="post" action="login.php">
			
			<table id="login" border="0">
				
					<tr>
						<td>��� *</td>
						<td>
							<input type="text" name="username">
							<div id="alert"><?php echo $wrong_username;?></div>
						</td>
					
					</tr>
					
					<tr>
						<td>������ *</td>
						<td>
							<input type="password" name="password">
							<div id="alert"><?php echo $wrong_password;?></div>
						</td>
					
					</tr>
					<tr>
						<td colspan="2">
							<p id="alert">* - ���� ��� ������������� ����������</p>
						</td>
							
					</tr>
					<tr>
						<td colspan="2" align="right">
							<a  href="register.php">�����������</a>
							<input type="submit" name="login" value="�����">
						</td>
						
							
					</tr>
				
			</table>
			
		</form>
		
		
		</fieldset>	
		</div>
		
		
		
	</body>
</html>
