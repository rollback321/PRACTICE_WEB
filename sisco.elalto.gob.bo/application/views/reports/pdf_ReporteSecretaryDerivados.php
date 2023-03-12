<?php

//require_once dirname(__FILE__).'/TCPDF/tcpdf.php';
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
    var $referencia;
    public function cargarPropiedades($referencia)
    {
        $this->referencia = $referencia;
    }

    // Page footer
    public function Footer()
    {
        // Posición a 15 mm de la parte inferior
        $this->SetY(-28);
        // Establecer fuente
        $this->SetFont('helvetica', 'I', 8);

        // Número de página
        $this->Cell(0, 20, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}





// create new PDF document
$width = 216;
$height = 331;
$page_format = array($width, $height);
$pdf = new MYPDF('p', 'mm', $page_format, true, 'UTF-8', false);
//$pdf=new MYPDF('P','pt',array(612,1008),true, 'UTF-8', false);
$referencia = $correspondencia[0]->cor_referencia;
//$numerocodigo = 'GAMEA-'.$correspondencia->cor_codigo.'-'.$correspondencia->ges_gestion;
$pdf->cargarPropiedades($referencia);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SISCO');
$pdf->SetTitle('REPORTE HOJAS DE RUTA DERIVADAS');
$pdf->SetSubject(' GAMEA');
$pdf->SetKeywords('GAMEA, PDF, REPORTE, SEMANAL');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);
$pdf->SetMargins(8, 8, 8, false);
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
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


$pdf->AddPage();
$pdf->SetFont('helvetica', '', 8);
/* NOTE:
 * *********************************************************
 * PRIMERA CABECERA
 * **********************************************************/
// CREAR CONTENEDOR CABECERA
$contenedorCabecera = '<div style="line-height: 82pt;"></div>';
// obtiener la posición vertical actual
$y = $pdf->getY();
// establecer color para el fondo del contenedor
$pdf->SetFillColor(255, 255, 255);
// establecer el color del texto
$pdf->SetTextColor(0, 0, 0);
// escribe el contenedor
$pdf->writeHTMLCell(196, '', '', $y, $contenedorCabecera, 1, 0, 1, true, 'J', true);
// restablecer el puntero a la última página
//$pdf->lastPage();

// ---------------------------------------------------------
// IMAGEN con cambio de tamaño, ESCUDO DE EL ALTO


// ---------------------------------------------------------
// IMAGEN con cambio de tamaño, ESCUDO DE EL ALTO


$pdf->Image(base_url() . '/assets/dist/img/plantilla/escudo-elalto.jpg', 10, 12, 15, 20, 'JPG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
$pdf->SetFont('helvetica', 'B', 8);
$pdf->SetX(25);
$pdf->Cell(8, 17, 'GOBIERNO', 0, 0, 'L');
$pdf->SetX(25);
$pdf->Cell(8, 23, 'AUTONOMO', 0, 0, 'L');
$pdf->SetX(25);
$pdf->Cell(8, 29, 'MUNICIPAL', 0, 0, 'L');
$pdf->SetFont('helvetica', 'B', 8);
$pdf->SetX(25);
$pdf->Cell(8, 35, 'EL ALTO', 0, 0, 'L');


// ---------------------------------------------------------
//Insertar saltos de línea
$pdf->Ln(5);
// ---------------------------------------------------------
// ESTABLECER PROPIEDADES DE FORMULARIO PREDETERMINADA
$pdf->SetFont('HELVETICA', 'B', 14);
$pdf->Cell(0, 2, "REPORTE HOJAS DE RUTA DERIVADAS", 0, 1, 'C');
$pdf->SetFont('HELVETICA', 'B', 10);
$pdf->Cell(0, 2, "A: ". $recepcionista[0]->usu_nombres.' '.$recepcionista[0]->usu_apellidos  ."", 0, 1, 'C');
$pdf->SetFont('HELVETICA', 'B', 10);
$pdf->Cell(0, 2, "DE FECHA: " . $f_inicio . " A: " . $f_final, 0, 1, 'C');

// ---------------------------------------------------------
// IMAGEN con cambio de tamaño, LOGO GAMEA
//$pdf->Image(base_url() . '/assets/dist/img/plantilla/logo-gamea.jpg', 265, 15, 0, 25, 'PNG', '#', '', true, 300, '', false, false, 0, false, false, false);

$pdf->Image(base_url() . '/assets/dist/img/plantilla/logo-gamea.jpg', 170.5, 12, 23, 19, 'JPG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
// $pdf->Ln(-1);
// $pdf->SetFont('helvetica', 'N', 7.5);
// $pdf->SetX(170);
// $pdf->Cell(15, 3, 'SOLO PARA', 0, 1, 'C');
// $pdf->SetX(170);
// $pdf->Cell(15, 3, 'CONTROL INTERNO DEL GAMEA', 0, 1, 'C');


// $this->Ln(-2);
// $this->SetFont('helvetica', 'N', 7.5);
// $this->Cell(198, 5, 'SOLO PARA CONTROL INTERNO', 0, 1, 'R');

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
date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
$datos = 'Oficina: Ventanilla Unica. Fecha de Reporte: '.$fecha;
$pdf->write2DBarcode($datos, 'QRCODE,Q', 250, 12, 26, 26, $style, 'Q');
/* NOTE:
 * *********************************************************
 * SEGUNDA SECCION
 * *********************************************************
 */
////////////////////////////////////
date_default_timezone_set('America/La_Paz');
$time = time();
$fechaActual = date("Y-m-d H:i:s", $time);
$total2=count($correspondencia);
$positionParrafoX = 5;
$positionParrafoY = 38;
$pdf->StartTransform();
$pdf->SetFont('helvetica', '', 7);
$pdf->SetFillColor(255, 255, 255);
$pdf->setCellPaddings(1, 1, 1, 1);
$pdf->MultiCell(200, 8, 'EN EL PRESENTE DOCUMENTO SE DETALLAN '.$total2.' HOJA(S) DE RUTA ASIGNADA(S) POR EL (LA) FUNCIONARARIO(A): ' . $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos') . ', AL (LA) FUNCIONARIO(A): '.$recepcionista[0]->usu_nombres.' '.$recepcionista[0]->usu_apellidos .' ES ASIGNADO EN FECHA: '.$fechaActual.' PARA SEGUIR CON LAS RESPECTIVA(S) PROSECUCION(ES) DEL(LOS) TRAMITE(S).', 0, 'L', 1, 2, $positionParrafoX, $positionParrafoY, true);
$pdf->StopTransform();
/////////////////////////////////////////////////////////
// Crear contenedor SECCION 2
    $pdf->Ln(10);

    $total=count($correspondencia);
    $contador=1;
    $contenedorSeccion4 = '

            <div>
            <table width="714" cellpadding="3" border="1" cellspacing="0" style="font-family: verdana, arial, helvetica; font-size: 8px; "> 
                <tr>    
                <th align="center" style="background-color:#D3D3D3;" colspan="2"   width="3%"><b>Nº</b></th>
                <th align="center" style="background-color:#D3D3D3;" colspan="2"   width="12%"><b>CODIGO</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="8%"><b>NIVEL</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="20%"><b>REFERENCIA</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="22%"><b>DESCRIPCION</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="10%"><b>NOMBRE<BR>REMITENTE<BR>(ORIGEN)</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="12%"><b>INSTITUTO<BR>REMITENTE<BR>(ORIGEN)</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="10%"><b>FECHA<BR>DERIVACION</b></th>
                </tr>
                <tbody>';

                for ( $i = 0; $i < $total; $i++) {
                    if(($correspondencia[$i]->cor_nivel)=='U'){$tipo="URGENTE";}
                    if(($correspondencia[$i]->cor_nivel)=='R'){$tipo="RUTINARIO";}
                    if(($correspondencia[$i]->cor_nivel)=='P'){$tipo="PRIORITARIO";}
                    $Origen =(($correspondencia[$i]->origen)=='O') ? "ORIGINAL" : "COPIA-".$correspondencia[$i]->nro_copia ;

                    $codigo="GAMEA-".$correspondencia[$i]->cor_codigo."-".$correspondencia[$i]->ges_gestion;
                  
                    
                                $contenedorSeccion4 .= '
                    <tr>  
                    <td align="center"  colspan="2"   width="3%">' . $contador.'</td>
                    <td align="center"  colspan="2"  width="12%"style="font-size:7px;">' . $codigo.'<br>'.$Origen.'</td>
                    <td align="center"  colspan="2"  width="8%" style="font-size:6px;">' . $tipo.'</td>
                    <td align="center"  colspan="2"  width="20%" style="font-size:7px;">' . $correspondencia[$i]->cor_referencia.'</td>
                    <td align="center"  colspan="2"  width="22%" style="font-size:7px;">' . $correspondencia[$i]->cor_descripcion.'</td>
                    <td align="center"  colspan="2"  width="10%" style="font-size:7px;">' . $correspondencia[$i]->cor_nombre_remitente.'</td>
                    <td align="center"  colspan="2"  width="12%" style="font-size:7px;">' . $correspondencia[$i]->cor_institucion.'</td>
                    <td align="center"  colspan="2"  width="10%" style="font-size:7px;">' . $correspondencia[$i]->a_fecha.'</td>
                    </tr> ';
                    $contador=$contador+1;
                }
        $contenedorSeccion4 .= '
            </tbody>
            </table>
            </div>
            <p>CANTIDAD DE REGISTRO(S) IMPRESO(S): '.$total.' HOJA(S) DE RUTA(S) ASIGNADO(S).</p>
            <p>VEIRIFIQUE LA CANTIDAD DE HOJA(S) DE RUTA(S) ASIGNADA(S) ANTES DE COLOCAR LOS SELLOS Y ACLARACION DE FIRMA Y FECHA DE RECEPCION.</p>
            <br>
            <p>Firma Recepcionador:...............................</p>
            <p>Aclaracion Firma:..................................</p>
            <p>Fecha de Recepcion:................................</p>
            ';
// ---------------------------------------------------------
// escribe el contenedor - salida del contenido HTML
//$pdf->writeHTMLCell(0, '', 7, 50, $contenedorSeccion3, 0, 0, 0, true, 'J', true);
$pdf->writeHTMLCell(0, '', 5, 50, $contenedorSeccion4, 0, 0, 0, true, 'J', true);
//$pdf->writeHTML($contenedorSeccion3, true, false, false, false, '');
//$pdf->writeHTML($contenedorSeccion4, true, false, false, false, '');
// restablecer el puntero a la última página
//$pdf->lastPage();

// ---------------------------------------------------------
ob_end_clean();
//Close and output PDF document
$pdf->Output('Reporte Diario.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+


