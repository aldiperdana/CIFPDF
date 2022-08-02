<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use FPDF;

class Latihan1 extends BaseController
{
    public function index()
    {
       error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        // $pdf = new \FPDF(); 
        $pdf = new FPDF('L', 'mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,0,'Hello World',0,1,'L');  
        $pdf->Cell(100,100,'Title',0,1,'C');      
        $pdf->Output();
	}
}
