<?php

namespace App;

use TCPDF;

class CustomPDF extends TCPDF
{
    // Page header
    public function Header() {
        // Logo
        $image_file = public_path('assets/admin/img/logo-pcuchoir.png'); // Adjust the path as needed
        $this->Image($image_file, 10, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        // Set font
        $this->SetFont('helvetica', 'B', 20);

        // Move to the right
        $this->SetX(35);
        
        // Title
        $this->Cell(0, 15, 'Laporan Kegiatan PCU CHOIR', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
