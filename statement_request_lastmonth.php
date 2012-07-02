<?php
require 'includes/system.php';

require('fpdf/fpdf.php');



$date = date('H:i:s d-m-Y');
// объявляем класс и конструктор класса, в данном случае у меня альбомный лист
$pdf=new FPDF();
//нужно подключить шрифт, указав имя шрифта и имя файла.
$pdf->AddFont('ArialMT','B','arial.php');
$pdf->AddPage();
// выбираем шрифт для текста.
$pdf->SetFont('ArialMT','B',17);
$pdf->Cell(10,10,'Обращения по категориям за последний месяц');
$pdf->SetFont('ArialMT','B',8);
$pdf->Cell(10,190,'Страница сформирована:'.$date);
$pdf->Image('img/category_lastmonth.png',10,20,150);







$pdf->Output();



?>