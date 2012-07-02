<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | ���������</title>
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		
		
		
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
		<link rel="shortcut icon" href="img/favicon.png" type="text/x-ico">
		
		
				
		<script src="includes/jquery.js"></script>
		<script type="text/javascript">
			
			// ��������� ������� ������	
				$(document).ready(function(){
					$('#navcontainer a').click(function(){
							$('#navcontainer a').removeClass('current');
							$('#navcontainer a').addClass('button');
							$(this).removeClass('button');
							$(this).addClass('current');
						});
				});
			// ��������  ������� ���������
				$(document).ready(function(){
							$('#history').hide();
					});	
			// ��������, ������ ������� ���������
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
<!-- ���������� ����� -->
<div id="header">
<?php include 'includes/header.php';?>
</div>

<!-- ����������� ��������� �� ������ ��� ������ �������� ���������-->
	<div id="error">
		<?php echo $alert;?>
	</div>
	
<!-- ����� �������� ������� � ������� ����� ������-->	
	<div id="content1">
			<form method="post" action="request.php">
				
						<div id="request_header">���� *</div>
					
						<div id="request_title"><input type="text"  name="title_request" value="<?php echo $title;?>"></div>
							
							<div id="alert"><?php echo $wrong_title;?></div>
						
						
						
						<div id="request_header">��������� *</div>
						
						
						<div id="request_text">	
						<input id="rqs_text" type="text" name="text_request" ></div>
							<div id="alert"><?php echo $wrong_text;?></div>
						
						<div id="request_type">
							<label><input type="radio" name="type_request" value="1">�������</label>
							<label><input type="radio" name="type_request" value="2">�������</label>
							<label><input type="radio" name="type_request" value="3" checked="checked">������</label>
						</div>
						
						<div id="request_button">
							<input type="submit" name="send_request" value="����������">
						</div>
							
						
			</form>
	</div>

<!--  �����, � ������� ������������ ��� ��������� ������������ � �� ������-->
 	<div id="content2">
		<p>������� ����, ����� ������� ������� ���������</p>
			<div id="history">
				<?php include 'messages.php';?>
			</div>
	</div>


<!-- ���������� ������ -->
<!-- <div id="footer">
	<?php include 'includes/footer.php';?>
</div>
 -->
</div>
</body>
</html>	


