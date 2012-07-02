<?php

/*
 * config.php
 * настройки и параметры
 */

// соль для пароля
$salt = '$3Len@';

// установка временной зоны по-умолчанию
date_default_timezone_set('Europe/Moscow');

// установка локали
setlocale(LC_ALL, 'ru_RU.CP1251', 'rus_RUS.CP1251', 'Russian_Russia.1251', 'russian');