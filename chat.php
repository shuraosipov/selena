<?php
// ���������� ��������� ����
require 'includes/system.php';

//���������� �������� ��������
include 'v_chat.php';
?>

<div id="main">
<form method="post" id="form">
		<table>
			<tr>
				<td><label>���� ���</label></td>
				<td><input class="text user" id="nick" type="text" MAXLENGTH="25" /></td>
			</tr>
			<tr>
				<td><label>���������</label></td>
				<td><input class="text" id="message" type="text" MAXLENGTH="255" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input id="send" type="submit" value="���������" /></td>
			</tr>
		</table>
	</form>
<div id="container">
<div class="content">
			<h1>��������� ���������</h1>
			<div id="loading"><img src="css/images/loading.gif" alt="��������..." /></div>
			<p>
		</div>
</div>




<?php 

?>
</div>