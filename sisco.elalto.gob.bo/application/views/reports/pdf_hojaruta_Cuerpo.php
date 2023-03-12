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
        // ---------------------------------------------------------
        // CREAR CONTENEDOR CABECERA
        $contenedorCabecera = '<div style="line-height: 35mm;"></div>';
        // obtiener la posición vertical actual
        //$y = $this->getY();
        $y = $this->getY() + 5;
        // establecer color para el fondo del contenedor
        $this->SetFillColor(255, 255, 255);
        // establecer el color del texto
        $this->SetTextColor(0, 0, 0);
        // escribe el contenedor
        $this->writeHTMLCell(187.5, '', 15, 10, $contenedorCabecera, 1, 0, 1, true, 'J', true);
        // restablecer el puntero a la última página
        //$pdf->lastPage();

        // ---------------------------------------------------------
        // IMAGEN con cambio de tamaño, ESCUDO DE EL ALTO
        $this->Image(base_url() . '/assets/dist/img/plantilla/escudo-elalto.jpg', 17, 15, 23, 28, 'JPG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
        $this->SetFont('helvetica', 'B', 12);
        $this->SetX(42);
        $this->Cell(10, 19, 'GOBIERNO', 0, 0, 'L');
        $this->SetX(42);
        $this->Cell(10, 29, 'AUTONOMO', 0, 0, 'L');
        $this->SetX(42);
        $this->Cell(10, 39, 'MUNICIPAL', 0, 0, 'L');
        $this->SetFont('helvetica', 'B', 16);
        $this->SetX(42);
        $this->Cell(10, 50, 'EL ALTO', 0, 0, 'L');

        // ---------------------------------------------------------
        //Insertar saltos de línea
        $this->Ln(5);

        // ---------------------------------------------------------
        // ESTABLECER PROPIEDADES DE FORMULARIO PREDETERMINADA
        $this->SetFont('helvetica', 'N', 22);
        $this->Cell(0, 4, $this->numerocodigo, 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 22);
        $this->Cell(0, 4, 'HOJA DE RUTA', 0, 1, 'C');
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(0, 4, 'REGISTRO UNICO DE TRAMITES', 0, 1, 'C');

        // ---------------------------------------------------------
        // IMAGEN con cambio de tamaño, LOGO GAMEA
        $this->Image(base_url() . '/assets/dist/img/plantilla/logo-gamea.jpg', 150.5, 15, 27, 22, 'JPG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
        $this->Ln(-1);
        $this->SetFont('helvetica', 'N', 7.5);
        $this->SetX(170);
        $this->Cell(15, 3, 'SOLO PARA', 0, 1, 'C');
        $this->SetX(170);
        $this->Cell(15, 3, 'CONTROL INTERNO DEL GAMEA', 0, 1, 'C');

        // ---------------------------------------------------------
        // establecer estilo para CÓDIGO DE BARRAS QR
        $style = array(
            'border' => 1,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0, 0, 0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // ancho de un solo módulo en puntos
            'module_height' => 1 // altura de un solo módulo en puntos
        );
        // QRCODE,Q : QR-CODE corrección de errores
        $datos = $this->numerocodigo . '|' . $this->referenciaCorrespondencia . '|' . $this->fechaIngresoCorrespondencia . '|' . $this->estadonivelCorrespondencia;
        $this->write2DBarcode($datos, 'QRCODE,Q', 179.5, 15, 22, 22, $style, 'N');

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
                line-height: 18pt
            }
        </style>
        <div>
        <table cellspacing="0" cellpadding="2" border="1" style="width: 100%;" class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan=2 width="82%">&nbsp;<b>REFERENCIAS: </b><span>' . $this->referenciaCorrespondencia . '</span></td>
                    <td width="18%">
                    <label for="html">';
        $this->Image(base_url() . $this->estadonivelCheckUCorrespondencia, 172, 48, 3.5, 4, 'PNG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
        $contenedorSeccion1 .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>URGENTE</b></label>
                    </td>
                </tr>
                <tr>
                    <td colspan=2 width="82%">&nbsp;<b>PROCEDENCIA: </b><span>' . $this->procedenciaCorrespondencia . '</span></td>
                    <td width="18%">
                    <label for="html">';
        $this->Image(base_url() . $this->estadonivelCheckPCorrespondencia, 172, 56, 3.5, 4, 'PNG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
        $contenedorSeccion1 .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PRIORITARIO</b></label>
                    </td>
                </tr>
                <tr>
                    <td width="38%">&nbsp;<b>FECHA DE INGRESO: </b><span>' . $this->fechaIngresoCorrespondencia . '</span></td>
                    <td width="44%">&nbsp;</td>
                    <td width="18%">
                    <label for="html">';
        $this->Image(base_url() . $this->estadonivelCheckRCorrespondencia, 172, 63, 3.5, 4, 'PNG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
        $contenedorSeccion1 .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>RUTINARIO</b></label>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        ';
        // ---------------------------------------------------------
        // escribe el contenedor - salida del contenido HTML
        //$this->writeHTML($contenedorSeccion1, true, false, true, false, '');
        $this->writeHTMLCell(189, '', 13.5, 46.3, $contenedorSeccion1, 0, 0, 0, true, 'J', true);

        /* NOTE:
         * *********************************************************
         * SEGUNDA SECCION
         * *********************************************************
         */
        // Crear contenedor SECCION 2

        
        
        $contenedorSeccion2 = '
        <style type="text/css">
            table .textoSubtitulo{
                font-size: 9pt;
                font: "helvetica";
                line-height: 12pt; padding-left:10px;
            }
            table .textoSubtituloNegrilla{
                font-size: 11pt;
                font: "helvetica";
                font-weight: bold;
                line-height: 28pt;
                text-align: center;
            }
        </style>
        <div>
        <table cellspacing="0" cellpadding="0" border="1" style="width: 100%;" class="table table-bordered">
            <tbody>
                <tr>
                    <td rowspan="4" id="rotate" width="5%" ></td>
                    <td rowspan="4" id="rotate" width="5%" ></td>
                    <td rowspan="4" id="rotate" width="5%" ></td>
                    <td rowspan="4" id="rotate" width="5%" ></td>
                    <td rowspan="4" id="rotate" width="18%"></td>
                    <td colspan="2" width="62%" height="35px" class="textoSubtitulo">
                        <label for="uno"><b>DESC.: </b>' . $this->descripcion . '</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="62%" height="35px" class="textoSubtitulo">
                        <label for="html"><b>OBS.: </b>' . $this->observacion . '</label>
                    </td>
                </tr>
                <tr>
                    <td width="44%" height="35px" class="textoSubtituloNegrilla">PROVEIDO</td>
                    <td width="18%" height="35px" class="textoSubtituloNegrilla">FIRMA</td>
                </tr>                
            </tbody>
        </table>
        </div>';
        // ---------------------------------------------------------
        // escribe el contenedor - salida del contenido HTML
        //$this->writeHTML($contenedorSeccion1, true, false, true, false, '');
        $this->writeHTMLCell(189, '', 13.5, 70, $contenedorSeccion2, 0, 0, 0, true, 'J', true);

        /* NOTE:
         * *********************************************************
         * Rotar texto - VERTICAL 90grados
         * *********************************************************
         */
        // ---------------------------------------------------------
        $this->SetFont('helvetica', 'N', 9);

        $this->SetXY(17, 98);
        $this->StartTransform();
        $this->Rotate(90);
        $this->Cell(20, 5, 'NÚMERO', 0, 1, 'L');
        $this->StopTransform();

        $this->SetXY(27, 98);
        $this->StartTransform();
        $this->Rotate(90);
        $this->Cell(25, 5, 'Nro.REG.INTERNO', 0, 1, 'L');
        $this->StopTransform();

        $this->SetXY(36.5, 98);
        $this->StartTransform();
        $this->Rotate(90);
        $this->Cell(31, 5, 'FECHA/HORA', 0, 1, 'L');
        $this->StopTransform();

        $this->SetXY(46, 98);
        $this->StartTransform();
        $this->Rotate(90);
        $this->Cell(31, 5, 'FJS/Nº CARPETA', 0, 1, 'L');
        $this->StopTransform();

        $this->SetFont('helvetica', 'B', 12);
        $this->SetXY(35, 61);
        $this->Cell(68, 46, 'DESTINO', 0, 1, 'C');

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
$height = 331;
$page_format = array($width, $height);
$pdf = new MYPDF('p', 'mm', $page_format, true, 'UTF-8', false);

$numerocodigo = 'GAMEA-' . $correspondencia->cor_codigo . '-' . $correspondencia->ges_gestion;
$referencia = $correspondencia->cor_referencia;
$procedencia = $correspondencia->cor_institucion;
$fechaingreso = date("d/m/Y H:i:s", strtotime($correspondencia->cor_create_at));
$estadonivel = ($correspondencia->cor_nivel == 'U') ? 'URGENTE' : (($correspondencia->cor_nivel == 'p') ? 'PRIORITARIO' : (($correspondencia->cor_nivel == 'R') ? 'RUTINARIO' : ''));
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
// set some text to print
$pdf->writeHTMLCell(189, '', 14, 101, generarGrilla(7), 0, 0, 0, true, 'J', true);


if (!empty($derivacioncorrespondencia)) {
   
    $positionOrigen = 132;
    $positionY = 132;
    $positiontextfechaaceptadaY = 132;
    $postextofi_Y = 105;
    $postextnom_Y = 120;
    $postextdesc_Y = 101.5;
    $postextobs_Y = 111;
    $postextrecha_Y = 120.5;
    $positionQR = 101;
    $postexto_a_nombre_Y = 121;
    $postexto_a_oficina_Y = 127;

    foreach ($derivacioncorrespondencia as $key => $valor) {
         // set font
         if($valor->origen=='O'){
            $OrigenReporte='ORIGINAL';
        }else{
            $OrigenReporte='COPIA -'.$valor->nro_copia;
        }
        $pdf->SetXY(9, $positionOrigen);
        $pdf->StartTransform();
        $pdf->Rotate(90);
        $pdf->Cell(30, 5,  $OrigenReporte, 0, 1, 'C');
        $pdf->StopTransform();
        // set font
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetXY(17, $positionY);
        $pdf->StartTransform();
        $pdf->Rotate(90);
        $pdf->Cell(30, 5, $valor->cor_codigo, 0, 1, 'C');
        $pdf->StopTransform();

        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetXY(33.6, $positiontextfechaaceptadaY);
        $pdf->StartTransform();
        $pdf->Rotate(90);
        $pdf->Cell(30, 5, 'Fecha Aceptada', 0, 1, 'C');
        $pdf->StopTransform();

        $pdf->SetXY(35, $positionY);
        $pdf->StartTransform();
        $pdf->Rotate(90);
        $pdf->Cell(30, 11, $valor->r_fecha, 0, 1, 'C');
        $pdf->StopTransform();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(34, 5, '(' . $valor->r_oficina . ')', 0, 'L', 1, 2, 53, $postextofi_Y, true);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
       // $pdf->MultiCell(34, 5, $valor->r_nombre, 0, 'L', 1, 2, 53, $postextnom_Y, true);
        $pdf->MultiCell(34, 5, $valor->r_oficina_nombre, 0, 'L', 1, 2, 53, $postextnom_Y, true);
        //$pdf->MultiCell(30, 5, $valor->nombre.' ('.$valor->cargo.')', 0, 'L', 1, 2, 36, $postextnom_Y, true);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(65, 10, 'PROVEIDO: ' . $valor->proveido, 0, 'L', 1, 2, 86, $postextdesc_Y, true);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->setCellPaddings(1, 1, 1, 1);
        $pdf->MultiCell(83, 10, 'OBSERVACIÓN: ' . $valor->observacion, 0, 'L', 1, 2, 86, $postextobs_Y, true);

        // $pdf->SetFillColor(255, 255, 255);
        // $pdf->setCellPaddings(1, 1, 1, 1);
        // $pdf->MultiCell(83, 10, 'RECHAZO: ' . $valor->descripcion_rechazo, 0, 'L', 1, 2, 86, $postextrecha_Y, true);

  


        // QRCODE,L : QR-CODE Low error correction






        $positionY = $positionY + 30.9;
        $positiontextfechaaceptadaY = $positiontextfechaaceptadaY + 30.9;
        $postextofi_Y = $postextofi_Y + 30.9;
        $postextnom_Y = $postextnom_Y + 30.9;
        $postextrecha_Y = $postextrecha_Y + 30.9;
        $postextdesc_Y = $postextdesc_Y + 30.9;
        $postextobs_Y = $postextobs_Y + 30.9;
  
        $postexto_a_nombre_Y = $postexto_a_nombre_Y + 30.9;
        $postexto_a_oficina_Y = $postexto_a_oficina_Y + 30.9;

        if ($i == 7) {
            // Start Second Page Group
            $pdf->startPageGroup();
            // add second page
            $pdf->AddPage('P', $page_format, false, false);
            // set some text to print
            $pdf->writeHTMLCell(188.4, '', 4, 89, generarGrilla(7), 0, 0, 0, true, 'J', true);

            $positionY = 122;
            $postextofi_Y = 93;
            $postextnom_Y = 110;
            $postextrecha_Y = 88.2;
            $postextdesc_Y = 99.5;
            $postextobs_Y = 112;
          
        }
    }
}

function generarGrilla($nrofilas)
{
    $grilla = '
<style type="text/css">
.tb_derivaciones{
    font-size: 9pt;
    font:"helvetica";
}
.parrafo_b{
    /*line-height: 56pt;*/
}
.separacion{
    line-height: 22pt;
}
</style>
<div>
<table cellspacing="0" cellpadding="0" border="1" style="width: 100%;" class="table table-bordered tb_derivaciones">         
    <tbody>';
    for ($i = 1; $i <= $nrofilas; $i++) {
        $grilla .= '
        <tr>
            <td rowspan="2" width="5%"></td>
            <td rowspan="2" width="5%"></td>
            <td rowspan="2" width="5%"></td>
            <td rowspan="2" width="5%"></td>
            <td width="18%" height="55px"><b>&nbsp;OFICINA</b></td>
            <td rowspan="2" width="44.2%" class="contenedorTexto">                                              
                
                
            </td>
            <td rowspan="2" width="18%"></td>
        </tr>
        <tr>
            <td width="18%" height="55px"><b>&nbsp;NOMBRE</b></td>
        </tr>';
    }
    $grilla .= '        
    </tbody>
</table>
</div>';
    return $grilla;
}




// ---------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output('hojaderuta_' . $numerocodigo . '.pdf', 'I');
//$pdf->Output('hojaruta_COD-00023-21.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+