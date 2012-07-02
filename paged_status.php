<?php
// запрос на получение количества всех записей в таблице
$q_all = "SELECT count(id)
         FROM `request`
         WHERE status='$status'";
$r_all = mysql_query($q_all)
    or die ("<p>Ошибка в запросе № 1</p>".mysql_error());
$r_all = mysql_fetch_row($r_all);
$record_count = $r_all[0];

 

// количество выводимых записей на страницу
$record_per_page = 10;


// количество страниц
$pages = ceil($record_count/$record_per_page);


// определяем на какой странице мы находимся 
if (isset($_GET['page'])) 
{
	$page = intval($_GET['page']);
}
else
{
	$page = 1;
}

// проверяем, чтобы текущая страница была не меньше 1 и не больше последней страницы
if ($page < 1)
{
	$page = 1;
}
elseif ($page > $pages)
{
	$page = $pages;
}

// для запроса установим страницу, с которой будем делать вывод записей
$start = ($page - 1)*$record_per_page;

//если в таблице нет записей
if ($start < 0) $start = 0;

// количество страниц показываемых слева и справа
$neighbors = 3;
$left_neighbor = $page - $neighbors;
if ($left_neighbor < 1) $left_neighbor = 1;

$right_neighbor = $page + $neighbors;
if ($right_neighbor > $pages) $right_neighbor = $pages;

