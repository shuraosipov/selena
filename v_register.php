<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<title>SELENA | Регистрация</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/login_style.css" type="text/css">
		
					
		
	</head>
	<body id="register">
		
	<div id=container>	
		
		<div id="error">
			<?php echo $alert;?>
		</div>
		
		<div id="content">
		
		<fieldset id="register_form">
		<legend>Регистрация</legend>
		<form method="post" action="register.php">
			
			<table id="login" border="0">
				
					<tr>
						<td>Имя *</td>
						<td>
							<input type="text" name="username">
							<div id="alert"><?php echo $wrong_username;?></div>
						</td>
					
					</tr>
					
					<tr>
						<td>Пароль *</td>
						<td>
							<input type="password" name="password">
							<div id="alert"><?php echo $wrong_password;?></div>
						</td>
					
					</tr>
					<tr>
						<td>Пароль(еще раз)</td>
						<td>
							<input type="password" name="password1">
							<div id="alert"><?php echo $wrong_password;?></div>
						</td>
					
					</tr>
					<tr>
						<td colspan="2">
							<p id="alert">* - поля для обязательного заполнения</p>
						</td>
							
					</tr>
					<tr>
						<td colspan="2" align="right">
							<a href="login.php">Назад</a>
							<input type="submit" name="register" value="Зарегистрировать">
						
						</td>
							
					</tr>
				
			</table>
			
		</form>
		</fieldset>	
		</div>
	</div>
		
		
		
			
	</body>
</html>
