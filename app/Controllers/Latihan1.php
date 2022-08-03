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
        $pdf->AliasNbPages();

        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,5,' ','LTR',0,'L',0);   // empty cell with left,top, and right borders
        // $pdf->Cell(50,5,'Words Here',1,0,'L',0);
        // $pdf->Cell(50,5,'Words Here',1,0,'L',0);
        // $pdf->Cell(40,5,'Words Here','LR',1,'C',0);  // cell with left and right borders
        // $pdf->Cell(50,5,'[ x ] abc',1,0,'L',0);
        // $pdf->Cell(50,5,'[ x ] checkbox1',1,0,'L',0);
        // $pdf->Cell(40,5,'','LBR',1,'L',0);   // empty cell with left,bottom, and right borders
        // $pdf->Cell(50,5,'[ x ] def',1,0,'L',0);
        // $pdf->Cell(50,5,'[ x ] checkbox2',1,0,'L',0);

        //Table Header
        $header=["Name","Email","Age"];
        //Table Rows
        $data=[
            ["Ram","ram@gmail.com",25],
            ["Sam","sam@gmail.com",21],
            ["Kumar","kumar@gmail.com",33],
            ["Bala","bala@gmail.com",35],
            ["Raj","raj@gmail.com",28],
            ["Tom","tom@gmail.com",30],
        ];
        $pdf->createTable($header,$data);
        $pdf->Output();
        // $pdf->Cell(width,height,'TEXT',0,1,'C');
        // $pdf->Cell(0,50,'DAFTAR PEGAWAI AYONGODING.COM',0,1,'C');
        // $pdf->Output();
	}

    function createTable($header,$data){
      
        $pdf = new FPDF('L', 'mm','Letter');
        $pdf->SetFont('Arial','B',12);
        foreach($header as $h){
          $pdf->Cell(60,7,$h,1);
        }
        $pdf->Ln();
        $pdf->SetFont('Arial','',12);
        foreach($data as $row){
          foreach($row as $col){
            $pdf->Cell(60,7,$col,1);
          }
          $pdf->Ln();
        }
    }

    function Header()
        {
            $pdf = new FPDF('L', 'mm','Letter');
            // Logo
            $pdf->Image('logo.png',10,6,30);
            // Arial bold 15
            $pdf->SetFont('Arial','B',15);
            // Move to the right
            $pdf->Cell(80);
            // Title
            $pdf->Cell(30,10,'Title',1,0,'C');
            // Line break
            $pdf->Ln(20);
        }

    // Page footer
    function Footer()
        {
            $pdf = new FPDF('L', 'mm','Letter');
            // Position at 1.5 cm from bottom
            $pdf->SetY(-15);
            // Arial italic 8
            $pdf->SetFont('Arial','I',8);
            // Page number
            $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
        }
}
