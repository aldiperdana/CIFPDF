<?php

namespace App\Controllers;

use FPDF;

class Home extends BaseController
{
    public $db;
    function __construct(){
        // $this->load->library('FPDF'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
       error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        // $pdf = new \FPDF(); 
        $pdf = new FPDF('L', 'mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DAFTAR PEGAWAI AYONGODING.COM',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(90,6,'Nama Pegawai',1,0,'C');
        $pdf->Cell(120,6,'Alamat',1,0,'C');
        $pdf->Cell(40,6,'Telp',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $pegawai = $this->db->table("tbl_students")->get()->getResult();
        // $pegawai = $this->db->get('pegawai')->result();
        $no=0;
        foreach ($pegawai as $data){
            $no++;
            $pdf->Cell(10,6,$data->id,1,0, 'C');
            $pdf->Cell(90,6,$data->name,1,0);
            $pdf->Cell(120,6,$data->email,1,0);
            $pdf->Cell(40,6,$data->mobile,1,1);
        }
        $pdf->Output();
	}
}

