<?php

error_reporting(1);
 /*
    ������� ����� �������� �������������
    r_users.php
 */

// ���������� ����� dataSet ��� ��������� ���������
$DataSet = new pData;
// ������� ����� ������
$count_of_users = array();

// �������� ������� ���������� ��������� ������� ������������, ������� 10 ����� ��������
$query = "SELECT user,linkkey,count(*)
			FROM users,request
			WHERE users.id=request.linkkey
			GROUP BY linkkey
			ORDER BY count(*) DESC
			LIMIT 0,10";
$result = mysql_query($query) or die ("������ ".mysql_error());

while ($q = mysql_fetch_array($result))

{
	// ��������� ������ �� ��������:
	//$���_�������[$�������][$���_������������]=[$����������_��������_�������_������������]
	$count_of_users[$q[1]][$q[0]] = $q[2];
	// ���������� ����������
	$DataSet->AddPoint($q[2],"Serie1");
	$DataSet->AddPoint(iconv('cp1251', 'utf-8', $q[0]),"Serie2");
	$DataSet->AddAllSeries();
	$DataSet->SetAbsciseLabelSerie("Serie2");
}
 // ��������� �������
$Test = new pChart(500,200);
$Test->drawFilledRoundedRectangle(7,7,293,193,5,240,240,240);
$Test->drawRoundedRectangle(5,5,295,195,5,230,230,230);

 // ������ ������� ���������-����
$Test->setFontProperties("pchart/Fonts/tahoma.ttf",8);
$Test->setShadowProperties(2,2,200,200,200);
$Test->drawFlatPieGraphWithShadow($DataSet->GetData(),$DataSet->GetDataDescription(),120,100,60,PIE_PERCENTAGE,10);
$Test->drawPieLegend(250,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);

// ������� � ���������� �������� � ����������� img
$Test->Render("img/r_users.png");
?>
