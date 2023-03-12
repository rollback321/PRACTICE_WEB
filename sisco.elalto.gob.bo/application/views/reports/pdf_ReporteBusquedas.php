<?php

//require_once dirname(__FILE__).'/TCPDF/tcpdf.php';
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    var $referencia;


    public function cargarPropiedades($cuerpo)
    {
        $this->referencia = $cuerpo;
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
$referencia = $cuerpo;
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

date_default_timezone_set('America/La_Paz');
$time = time();
$Fecha = date("Y-m-d H:i:s", $time);

// ---------------------------------------------------------
// ESTABLECER PROPIEDADES DE FORMULARIO PREDETERMINADA
$pdf->SetFont('HELVETICA', 'B', 35);
$pdf->Cell(0, 2, "REPORTES", 0, 1, 'C');
$pdf->SetFont('HELVETICA', 'B', 16);
$pdf->Cell(0, 2, 'POR CRITERIO DE BUSQUEDA', 0, 1, 'C');
$pdf->SetFont('HELVETICA', 'B', 12);
$pdf->Cell(0, 2, "FECHA: ".$Fecha, 0, 5, 'C');

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
$style = array(
    'border' => 1,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // ancho de un solo módulo en puntos
    'module_height' => 1 // altura de un solo módulo en puntos
);
$id_rol_usuario = $this->session->userdata('usu_rol_id');
$nom_usuario = $this->session->userdata('usu_nombres') . "" . $this->session->userdata('usu_apellidos');
// QRCODE,Q : QR-CODE corrección de errores
$datos = 'ID: ' . $id_rol_usuario . ' Nombre: ' . $nom_usuario;
$pdf->write2DBarcode($datos, 'QRCODE,Q', 248, 10, 26, 26, $style, 'Q');
/* NOTE:
 * *********************************************************
 * SEGUNDA SECCION
 * *********************************************************
 */
// Crear contenedor SECCION 2
$pdf->Ln(12);

$total = count($cuerpo);
//$contador = 1;
$contenedorSeccion4 = '
            <div>
            <table width="997" cellpadding="3" border="1" cellspacing="0" style="font-family: verdana, arial, helvetica; font-size: 11px; "> 
                <tr>    
                <th align="center" style="background-color:#D3D3D3;" colspan="2"   width="10%"><b>CODIGO</b></th>
                <th align="center" style="background-color:#D3D3D3;" colspan="2"   width="20%"><b>UBICACION</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="24%"><b>REFERENCIA</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="18%"><b>NOMBRE <br> REMITENTE</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="12%"><b>CARGO <br> REMITENTE</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="12%"><b>INSTITUCION <br> REMITENTE</b></th>
                <th align="center" style="background-color:#D3D3D3;"  colspan="2"  width="14%"><b>CELULAR <br> REMITENTE</b></th>
                </tr>
                <tbody>';

for ($i = 0; $i < $total; $i++) {

    $contenedorSeccion4 .= '
        <tr>  
        <td align="center"  colspan="2"   width="10%">' . $cuerpo[$i]['codigo'] . '</td>
        <td align="center"  colspan="2"  width="20%">' . $cuerpo[$i]['depen'] . '</td>
        <td align="center"  colspan="2"  width="24%">' . $cuerpo[$i]['ref'] . '</td>
        <td align="center"  colspan="2"  width="18%">' . $cuerpo[$i]['rem'] . '</td>
        <td align="center"  colspan="2"  width="12%">' . $cuerpo[$i]['car'] . '</td>
        <td align="center"  colspan="2"  width="12%">' . $cuerpo[$i]['ins'] . '</td>
        <td align="center"  colspan="2"  width="14%">' . $cuerpo[$i]['tel'] . '</td>
        </tr> ';

    // $contador = $contador + 1;  
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