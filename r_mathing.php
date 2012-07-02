<?php

error_reporting(1);
// Dataset definition
 $DataSet = new pData;




$q_month = "SELECT month( date ), months.name
			FROM request,months
			WHERE date_format( date, '%Y' ) = date_format( NOW( ) , '%Y' )
			AND month(date) = months.id
			GROUP BY 1";
$r_month = mysql_query($q_month) or die (mysql_error());
while ($result_month = mysql_fetch_array($r_month))
{

	// это будет число в Serie.[$month] - вот так будет выглядеть
	$month = $result_month[0];
	$month_name = $result_month[1];
	$DataSet->AddPoint(iconv("cp1251", "utf-8", $month_name),"Serie100");
	$DataSet->SetAbsciseLabelSerie("Serie100");



	$q_data = "SELECT category.name, count(*), request.category, MONTH(date), months.name
			FROM request,category,months
			WHERE date_format(date,'%Y') = date_format(NOW(),'%Y')
			AND month(date) = '$month'
			AND category.id = request.category
			AND months.id = MONTH(date)
			GROUP BY 1";
	$r_data = mysql_query($q_data) or die (mysql_error());
	while ($result_data = mysql_fetch_array($r_data))
	{
		$count_of_year[$result_data[4]][$result_data[0]] = $result_data[1];
		$DataSet->AddPoint($result_data[1],"Serie".$result_data[2]);
		$DataSet->AddSerie("Serie".$result_data[2]);
		$DataSet->SetSerieName(iconv("cp1251", "utf-8", $result_data[0]),"Serie".$result_data[2]);

	}

}

  // Initialise the graph
 $Test = new pChart(600,230);
 $Test->setFontProperties("pchart/Fonts/tahoma.ttf",8);
 $Test->setGraphArea(50,30,680,200);
 $Test->drawFilledRoundedRectangle(7,7,693,223,5,240,240,240);
 $Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);
 $Test->drawGraphArea(500,255,255,TRUE);
 $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2,TRUE);
 $Test->drawGrid(4,TRUE,230,230,230,50);

 // Draw the 0 line
 $Test->setFontProperties("pchart/Fonts/tahoma.ttf",6);
 $Test->drawTreshold(0,143,55,72,TRUE,TRUE);

 // Draw the bar graph
 $Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE);

 $year = date('Y');
 // Finish the graph
 $Test->setFontProperties("pchart/Fonts/tahoma.ttf",8);
 $Test->drawLegend(425,10,$DataSet->GetDataDescription(),255,255,255);
 $Test->setFontProperties("pchart/Fonts/tahoma.ttf",10);
 $Test->drawTitle(50,22,iconv("cp1251","utf-8","Статистика обращений за $year год"),50,50,50,585);
 $Test->Render("img/r_mathing.png");