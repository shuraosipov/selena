<?php

error_reporting(1);
 /*
    Статистика обращений по категориям за текущий  месяц
 */


//Обращения за весь период работы

$DataSet = new pData;
$current_month = array();

$query = "SELECT category, count( * ) , category.name
		FROM request, category
		WHERE category.id = request.category
		AND date_format( request.date, '%Y%m' ) = date_format( NOW( ) , '%Y%m' )
		GROUP BY category";
$result = mysql_query($query) or die ("Ошибка. ".mysql_error());
while ($q = mysql_fetch_array($result))
{
	$current_month[$q[0]][$q[2]] = $q[1];

	// Dataset definition
	$DataSet->AddPoint($q[1],"Serie1");
	$DataSet->AddPoint(iconv("cp1251","utf-8",$q[2]),"Serie2");

}

$DataSet->AddAllSeries();
$DataSet->SetAbsciseLabelSerie("Serie2");

 // Initialise the graph
$Test = new pChart(500,200);
$Test->drawFilledRoundedRectangle(7,7,293,193,5,240,240,240);
$Test->drawRoundedRectangle(5,5,295,195,5,230,230,230);

 // Draw the pie chart
$Test->setFontProperties("pchart/Fonts/tahoma.ttf",8);
$Test->setShadowProperties(2,2,200,200,200);
$Test->drawFlatPieGraphWithShadow($DataSet->GetData(),$DataSet->GetDataDescription(),120,100,60,PIE_PERCENTAGE,10);
$Test->drawPieLegend(250,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);
$Test->Render("img/category_currentmonth.png");

?>
