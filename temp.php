<?php require 'includes/system.php';
	include 'paged.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=cp1251" />
  <title>�������������� �����</title>
  <style type="text/css">
   body {
    font: 0.8em Arial, Helvetica, sans-serif; /* ����� �� ���-�������� */
    background: white; /* ���� ���� */
     /* ���� ������ */
   }
   a { color: #008BCE; /* ���� ������ */ }
   
   #container {
    width: 960px; /* ������ ������ */
    margin: 0 auto; /* ����������� �� ������ */
    background: #f0f0f0; /* ���� ������� */
   }
   #header { 
    font-size: 2.2em; /* ������ ������ */
    text-align: left; /* ������������ �� ������ */
    padding: 5px; /* ������� ������ ������ */
    background: #333; /* ���� ���� ����� */
    color:#fff;
    text-transform:uppercase;
    letter-spacing:0.2em;
   }
   
   #menu { 
    
    text-align: left; /* ������������ �� ������ */
    padding: 5px; /* ������� ������ ������ */
    background:#f0f0f0; /* ���� ���� ����� */
    height:25px;
    }
   
   #nav, #aside {
    float: left; width: 110px; padding: 5px;
   }
   #content {
    background: #fff;
    margin: 0 120px; /* ������ ������� */
    padding: 10px;
    border-radius:0px 0px 15px 15px;
   }
   #aside {
    float: right; color: #000;
   }
   h2 { margin: 0 0 1em; }
   
   #footer { 
    clear: both; /* �������� �������� float */
    padding: 5px; /* ������� ������ ������ */
    background: #333; /* ���� ���� ������� */
    color:#f0f0f0;
   }
  </style>
 </head>
 <body>
  <div id="container">
   <div id="header">SELENA</div>
   
   <div id="menu">
   		
			 
			   <a href="stat.html">���������� �������</a>
			   <a href="interview.html">�������� � ������� ������</a>
			  <a href="ask.html">���������� �������</a>
		
			   
    </div>
   
  
   <div id="aside">
    <h3>����������</h3>
    <p>����������� ������� ����� �� ������;</p>
    <p>���� ������� ��������� ������ � ����� ����� ����� ����� ��������;</p>
    <p>������ ���� ������� ����, ��� ������� �������;</p>
   </div> 
   <div id="content"> 
   		
   		<!-- ��������� � ���������� � ����� �������� -->
<p id="titlereception">	��������� �������������</p>

<hr>

<p id="undertitle">	���� ��������� ����������� </p>
<!----------------------------------------->
<?php

// ������ �� ������� ���� ������� �� ������� `request` � ������������ �� ���� � �������� �������
// LIMIT ������ ��� ������������ ������ ������
// $start, $record_per_page ������� �� ������������� ����� paged.php
$query = "SELECT request.id, 
				request.title,
				request.date,
				request_type.type,
				status.type,
				users.user,
				users.id,
				request.support_id

		FROM request,request_type,status,users
				
		WHERE request_type.id = request.type
		
		AND request.status = status.id
		
		AND request.linkkey = users.id
		
		ORDER BY date DESC
		
		LIMIT $start,$record_per_page";

$result = mysql_query($query) 
or die ("������, ������������ ������ �� ��������� ���� ������� �� ������� request: ".mysql_error());


// ������� ������ ���� ���������� ������� ����� �������
while ($q = mysql_fetch_array($result))
{
	
// ������������ ���� � ����� ������� ���� ���:������:������� ����-�����-���
$date = date('H:i:s d-m-y',strtotime($q[2]));


echo <<<HEREDOC

<!-- �������� ���������� allreception, ���� ���������� ��� ���������-->
<div id="allreception">
HEREDOC;

// ������� ��� ����������,�������� �� �������� ���������
echo "<p id='counter'>����� �� ��������:";

// ���������� ������ v_contol.php. � ������� �� ��������� ����������, 
// �������� ��������� �� ��������
include 'v_control.php';

echo "</p>";



echo <<<HEREDOC
<!-- ���������, � ������� ��������� ���������-->
<div id="header_h">
		
	<!-- ����� ��������� -->
		<div id="number_request">
			� $q[0]
		</div>
	
	<!-- ������ ��������� -->			
		<div id="status_request">
			$q[4]
		</div>
	
	<!-- ��� ������������ -->	
		<div id="user_request">
			�� ���� : $q[5] 
		</div>
	
	<!-- ���� � ����� ��������� -->
		<div id="type_request">	
			$date 
		</div>
</div>



<ul>
	<li>
		
HEREDOC;

// ���������� ������������ ������ � ����������� �� ������� ��������� 
		switch ($q[4])
		{
			case "�����":
			echo "<image id='img' src='img/bell.png' title='����� ���������'>";
			break;
			
			case "� ���������":
			echo "<image id='img'src='img/loading.png' title='� ���������'>";
			break;
			
			case "���������":
			echo "<image id='img'src='img/complete.png' title='���������'>";;
			break;
			
			case "� ����������":
			echo "<image id='img'src='img/gears.png' title='� ����������'>";;
			break;
			
			default:
				;
			break;
		}
		
echo <<<HEREDOC
		
<!-- ������ �� �������� edit_reception.php, � ������� ���������� �������� ��������� id-->
<!-- ���� ���������-->
		<a class="reception" href="edit_reception.php?id=$q[0]" title="�������� ���������">$q[1]</a> 
		<br>		
<!-- ������ ��� ��������� ������� � �������� ��������� -->
		<a class="delete" href="update_status.php?id_request=$q[0]&status=7" title="�������� ������ �� ���������">[���������]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=9" title="�������� ������ �� �����">[�����]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=6" title="�������� ������ �� � ����������">[� ����������]</a>
		<a class="delete" href="update_status.php?id_request=$q[0]&status=8" title="�������� ������ �� � ���������">[� ���������]</a>
		<a class="delete" href="delete_reception.php?id=$q[0]" title="������� ���������">[�������]</a>
	</li>
</ul>
HEREDOC;

// ���������� ���������� ������������ ��� ������� ���������
$sql = "SELECT count( linkkey )
			FROM comments
			WHERE linkkey ='$q[0]'";
$r = mysql_query($sql) or die ("������ 2".mysql_error());
$count = mysql_fetch_array($r);

echo <<<HEREDOC
	<p id="counter">������������: $count[0]<p>
	<hr>

<!-- �������� ���������� allreception -->
</div>
HEREDOC;

}


// ������� ���������
echo "<div id=\"paginator\">";
if ($pages >=1 && $page <=$pages)
{
	echo "<a id=\"first_page\" href=\"?page=1\">�� ������</a>";
	for ($x=$left_neighbor;$x<=$right_neighbor;$x++)
	{
		if ($x == $page)
		{
			echo "<span id=\"current_page\">$x</span>";
		}
		else 
		{
			echo "<span id=\"pages\"><a href=\"?page=$x\">$x</a></span>"." ";
		}
	} 
	echo "<a id=\"last_page\" href=\"?page=$pages\">�� ��������� ($pages)</a>";
}
echo "</div>";

mysql_close();
?>
<!-- �������� ���������� main -->
</div>
   		
   		
   		
   		
   		
   		
   		
   		
   		
   		
   		
   		
   		
   		
   		
   </div>
   <div id="footer">&copy; Osipov Alex</div>
  </div>
 </body>
</html>