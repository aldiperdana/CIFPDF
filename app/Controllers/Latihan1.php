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

        // $pdf->Cell(width,height,'TEXT',0,1,'C');
        $pdf->Cell(0,7,'DAFTAR PEGAWAI AYONGODING.COM',0,1,'C');
        $pdf->Cell(20,10,'Title',1,1,'C');
        $pdf->Output();
	}
}
