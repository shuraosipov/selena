<?php 
// ������ ������ �� ��������� ���������� ��������� ���������
$q_rem_request = "SELECT count(id) FROM `trash_request`";
$r_rem_request = mysql_query($q_rem_request) or die (mysql_error());
$rem_count = mysql_fetch_array($r_rem_request);

?>
<div id="logo">
	SELENA
</div>
<div id="navcontainer"> 

	<a class="button" href="reception.php">���������</a>
	<a class="button" href="appeal.php">������</a>
	<a class="button" href="reports.php">����������</a>
	<a class="button" href="statement.php">������</a>
	<a class="button" href="recyclebin.php">������� (<?php echo $rem_count[0]?>)</a>

</div>
<div id="quit">
		<a class="button" href="logout.php">�����</a>
</div>


<div id="name">
	<?php   echo $username = $_SESSION['username'];?>	
</div>


					
				
	