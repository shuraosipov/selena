<?php // подключаем скрипт для получения отчета по категориям
include 'r_category.php';
include 'r_category_lastmonth.php';
include 'r_category_currentmonth.php';
include 'r_users.php';
include 'r_mathing.php';
?>
<!-- Шапка с пояснением в верху страницы -->
<p id="titlereception">
	Графическое отображение обработки обращений
</p>

<hr>
<p id="undertitle">
	Графики и диаграммы, показывающие соотношение категорий обращений
</p>
<!----------------------------------------->

<!--  Название диаграммы -->
<p id="r_title">1. Обращения по категориям за все время:</p>
<!-- Загружаем изображение, созданное скриптом r_category.php-->
<img alt="users" src="img/category_all.png">


<p id="afterimage_t">
<?php
	foreach ($count_of_request as $count)
	{
		foreach ($count as $name => $value)
		{
		echo ("$name : $value<br>");
		}
	}
?>
</p>

<p id="afterimage_h">Всего обращений
<?php
$sum=0;
foreach ($count_of_request as $count)
{
	foreach ($count as $name => $value)
	{
		$sum = $sum + $value;
	}
}
echo $sum;
?>
</p>

<!-- Обращения за последний месяц -->
<p id="r_title">2. Обращения по категориям за последний месяц:</p>
<img alt="Обращения по категориям за последний месяц" src="img/category_lastmonth.png">


<p id="afterimage_t">
<?php

foreach ($category_last_month as $category => $massiv)
{
	foreach ($massiv as $category_name => $category_count)
	{
		echo "$category_name : $category_count<br>";
	}
}
?>
</p>

<p id="afterimage_h">Всего обращений
<?php
$sum=0;
foreach ($category_last_month as $category)
{


		foreach ($category as $category_name => $count)
		{
			$sum = $sum + $count;
		}

}
echo $sum;
?>
</p>







<!--  Название диаграммы -->
<p id="r_title">3. Обращения по категориям за текущий месяц:</p>
<!-- Загружаем изображение, созданное скриптом r_category.php-->
<img alt="users" src="img/category_currentmonth.png">


<p id="afterimage_t">
<?php
	foreach ($current_month as $category => $massiv)
	{
		foreach ($massiv as $name => $count_of_request)
		{
		echo "$name : $count_of_request<br>";
		}
	}
?>


<p id="afterimage_h">Всего обращений
<?php
$sum=0;
foreach ($current_month as $count)
{
	foreach ($count as $name => $value)
	{
		$sum = $sum + $value;
	}
}
echo $sum;
?>
</p>

<!-- Статистика по месяцам -->
<p id="r_title">4. Статистика по месяцам за текущий год:</p>
<!-- Загружаем изображение, созданное скриптом r_mathing.php-->
<img alt="users" src="img/r_mathing.png">
<p id="afterimage_t">
<?php
foreach ($count_of_year as $month => $massiv)
{


	$sum = 0;
	foreach ($massiv as $category => $count_of_request)
	{
		$sum = $sum + $count_of_request;
	}
	echo "$sum  обращений за  $month <br>";
}
?>
</p>
<p id="afterimage_h">Всего обращений
<?php
$sum = 0;
foreach ($count_of_year as $month)
{


	foreach ($month as $name => $value)
	{
		$sum = $sum + $value;
	}

}
echo $sum;
?>
</p>



<!--  Название диаграммы -->
<p id="r_title">5. Десятка самых активных пользователей:</p>

<!-- Загружаем изображение, созданное скриптом r_users.php-->
<img alt="users" src="img/r_users.png">
<p id="afterimage_t">
<?php
	foreach ($count_of_users as $count)
	{
		foreach ($count as $name => $value)
		{
		echo ("$name : $value<br>");
		}
	}
?>
</p>

<p id="afterimage_h">Всего обращений
<?php
$sum=0;
foreach ($count_of_users as $count)
{
	foreach ($count as $name => $value)
	{
		$sum = $sum + $value;
	}
}
echo $sum;
?>
</p>
