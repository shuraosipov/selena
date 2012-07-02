<?php  
// Подключение системного файла


// Standard inclusions     
include("pChart/pData.class");  
include("pChart/pChart.class");  
$DataSet = new pData;
//Делаем запрос на выборку
$query = "SELECT users,type FROM users ORDER by id GROUP BY id";
$result = mysql_query($query) or die;
while ($r = mysql_fetch_array($result))
{
		$DataSet -> AddPoint($r["user"],'Serie1');
		$DataSet->AddPoint($r["type"],"Serie2");
}


// Dataset definition   
    
$DataSet->AddAllSeries();  
$DataSet->SetAbsciseLabelSerie("Serie2");  
      
// Initialise the graph  
$Test = new pChart(380,200);  
$Test->drawFilledRoundedRectangle(7,7,373,193,5,240,240,240);  
$Test->drawRoundedRectangle(5,5,375,195,5,230,230,230);  
      
// Draw the pie chart  
$Test->setFontProperties("Fonts/tahoma.ttf",8);  
$Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),150,90,110,PIE_PERCENTAGE,TRUE,50,20,5);  
$Test->drawPieLegend(310,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);  
     
$Test->Render("graph_test.png");  
?> 