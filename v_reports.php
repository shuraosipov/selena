<?php // ���������� ������ ��� ��������� ������ �� ����������
include 'r_category.php';
include 'r_category_lastmonth.php';
include 'r_category_currentmonth.php';
include 'r_users.php';
include 'r_mathing.php';
?>
<!-- ����� � ���������� � ����� �������� -->
<p id="titlereception">
	����������� ����������� ��������� ���������
</p>

<hr>
<p id="undertitle">
	������� � ���������, ������������ ����������� ��������� ���������
</p>
<!----------------------------------------->

<!--  �������� ��������� -->
<p id="r_title">1. ��������� �� ���������� �� ��� �����:</p>
<!-- ��������� �����������, ��������� �������� r_category.php-->
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

<p id="afterimage_h">����� ���������
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

<!-- ��������� �� ��������� ����� -->
<p id="r_title">2. ��������� �� ���������� �� ��������� �����:</p>
<img alt="��������� �� ���������� �� ��������� �����" src="img/category_lastmonth.png">


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

<p id="afterimage_h">����� ���������
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







<!--  �������� ��������� -->
<p id="r_title">3. ��������� �� ���������� �� ������� �����:</p>
<!-- ��������� �����������, ��������� �������� r_category.php-->
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


<p id="afterimage_h">����� ���������
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

<!-- ���������� �� ������� -->
<p id="r_title">4. ���������� �� ������� �� ������� ���:</p>
<!-- ��������� �����������, ��������� �������� r_mathing.php-->
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
	echo "$sum  ��������� ��  $month <br>";
}
?>
</p>
<p id="afterimage_h">����� ���������
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



<!--  �������� ��������� -->
<p id="r_title">5. ������� ����� �������� �������������:</p>

<!-- ��������� �����������, ��������� �������� r_users.php-->
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

<p id="afterimage_h">����� ���������
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
