<?php

//require_once dirname(__FILE__).'/TCPDF/tcpdf.php';
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    var $numerocodigo;
    var $referenciaCorrespondencia;
    var $procedenciaCorrespondencia;
    var $fechaIngresoCorrespondencia;
    var $estadonivelCorrespondencia;
    var $estadonivelCheckUCorrespondencia;
    var $estadonivelCheckPCorrespondencia;
    var $estadonivelCheckRCorrespondencia;
    var $descripcion;
    var $observacion;

    public function cargarPropiedades($nrocodigo, $referencia, $procedencia, $fechaingreso, $estadonivel, $imgcheckU, $imgcheckP, $imgcheckR, $descripcion, $observacion)
    {
        $this->numerocodigo = $nrocodigo;
        $this->referenciaCorrespondencia = $referencia;
        $this->procedenciaCorrespondencia = $procedencia;
        $this->fechaIngresoCorrespondencia = $fechaingreso;
        $this->estadonivelCorrespondencia = $estadonivel;
        $this->estadonivelCheckUCorrespondencia = $imgcheckU;
        $this->estadonivelCheckPCorrespondencia = $imgcheckP;
        $this->estadonivelCheckRCorrespondencia = $imgcheckR;
        $this->descripcion = $descripcion;
        $this->observacion = $observacion;
    }



    //Page header
    public function Header()
    {
        /* NOTE:
         * *********************************************************
         * PRIMERA CABECERA
         * *********************************************************
         */
        $this->Ln(11.7);
        $this->SetFont('helvetica', 'N', 22);
        $this->Cell(0, 4, $this->numerocodigo, 0, 1, 'C');


        /* NOTE:
         * *********************************************************
         * PRIMERA SECCION
         * *********************************************************
         */




        // Crear contenedor SECCION 1
        $contenedorSeccion1 = '';
        $contenedorSeccion1 .= '
        <style type="text/css">
            table tr{
                font-size: 9pt;
                font: "helvetica";
                line-height: 16pt
            }
        </style>
        <div>
        <table cellspacing="0" cellpadding="2" border="0" style="width: 100%;" class="table table-bordered">         
            <tbody>
                <tr>
                    <td colspan=2 width="82%"><b style="color:#fff;">REFERENCIAS: </b>&nbsp;&nbsp;&nbsp;<span> </span></td>
                    <td width="18%">
                    <label for="html">';
        $this->Image(base_url() . $this->estadonivelCheckUCorrespondencia, 196.3, 49.7, 3.7, 4.2, 'PNG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
        $contenedorSeccion1 .= '</label>
                    </td>
                </tr>
                <tr>
                    <td colspan=2 width="82%"><b style="color:#fff;">PROCEDENCIA: </b>&nbsp;&nbsp;&nbsp;&nbsp;<span>' . $this->procedenciaCorrespondencia . '</span></td>                    
                    <td width="18%">
                    <label for="html">';
        $this->Image(base_url() . $this->estadonivelCheckPCorrespondencia, 196.3, 56.7, 3.7, 4.2, 'PNG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
        $contenedorSeccion1 .= '</label>
                    </td>
                </tr>
                <tr>
                    <td width="41%"><b style="color:#fff;">FECHA DE INGRESO: </b>&nbsp;&nbsp;&nbsp;&nbsp;<span>' . $this->fechaIngresoCorrespondencia . '</span></td>
                    <td width="41%">&nbsp;</td>
                    <td width="18%">
                    <label for="html">';
        $this->Image(base_url() . $this->estadonivelCheckRCorrespondencia, 196.3, 63.7, 3.7, 4.2, 'PNG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
        $contenedorSeccion1 .= '</label>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        ';
        // ---------------------------------------------------------
        // escribe el contenedor - salida del contenido HTML
        //$this->writeHTML($contenedorSeccion1, true, false, true, false, '');
        $this->writeHTMLCell(191.5, '', 11, 48.3, $contenedorSeccion1, 0, 0, 0, true, 'J', true);

        // ---------------------------------------------------------
        $this->SetTopMargin($this->GetY() + 3); //relleno o espacio para la segunda página    
    }
    // Page footer
    public function Footer()
    {
        // Posición a 15 mm de la parte inferior
        $this->SetY(-13);
        // Establecer fuente
        $this->SetFont('helvetica', 'I', 9);
        // Número de página
        $this->Cell(0, 0, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
//$pdf = new MYPDF('P', 'mm', 'LEGAL', true, 'UTF-8', false);
$width = 216;
$height = 333;
$page_format = array($width, $height);
$pdf = new MYPDF('p', 'mm', $page_format, true, 'UTF-8', false);

$numerocodigo = 'GAMEA-' . $correspondencia->cor_codigo . '-' . $correspondencia->ges_gestion;
$referencia = $correspondencia->cor_referencia;
$procedencia = $correspondencia->cor_institucion;
$fechaingreso = date("d/m/Y H:i:s", strtotime($correspondencia->cor_create_at));
$estadonivel = ($correspondencia->cor_nivel == 'U') ? 'URGENTE' : (($correspondencia->cor_nivel == 'P') ? 'PRIORITARIO' : (($correspondencia->cor_nivel == 'R') ? 'RUTINARIO' : ''));
$imgcheckU = ($correspondencia->cor_nivel == 'U') ? 'assets/dist/img/plantilla/check-square-regularU.png' : 'assets/dist/img/plantilla/square-regularU.png';
$imgcheckP = ($correspondencia->cor_nivel == 'P') ? 'assets/dist/img/plantilla/check-square-regularP.png' : 'assets/dist/img/plantilla/square-regularP.png';
$imgcheckR = ($correspondencia->cor_nivel == 'R') ? 'assets/dist/img/plantilla/check-square-regularR.png' : 'assets/dist/img/plantilla/square-regularR.png';
$descripcion = $correspondencia->cor_descripcion;
$observacion = $correspondencia->cor_observacion;
$pdf->cargarPropiedades($numerocodigo, $referencia, $procedencia, $fechaingreso, $estadonivel, $imgcheckU, $imgcheckP, $imgcheckR, $descripcion, $observacion);

// ---------------------------------------------------------
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('René CL');
$pdf->SetTitle('Hoja Ruta');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetMargins(5, 5, 5, false);
$pdf->SetAutoPageBreak(true, 5);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);











// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// Start First Page Group
$pdf->startPageGroup();
// add a page
$pdf->AddPage('P', $page_format, false, false);

//////////////////////////////////
$posicion_y = 50;
$posicion_x = 43;
$ancho = 130;
$alto = 4;
$textLengnt = strlen($referencia);
if ($textLengnt > 64) {
    $tamanoFont = 8;
} else {
    $tamanoFont = 9;
}
$pdf->SetFont('helvetica', '',  $tamanoFont);
$pdf->StartTransform();
$pdf->SetFillColor(255, 255, 255);
$pdf->setCellPaddings(0.1, 0.1, 0.1, 0.1);
$pdf->MultiCell($ancho, $alto, $referencia, 0, 'L', 1, 2, $posicion_x, $posicion_y, true);
$pdf->StopTransform();
//////////////////////////////////

if (!empty($derivacioncorrespondencia)) {
    $positionY = 132;
    $positiontextfechaaceptadaY = 132;
    $postextofi_Y = 105;
    $postextnom_Y = 120;
    $postextdesc_Y = 101.5;
    $postextobs_Y = 111;
    $postextrecha_Y = 120.5;
    $positionQR = 101;
    $postexto_a_nombre_Y = 121;
    $postexto_a_oficina_Y = 126;
    $positionOrigen = 132;
    
 

    foreach ($derivacioncorrespondencia as $key => $valor) {

        $OrigenReporte = '';
        if ($valor->origen == 'O') {
            $OrigenReporte = 'ORIGINAL';
        } else {
            $OrigenReporte = 'COPIA -' . $valor->nro_copia;
        }
        $pdf->SetFont('helvetica', '', 9);
        $pdf->SetXY(17, $positionOrigen);
        $pdf->StartTransform();
        $pdf->Rotate(90);
        $pdf->Cell(30, 5, $OrigenReporte , 0, 1, 'C');
        $pdf->StopTransform();

        $pdf->SetFont('helvetica', '', 11);
        $pdf->SetXY(21, $positionY);
        $pdf->StartTransform();
        $pdf->Rotate(90);
        $pdf->Cell(30, 5, $valor->cor_codigo, 0, 1, 'C');
        $pdf->StopTransform();

        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetXY(37.6, $positiontextfechaaceptadaY);
        $pdf->StartTransform();
        $pdf->Rotate(90);
        $pdf->Cell(30, 5, 'Fecha Aceptada', 0, 1, 'C');
        $pdf->StopTransform();

        $pdf->SetXY(39, $positionY);
        $pdf->StartTransform();
        $pdf->Rotate(90);
        $pdf->Cell(30, 11,  $valor->r_fecha, 0, 1, 'C');
        $pdf->StopTransform();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(34, 5, '(' . $valor->r_oficina . ')', 0, 'L', 1, 2, 57, $postextofi_Y, true);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(34, 5, $valor->r_nombre, 0, 'L', 1, 2, 57, $postextnom_Y, true);
        //$pdf->MultiCell(30, 5, $valor->nombre.' ('.$valor->cargo.')', 0, 'L', 1, 2, 36, $postextnom_Y, true);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(75, 10, 'PROVEIDO: ' . $valor->proveido, 0, 'L', 1, 2, 90, $postextdesc_Y, true);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(75, 10, 'OBSERVACIÓN: ' . $valor->observacion, 0, 'L', 1, 2, 90, $postextobs_Y, true);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(75, 10, 'RECHAZO: ' . $valor->descripcion_rechazo, 0, 'L', 1, 2, 90, $postextrecha_Y, true);

        // set style for barcode
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
        // QRCODE,L : QR-CODE Low error correction
        $datoQ2 = $numerocodigo . '|DE:' . $valor->a_nombre . '(' . $valor->a_cargo . ')' . '- dependencia:' . $valor->a_oficina . '|fecha enviada:' . $valor->a_fecha . '|A:' . $valor->r_nombre . '(' . $valor->r_cargo . ')' . '- dependencia:' . $valor->r_oficina . '|fecha recibida:' . $valor->r_fecha . '|Plazo:' . $valor->r_plazo;
        $pdf->write2DBarcode($datoQ2, 'QRCODE,L', 175, $positionQR, 22, 22, $style, 'N');

        $pdf->SetFont('helvetica', '', 6);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(35, 8, $valor->a_nombre, 0, 'C', 1, 2, 168.5, $postexto_a_nombre_Y, true);

        $pdf->SetFont('helvetica', '', 6);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(35, 5, '(' . $valor->a_oficina . ')', 0, 'C', 1, 2, 168.5, $postexto_a_oficina_Y, true);



        $positionY = $positionY + 30.8;
        $positiontextfechaaceptadaY = $positiontextfechaaceptadaY + 30.8;
        $postextofi_Y = $postextofi_Y + 30.8;
        $postextnom_Y = $postextnom_Y + 30.8;
        $postextrecha_Y = $postextrecha_Y + 30.8;
        $postextdesc_Y = $postextdesc_Y + 30.8;
        $postextobs_Y = $postextobs_Y + 30.8;
        $positionQR = $positionQR + 30.8;
        $postexto_a_nombre_Y = $postexto_a_nombre_Y + 30.8;
        $postexto_a_oficina_Y = $postexto_a_oficina_Y + 30.8;
        $positionOrigen = $positionOrigen + 30.8;
        if ($i == 7) {
            // Start Second Page Group
            $pdf->startPageGroup();
            // add second page
            $pdf->AddPage('P', $page_format, false, false);
            $positionOrigen =132;
            $positionY = 132;
            $positiontextfechaaceptadaY = 132;
            $postextofi_Y = 105;
            $postextnom_Y = 120;
            $postextdesc_Y = 101.5;
            $postextobs_Y = 111;
            $postextrecha_Y = 120.5;
            $positionQR = 101;
            $postexto_a_nombre_Y = 121;
            $postexto_a_oficina_Y = 126;
        }
    }
}

// ---------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output('hojaderuta_' . $numerocodigo . '.pdf', 'I');
//$pdf->Output('hojaruta_COD-00023-21.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+