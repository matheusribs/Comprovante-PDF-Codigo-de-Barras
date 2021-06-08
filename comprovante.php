<?php

// heares responsáveis por baixar diretamente o arquivo PDF
//header('Content-type: application/pdf'); 
//header('Content-Disposition: attachment; filename="Comprovante de Agendamento.pdf"'); 

require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Our Code World');
$pdf->SetTitle('Comprovante de Agendamento');


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default header data

//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING); // linha responsável por cabeçalho do documento

// set header and footer fonts

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); 
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();


$protocolo = '058745698';
$data = date('d/m/Y');
$hora = date('H:i');

$html = '<div align="center">
<img src="img/logo.png" />
<h3 align="center" style="margin-top: 40px; margin-left: 1%; margin-bottom: 1%;"><b>COMPROVANTE DE AGENDAMENTO</b></h3><p align="center" style="margin-left: 2%;">___________________________________________________________________________</p>
            
            <img src="http://127.0.0.1/comprovantePDF/barcode.php?f=png&s=ean-128&d='.$protocolo.'" width="400px" height="120px" />
            <h1 align="center"><b>'.$protocolo.'</b></h1>
            <p align="center" style="margin-top: 1%; margin-left: 2%">___________________________________________________________________________</p>
            <h4 align="center" style="margin-top: 5%;"><b>INFORMAÇÕES SOBRE O AGENDAMENTO:</b></h4>
            <p align="center">DATA E HORÁRIO DE ENTRADA: <b>'.$data.' às '.$hora.' hrs </b><br> <font color="red">ATENÇÃO! SE O ENVIO NÃO CHEGAR NA DATA AGENDADA, SERÁ RECUSADO.</font></p> </div>
            <p align="left" style="margin-top: 10%;">
    </div>
    ';
 
$pdf->writeHTML($html, true, false, true, false, '');
/*// add a page
$pdf->AddPage();

$html = '<h1>Hey</h1>';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document*/
$pdf->Output('Comprovante de Agendamento.pdf', 'I');


?>
