<?php

/*
 * db.php
 * ��������� ����������� � mysql � ���� ������
 * 
 */

//������ �������� ����������
$server = 'localhost';
$user = 'root';
$password = '12345';
$database_name = 'selena';

// ����������� � mysql � ���� ������
mysql_connect($server,$user,$password) or die ("�� ���� ������������ � mysql ".mysql_error());

mysql_select_db($database_name);


