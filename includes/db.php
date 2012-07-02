<?php

/*
 * db.php
 * настройки подключения к mysql и базе дынных
 * 
 */

//задаем значения переменным
$server = 'localhost';
$user = 'root';
$password = '12345';
$database_name = 'selena';

// подключение к mysql и базе данных
mysql_connect($server,$user,$password) or die ("Не могу подключиться к mysql ".mysql_error());

mysql_select_db($database_name);


