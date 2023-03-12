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
$pdf = new MYPDF('L', 'mm', array(222, 331), true, 'UTF-8', false);
//$pdf=new MYPDF('P','pt',array(612,1008),true, 'UTF-8', false);
$referencia = $correspondencia[0]['cor_referencia'];
//$numerocodigo = 'GAMEA-'.$correspondencia->cor_codigo.'-'.$correspondencia->ges_gestion;
$pdf->cargarPropiedades($referencia);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SISCO');
$pdf->SetTitle('REPORTE ');
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
$contenedorCabecera = '<div style="line-height: 105pt;"></div>';
// obtiener la posición vertical actual
$y = $pdf->getY();
// establecer color para el fondo del contenedor
$pdf->SetFillColor(255, 255, 255);
// establecer el color del texto
$pdf->SetTextColor(0, 0, 0);
// escribe el contenedor
$pdf->writeHTMLCell(315, '', '', $y, $contenedorCabecera, 1, 0, 1, true, 'J', true);
// restablecer el puntero a la última página
//$pdf->lastPage();

// ---------------------------------------------------------
// IMAGEN con cambio de tamaño, ESCUDO DE EL ALTO


// ---------------------------------------------------------
// IMAGEN con cambio de tamaño, ESCUDO DE EL ALTO


$pdf->Image(base_url() . '/assets/dist/img/plantilla/escudo-elalto.jpg', 15, 12, 23, 28, 'JPG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->SetX(42);
$pdf->Cell(10, 19, 'GOBIERNO', 0, 0, 'L');
$pdf->SetX(42);
$pdf->Cell(10, 29, 'AUTONOMO', 0, 0, 'L');
$pdf->SetX(42);
$pdf->Cell(10, 39, 'MUNICIPAL', 0, 0, 'L');
$pdf->SetFont('helvetica', 'B', 16);
$pdf->SetX(42);
$pdf->Cell(10, 50, 'EL ALTO', 0, 0, 'L');


// ---------------------------------------------------------
//Insertar saltos de línea
$pdf->Ln(5);
// ---------------------------------------------------------
// ESTABLECER PROPIEDADES DE FORMULARIO PREDETERMINADA
$pdf->SetFont('HELVETICA', 'B', 35);
$pdf->Cell(0, 2, "REPORTES", 0, 1, 'C');
$pdf->SetFont('HELVETICA', 'B', 16);
$pdf->Cell(0, 2, $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos'), 0, 1, 'C');
$pdf->SetFont('HELVETICA', 'B', 12);
$pdf->Cell(0, 2, "DE FECHA: " . $f_inicio . " A: " . $f_final, 0, 1, 'C');

// ---------------------------------------------------------
// IMAGEN con cambio de tamaño, LOGO GAMEA
//$pdf->Image(base_url() . '/assets/dist/img/plantilla/logo-gamea.jpg', 265, 15, 0, 25, 'PNG', '#', '', true, 300, '', false, false, 0, false, false, false);

$pdf->Image(base_url() . '/assets/dist/img/plantilla/logo-gamea.jpg', 280.5, 15, 27, 22, 'JPG', 'http://www.google.com', '', true, 300, '', false, false, 0, false, false, false);
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
/*$style = array(
    'border' => 1,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // ancho de un solo módulo en puntos
    'module_height' => 1 // altura de un solo módulo en puntos
);*/
// QRCODE,Q : QR-CODE corrección de errores
/*$datos = 'Almacen: ' . $pdf->nombreUnidad . ' Fechas de reporte: ' . $pdf->fechasReporte;
$pdf->write2DBarcode($datos, 'QRCODE,Q', 228, 9, 26, 26, $style, 'Q');*/
/* NOTE:
 * *********************************************************
 * SEGUNDA SECCION
 * *********************************************************
 */
// Crear contenedor SECCION 2
$pdf->Ln(12);

$total = count($correspondencia);
$contador = 1;
$contenedorSeccion4 = '
            <div>
            <table width="997" cellpadding="3" border="1" cellspacing="0" style="font-family: verdana, arial, helvetica; font-size: 11px; "> 
                <tr>    
                <th align="center" style="background-color:#D3D3D3;" colspan="2"   width="3%"><b>Nº</b></th>
                <th align="center" style="background-color:#D3D3D3;" colspan="2"   width="10%"><b>CODIGO</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="8%"><b>NIVEL</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="20%"><b>REFERENCIA</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="24%"><b>DESCRIPCION</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="10%"><b>NOMBRE<BR>REMITENTE</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="12%"><b>INSTITUTO<BR>REMITENTE</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="8%"><b>UBICACION <BR> ACTUAL</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="8%"><b>SERVIDOR <BR> PUBLICO</b></th>
                </tr>
                <tbody>';

for ($i = 0; $i < $total; $i++) {
    if (($correspondencia[$i]['cor_nivel']) == 'U') {
        $tipo = "URGENTE";
    }
    if (($correspondencia[$i]['cor_nivel']) == 'R') {
        $tipo = "RUTINARIO";
    }
    if (($correspondencia[$i]['cor_nivel']) == 'P') {
        $tipo = "PRIORITARIO";
    }

    $countCorres = count($correspondencia);
    $countHistorial = count($historial);
    $countCopias = count($copias);

    for ($i = 0; $i < $countCorres; $i++) {
        if ($countHistorial > 0) {
            for ($z = 0; $z < $countHistorial; $z++) {
                if ($correspondencia[$i]['cor_id'] == $historial[$z]->cor_id) {
                    $dependencia = $historial[$z]->Condicion;
                    $servidor = $historial[$z]->Servidor;
                    $z = $countHistorial;
                } else {
                    $dependencia = $correspondencia[$i]['cor_institucion'];
                    $servidor = $correspondencia[$i]['cor_nombre_remitente'];
                }
            }
        } else {
            $dependencia = $correspondencia[$i]['cor_institucion'];
            $servidor = $correspondencia[$i]['cor_nombre_remitente'];
        }
        $codigo = "GAMEA-" . $correspondencia[$i]['cor_codigo'] . "-" . $correspondencia[$i]['ges_gestion'] . "<br>ORIGINAL";
        $contenedorSeccion4 .= '
                    <tr>  
                    <td align="center"  colspan="2"   width="3%">' . $contador . '</td>
                    <td align="center"  colspan="2"  width="10%">' . $codigo . '</td>
                    <td align="center"  colspan="2"  width="8%">' . $tipo . '</td>
                    <td align="center"  colspan="2"  width="20%">' . $correspondencia[$i]['cor_referencia'] . '</td>
                    <td align="center"  colspan="2"  width="24%">' . $correspondencia[$i]['cor_descripcion'] . '</td>
                    <td align="center"  colspan="2"  width="10%">' . $correspondencia[$i]['cor_nombre_remitente'] . '</td>
                    <td align="center"  colspan="2"  width="12%">' . $correspondencia[$i]['cor_institucion'] . '</td>
                    <td align="center"  colspan="2"  width="8%">' . $dependencia . '</td>
                    <td align="center"  colspan="2"  width="8%">' . $servidor . '</td>
                    </tr> ';

        if ($countCopias > 0) {
            $contador = $contador + 1;
            for ($w = 0; $w < $countCopias; $w++) {
                if ($correspondencia[$i]['cor_id'] == $copias[$w]->cor_id) {
                    $dependencia = $copias[$w]->Condicion;
                    $servidor = $copias[$w]->Servidor;
                    $codigo = "GAMEA-" . $correspondencia[$i]['cor_codigo'] . "-" . $correspondencia[$i]['ges_gestion'] . "<br>COPIA-" . $copias[$w]->nro_copia;
                    $contenedorSeccion4 .= '
                                   <tr>  
                                   <td align="center"  colspan="2"   width="3%">' . $contador . '</td>
                                   <td align="center"  colspan="2"  width="10%">' . $codigo . '</td>
                                   <td align="center"  colspan="2"  width="8%">' . $tipo . '</td>
                                   <td align="center"  colspan="2"  width="20%">' . $correspondencia[$i]['cor_referencia'] . '</td>
                                   <td align="center"  colspan="2"  width="24%">' . $correspondencia[$i]['cor_descripcion'] . '</td>
                                   <td align="center"  colspan="2"  width="10%">' . $correspondencia[$i]['cor_nombre_remitente'] . '</td>
                                   <td align="center"  colspan="2"  width="12%">' . $correspondencia[$i]['cor_institucion'] . '</td>
                                   <td align="center"  colspan="2"  width="8%">' . $dependencia . '</td>
                                   <td align="center"  colspan="2"  width="8%">' . $servidor . '</td>
                                   </tr> ';
                }
              
            }
        }
        $contador = $contador + 1;
    }
   
}
$contenedorSeccion4 .= '
            </tbody>
            </table>
            </div>';
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