<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCPDF;
use Auth;

class PDF extends TCPDF {

    //Page header
    public function Header() {
        $letterhead_url = Auth::user()->org_admin->letterhead;
        $image_file = $letterhead_url;
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


class PDFGenerator extends Model
{
    public static function makePDF(){
      $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $pdf->SetCreator('<E');
      $pdf->SetAuthor($_ENV['APP_NAME']);
      $pdf->SetTitle('Document Signed');
      $pdf->SetSubject('TCPDF Tutorial');

      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      $pdf->AddPage();
      $pdf->WriteHTML('');

      return $pdf->Output('greetings.pdf','I');
    }
}
