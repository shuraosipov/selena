<?php
// ���������� ��������� ����
include 'includes/system.php';
// ���������� ������ ��������
include 'online.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>SELENA | �������� ���������</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		
			<meta http-equiv="Content-Type" content="text/html; charset=cp1251">
		<link rel="stylesheet" href="css/menu_style.css" type="text/css">
		<link rel="stylesheet" href="css/main_style.css" type="text/css">
		<link rel="stylesheet" href="css/content_style.css" type="text/css">
		<link rel="stylesheet" href="css/footer_style.css" type="text/css">
		<link rel="shortcut icon" href="img/favicon.png" type="text/x-ico">
	
	</head>
	
	<body>
		
		
<!-- ������� �������,� ������� ����� ���������� ���� ��������� -->
<div id="container">

		<div id="header">
			<?php include 'includes/header.php';?>
		</div>


<div id=viewRequest>

<table id="view">
	<tr class="header" align="center">
		<td>���������</td>
		<td>����� ���������</td>
		<td>����������</td>
		<td>�������</td>
	</tr>
	
<?php
$id = $_GET['id_request'];

// ������ �� ��������� ���������������� ���������
$query = "SELECT * FROM `request`,`request_type`,`status`
			WHERE request.id = '$id'
			AND request.type = request_type.id
			AND request.status = status.id";
$result = mysql_query($query) or die;
	while ($q = mysql_fetch_array($result))
{
echo <<<HEREDOC
<tr valign="top">
	<td>$q[title]</td>
	<td>$q[text]</td>
	<td>$q[date]</td>
	<td>$q[10]</td>
</tr>
HEREDOC;
}
//� ���������� ���� ���������  ��� github aaa
?>	

</table>
</div>
</div>
</body>
</html>