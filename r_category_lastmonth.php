<?php
error_reporting(1);
 /*
    Статистика обращений по категориям за последний  месяц
 */


$DataSet = new pData;
$category_last_month = array();

$q_lastmonth = "SELECT category, count(*) , category.name
			FROM request, category
			WHERE category.id = request.category
			AND date_format( request.date, '%Y%m' ) = date_format( date_add( NOW( ) , INTERVAL -1
			MONTH ) , '%Y%m' )
			GROUP BY category";
$r_lastmonth = mysql_query($q_lastmonth) or die ("Ошибка. ".mysql_error());
while ($result_lastmonth = mysql_fetch_array($r_lastmonth))
{
	$category_last_month[$result_lastmonth[0]][$result_lastmonth[2]] = $result_lastmonth[1];

	// Dataset definition
	$DataSet->AddPoint($result_lastmonth[1],"Serie1");
 	$DataSet->AddPoint(iconv("cp1251", "utf-8", $result_lastmonth[2]),"Serie2");
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
$Test->Render("img/category_lastmonth.png");
?>