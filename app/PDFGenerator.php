<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCPDF;
use Auth;
use Storage;

class PDF extends TCPDF {

    //Page header
    public function Header() {
        $letterhead_url = Auth::user()->org_admin->letterhead;
        $image_encoded = base64_encode(file_get_contents($letterhead_url));
        $imgdata = base64_decode($image_encoded);
        $this->Image('@'.$imgdata,10,10,50);
    }

    // Page footer
    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
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
