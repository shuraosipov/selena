<?php
// ������ �� ��������� ���������� ���� ������� � �������
$q_all = "SELECT count(id)
         FROM `request`
         WHERE status='$status'";
$r_all = mysql_query($q_all)
    or die ("<p>������ � ������� � 1</p>".mysql_error());
$r_all = mysql_fetch_row($r_all);
$record_count = $r_all[0];

 

// ���������� ��������� ������� �� ��������
$record_per_page = 10;


// ���������� �������
$pages = ceil($record_count/$record_per_page);


// ���������� �� ����� �������� �� ��������� 
if (isset($_GET['page'])) 
{
	$page = intval($_GET['page']);
}
else
{
	$page = 1;
}

// ���������, ����� ������� �������� ���� �� ������ 1 � �� ������ ��������� ��������
if ($page < 1)
{
	$page = 1;
}
elseif ($page > $pages)
{
	$page = $pages;
}

// ��� ������� ��������� ��������, � ������� ����� ������ ����� �������
$start = ($page - 1)*$record_per_page;

//���� � ������� ��� �������
if ($start < 0) $start = 0;

// ���������� ������� ������������ ����� � ������
$neighbors = 3;
$left_neighbor = $page - $neighbors;
if ($left_neighbor < 1) $left_neighbor = 1;

$right_neighbor = $page + $neighbors;
if ($right_neighbor > $pages) $right_neighbor = $pages;

