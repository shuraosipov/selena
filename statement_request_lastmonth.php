<?php
require 'includes/system.php';

require('fpdf/fpdf.php');



$date = date('H:i:s d-m-Y');
// ��������� ����� � ����������� ������, � ������ ������ � ���� ��������� ����
$pdf=new FPDF();
//����� ���������� �����, ������ ��� ������ � ��� �����.
$pdf->AddFont('ArialMT','B','arial.php');
$pdf->AddPage();
// �������� ����� ��� ������.
$pdf->SetFont('ArialMT','B',17);
$pdf->Cell(10,10,'��������� �� ���������� �� ��������� �����');
$pdf->SetFont('ArialMT','B',8);
$pdf->Cell(10,190,'�������� ������������:'.$date);
$pdf->Image('img/category_lastmonth.png',10,20,150);







$pdf->Output();



?>