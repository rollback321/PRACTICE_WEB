<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PdfControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf_Library');
        $this->load->model('Model_PDF');
    }

    public function generarPDF_HojaDeRuta()
    {
        $cor_id = $this->input->post('cor_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $fecha = "";
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaDerivacion($cor_id);
       // $recepciondocumentoR = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $nuevoarray = array();
        foreach ($recepciondocumentoR as $row) {
            $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
            $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
            $a_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
            if ($row['r_fecha'] == null) {
                $fecha = "";
            } else {
                $fecha = date("d/m/Y H:i:s", strtotime($row['r_fecha']));
            }
            $a = (object)[
                'cor_id' => $row['cor_id'],
                'cor_codigo' => $row['cor_codigo'],
                'r_fecha' => $fecha,
                'r_plazo' => $row['r_plazo'],
                'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                'r_cargo' => $row['r_usu_rol_cargo'],
                'r_oficina' => $r_dependencia[0]->sigla,
                'referencia' => $row['cor_referencia'],
                'proveido' => $row['a_proveido'],
                'observacion' => $row['a_obs'],
                'descripcion_rechazo' => empty(!$row['descrip_rechazo']) ? $row['descrip_rechazo'] : '',
                'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                'a_oficina' => $a_dependencia[0]->sigla
            ];
            array_push($nuevoarray, $a);
        }
        $arrayData['derivacioncorrespondencia'] = $nuevoarray;
        if ($cor_pdf == 'sobrescribir') {
            $direccion = 'reports/pdf_hojaruta_sobreescribir';
        } else if ($cor_pdf == 'imprimir') {
            $direccion = 'reports/pdf_hojaruta';
        }
        $this->load->view($direccion, $arrayData);
    }





    public function generarPDF_HojaDeRutaProcess_VI_SMGI()
    {
        $cor_id = $this->input->post('cor_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $fecha = "";
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaDerivacion($cor_id);
        $nuevoarray = array();
        foreach ($recepciondocumentoR as $row) {
            $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
            $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
            $a_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
            if ($row['r_fecha'] == null) {
                $fecha = "";
            } else {
                $fecha = date("d/m/Y H:i:s", strtotime($row['r_fecha']));
            }
            $a = (object)[
                'cor_id' => $row['cor_id'],
                'cor_codigo' => $row['cor_codigo'],
                'r_fecha' => $fecha,
                'r_plazo' => $row['r_plazo'],
                'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                'r_cargo' => $row['r_usu_rol_cargo'],
                'r_oficina' => $r_dependencia[0]->sigla,
                'referencia' => $row['cor_referencia'],
                'proveido' => $row['a_proveido'],
                'observacion' => $row['a_obs'],
                'descripcion_rechazo' => empty(!$row['descrip_rechazo']) ? $row['descrip_rechazo'] : '',
                'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                'a_oficina' => $a_dependencia[0]->sigla
            ];
            array_push($nuevoarray, $a);
        }
        $arrayData['derivacioncorrespondencia'] = $nuevoarray;
        if ($cor_pdf == 'sobrescribir') {
            $direccion = 'reports/pdf_hojaruta_sobreescribir';
        } else if ($cor_pdf == 'imprimir') {
            $direccion = 'reports/pdf_hojaruta';
        }
        $this->load->view($direccion, $arrayData);
    }



    public function generarPDF_HojaDeRutaHistorial()
    {
        $his_id = $this->input->post('his_id_pdf');
        $cor_id = $this->input->post('cor_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $fecha = "";
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $SacarOrigen = $this->Model_PDF->Model_SacarOrigen($cor_id, $his_id);
        $origen = $SacarOrigen->origen;
        $nro_copia = $SacarOrigen->nro_copia;
        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaDerivacionHistorial($cor_id, $origen, $nro_copia);
        $nuevoarray = array();
        foreach ($recepciondocumentoR as $row) {
            $r_dependencia = $this->Model_PDF->fetchDependencia($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
            $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
            $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
            if ($row['r_fecha'] == null) {
                $fecha = "";
            } else {
                $fecha = date("d/m/Y H:i:s", strtotime($row['r_fecha']));
            }
            $a = (object)[
                'cor_id' => $row['cor_id'],
                'cor_codigo' => $row['cor_codigo'],
                'r_fecha' => $fecha,
                'r_plazo' => $row['r_plazo'],
                'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                'r_cargo' => $row['r_usu_rol_cargo'],
                //  'r_oficina' => $r_dependencia[0]->sigla,
                'referencia' => $row['cor_referencia'],
                'proveido' => $row['a_proveido'],
                'observacion' => $row['a_obs'],
                'descripcion_rechazo' => empty(!$row['descrip_rechazo']) ? $row['descrip_rechazo'] : '',
                'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                // 'a_oficina' => $a_dependencia[0]->sigla,
                'origen' => $SacarOrigen->origen,
                'nro_copia' =>  $SacarOrigen->nro_copia,
            ];
            array_push($nuevoarray, $a);
        }
        $arrayData['derivacioncorrespondencia'] = $nuevoarray;
        if ($cor_pdf == 'sobrescribirHistorial') {
            $direccion = 'reports/pdf_hojaruta_sobreescribirHistorial';
        } else if ($cor_pdf == 'imprimirHistorial') {
            $direccion = 'reports/pdf_hojarutaHistorial';
        }
        $this->load->view($direccion, $arrayData);
        //  echo json_encode($recepciondocumentoR );
    }


    public function generarPDF_HojaDeRutaHistorialBandejaSMGI()
    {
        $his_id = $this->input->post('his_id_pdf');
        $cor_id = $this->input->post('cor_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $fecha = "";
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $SacarOrigen = $this->Model_PDF->Model_SacarOrigen($cor_id, $his_id);
        $origen = $SacarOrigen->origen;
        $nro_copia = $SacarOrigen->nro_copia;
        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaDerivacionHistorial($cor_id, $origen, $nro_copia);
        $nuevoarray = array();
        foreach ($recepciondocumentoR as $row) {
            $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
            $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
            $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
            if ($row['r_fecha'] == null) {
                $fecha = "";
            } else {
                $fecha = date("d/m/Y H:i:s", strtotime($row['r_fecha']));
            }
            $a = (object)[
                'cor_id' => $row['cor_id'],
                'cor_codigo' => $row['cor_codigo'],
                'r_fecha' => $fecha,
                'r_plazo' => $row['r_plazo'],
                'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                'r_cargo' => $row['r_usu_rol_cargo'],
                'r_oficina' => $r_dependencia[0]->sigla,
                'referencia' => $row['cor_referencia'],
                'proveido' => $row['a_proveido'],
                'observacion' => $row['a_obs'],
                'descripcion_rechazo' => empty(!$row['descrip_rechazo']) ? $row['descrip_rechazo'] : '',
                'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                'a_oficina' => $a_dependencia[0]->sigla,
                'origen' => $SacarOrigen->origen,
                'nro_copia' =>  $SacarOrigen->nro_copia,
            ];
            array_push($nuevoarray, $a);
        }
        $arrayData['derivacioncorrespondencia'] = $nuevoarray;
        if ($cor_pdf == 'sobrescribirHistorial') {
            $direccion = 'reports/pdf_hojaruta_sobreescribirHistorial';
        } else if ($cor_pdf == 'imprimirHistorial') {
            $direccion = 'reports/pdf_hojarutaHistorial';
        }
        $this->load->view($direccion, $arrayData);
    }



    // public function generarPDF_HojaDeRuta()
    // {
    //     $cor_id = $this->input->post('cor_id_pdf');
    //     $cor_pdf = $this->input->post('hdr_pdf');
    //     $direccion = '';
    //     $fecha = "";
    //     $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
    //     $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaDerivacion($cor_id);
    //     $cantidadresepciondocumento = $this->Model_PDF->cantidadResepcionDocumento($this->Model_PDF->rowCorrespondenciaGestion($cor_id)->recepcion_documento_rec_doc_id);

    //     $nuevoarray = array();

    //     foreach ($recepciondocumentoR as $row) {
    //         $r_dependencia = $this->Model_PDF->fetchDependencia($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
    //         $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
    //         $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
    //         if ($row['r_fecha'] == null) {
    //             $fecha = "";
    //         } else {
    //             $fecha = date("d/m/Y H:i:s", strtotime($row['r_fecha']));
    //         }
    //         $a = (object)[
    //             'cor_id' => $row['cor_id'],
    //             'cor_codigo' => $row['cor_codigo'],
    //             'r_fecha' => $fecha,
    //             'r_plazo' => $row['r_plazo'],
    //             'cantidadfojas' => $cantidadresepciondocumento->cant_fojas,
    //             'cantidadcd' => $cantidadresepciondocumento->cant_cd,
    //             'cantidadsobres' => $cantidadresepciondocumento->cant_sobres,
    //             'cantidadcarpetas' => $cantidadresepciondocumento->cant_carpetas,
    //             'cantidadanillados' => $cantidadresepciondocumento->cant_anillados,
    //             'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
    //             'r_cargo' => $row['r_usu_rol_cargo'],
    //             'r_oficina' => $r_dependencia[0]->sigla,
    //             'referencia' => $row['cor_referencia'],
    //             'proveido' => $row['a_proveido'],
    //             'observacion' => $row['a_obs'],
    //             'descripcion_rechazo' => empty(!$row['descrip_rechazo']) ? $row['descrip_rechazo'] : '',
    //             'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
    //             'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
    //             'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
    //             'a_oficina' => $a_dependencia[0]->sigla
    //         ];
    //         array_push($nuevoarray, $a);
    //     }
    //     $arrayData['derivacioncorrespondencia'] = $nuevoarray;
    //     if ($cor_pdf == 'sobrescribir') {
    //         $direccion = 'reports/pdf_hojaruta_sobreescribir';
    //     } else if ($cor_pdf == 'imprimir') {
    //         $direccion = 'reports/pdf_hojaruta';
    //     }
    //     $this->load->view($direccion, $arrayData);
    // }




    // public function generarPDF_HojaDeRutaCabecera()
    // {
    //     $cor_id = $this->input->post('cor_id_pdf');
    //     $cor_pdf = $this->input->post('hdr_pdf');
    //     $direccion = '';
    //     $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
    //     $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaDerivacion($cor_id);
    //     $cantidadresepciondocumento = $this->Model_PDF->cantidadResepcionDocumento($this->Model_PDF->rowCorrespondenciaGestion($cor_id)->recepcion_documento_rec_doc_id);

    //     $nuevoarray = array();
    //     foreach ($recepciondocumentoR as $row) {
    //         $r_dependencia = $this->Model_PDF->fetchDependencia($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
    //         $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
    //         $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));

    //         $a = (object)[
    //             'cor_id' => $row['cor_id'],
    //             'cor_codigo' => $row['cor_codigo'],
    //             'r_fecha' => date("d/m/Y H:i:s", strtotime($row['r_fecha'])),
    //             'r_plazo' => $row['r_plazo'],
    //             'cantidadfojas' => $cantidadresepciondocumento,
    //             'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
    //             'r_cargo' => $row['r_usu_rol_cargo'],
    //             'r_oficina' => $r_dependencia[0]->sigla,
    //             'referencia' => $row['cor_referencia'],
    //             'proveido' => $row['a_proveido'],
    //             'observacion' => $row['a_obs'],
    //             'descripcion_rechazo' => empty(!$row['descrip_rechazo']) ? $row['descrip_rechazo'] : '',
    //             'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
    //             'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
    //             'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
    //             'a_oficina' => $a_dependencia[0]->sigla
    //         ];
    //         array_push($nuevoarray, $a);
    //     }
    //     $arrayData['derivacioncorrespondencia'] = $nuevoarray;
    //     if ($cor_pdf == 'sobrescribir') {
    //         $direccion = 'reports/pdf_hojaruta_sobreescribir_cabecera';
    //     } else if ($cor_pdf == 'imprimir') {
    //         $direccion = 'reports/pdf_hojaruta_cabecera';
    //     }
    //     $this->load->view($direccion, $arrayData);
    // }



    public function generarPDF_HojaDeRutaCabecera()
    {
        $cor_id = $this->input->post('cor_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        if ($cor_pdf == 'sobrescribir') {
            $direccion = 'reports/pdf_hojaruta_sobreescribir_cabecera';
        } else if ($cor_pdf == 'imprimir') {
            $direccion = 'reports/pdf_hojaruta_cabecera';
        }
        $this->load->view($direccion, $arrayData);
    }



    public function generarPDF_HojaDeRutaCuerpo()
    {
        $his_id = $this->input->post('his_id_pdf');
        $cor_id = $this->input->post('cor_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $SacarOrigen = $this->Model_PDF->Model_SacarOrigen($cor_id, $his_id);
        $origen = $SacarOrigen->origen;
        $nro_copia = $SacarOrigen->nro_copia;
        $id_r = $SacarOrigen->id_r;
        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaDerivacionHistorial($cor_id, $origen, $nro_copia);
        $cantidadresepciondocumento = $this->Model_PDF->cantidadResepcionDocumento($this->Model_PDF->rowCorrespondenciaGestion($cor_id)->recepcion_documento_rec_doc_id);
        $BuscarOficina = $this->Model_PDF->BuscarOficinaDestino($id_r);
        $nuevoarray = array();

        foreach ($recepciondocumentoR as $row) {
            $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
            $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
            $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
            $a = (object)[
                'cor_id' => $row['cor_id'],
                'cor_codigo' => $row['cor_codigo'],
                'cantidadfojas' => $cantidadresepciondocumento->cant_fojas,
                'cantidadcd' => $cantidadresepciondocumento->cant_cd,
                'cantidadsobres' => $cantidadresepciondocumento->cant_sobres,
                'cantidadcarpetas' => $cantidadresepciondocumento->cant_carpetas,
                'cantidadanillados' => $cantidadresepciondocumento->cant_anillados,
                'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                'r_cargo' => $row['r_usu_rol_cargo'],
                'r_oficina' => $r_dependencia[0]->sigla,
                'r_oficina_nombre' => $BuscarOficina->dependencia,
                'referencia' => $row['cor_referencia'],
                'proveido' => $row['a_proveido'],
                'observacion' => $row['a_obs'],
                'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                'a_oficina' => $a_dependencia[0]->sigla,
                'origen' => $row['origen'],
                'nro_copia' => $row['nro_copia'],
            ];
            array_push($nuevoarray, $a);
        }
        $arrayData['derivacioncorrespondencia'] = $nuevoarray;
        if ($cor_pdf == 'sobrescribir') {
            $direccion = 'reports/pdf_hojaruta_sobreescribir_Cuerpo';
        } else if ($cor_pdf == 'imprimir') {
            $direccion = 'reports/pdf_hojaruta_Cuerpo';
        }
        $this->load->view($direccion, $arrayData);
    }





    public function ReportesDestino()
    {
        $cor_id = $this->input->post('cor_id_pdf');
        $pend_id = $this->input->post('pend_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaPendiente($pend_id);
        $BuscarOficina = $this->Model_PDF->BuscarDepDestino($pend_id);
        $cantidadresepciondocumento = $this->Model_PDF->cantidadResepcionDocumento($this->Model_PDF->rowCorrespondenciaGestion($cor_id)->recepcion_documento_rec_doc_id);

        $nuevoarray = array();
        foreach ($recepciondocumentoR as $row) {
            $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ||$row['r_nivel_2_niv2_id'] == null ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == ''||$row['r_nivel_3_niv3_id'] == null  ? null : $row['r_nivel_3_niv3_id']));
            $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
            $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
            $a = (object)[
                'cor_id' => $row['cor_id'],
                'cor_codigo' => $row['cor_codigo'],
                'cantidadfojas' => $cantidadresepciondocumento->cant_fojas,
                'cantidadcd' => $cantidadresepciondocumento->cant_cd,
                'cantidadsobres' => $cantidadresepciondocumento->cant_sobres,
                'cantidadcarpetas' => $cantidadresepciondocumento->cant_carpetas,
                'cantidadanillados' => $cantidadresepciondocumento->cant_anillados,
                'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                'r_cargo' => $row['r_usu_rol_cargo'],
                'r_oficina' => $r_dependencia[0]->sigla,
                'r_oficina_nombre' => $BuscarOficina->dependencia,
                'referencia' => $row['cor_referencia'],
                'proveido' => $row['a_proveido'],
                'observacion' => $row['a_obs'],
                'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                'a_oficina' => $a_dependencia[0]->sigla,
                'origen' => $row['origen'],
                'nro_copia' => $row['nro_copia'],
            ];
            array_push($nuevoarray, $a);
        }
        $arrayData['derivacioncorrespondencia'] = $nuevoarray;
        if ($cor_pdf == 'sobrescribirDestino') {
            $direccion = 'reports/pdf_hojaruta_sobreescribirDestino';
        }
        $this->load->view($direccion, $arrayData);
    }

    public function ReportesDestinoVentInterna()
    {
        $cor_id = $this->input->post('cor_id_pdf');
        $pend_id = $this->input->post('pend_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);

        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaPendiente($pend_id);
        $BuscarOficina = $this->Model_PDF->BuscarDepDestino($pend_id);

        $cantidadresepciondocumento = $this->Model_PDF->cantidadResepcionDocumento($this->Model_PDF->rowCorrespondenciaGestion($cor_id)->recepcion_documento_rec_doc_id);

        $nuevoarray = array();
        foreach ($recepciondocumentoR as $row) {
            $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
            $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
            $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
            $a = (object)[
                'cor_id' => $row['cor_id'],
                'cor_codigo' => $row['cor_codigo'],
                'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                'r_cargo' => $row['r_usu_rol_cargo'],
                'cantidadfojas' => $cantidadresepciondocumento->cant_fojas,
                'cantidadcd' => $cantidadresepciondocumento->cant_cd,
                'cantidadsobres' => $cantidadresepciondocumento->cant_sobres,
                'cantidadcarpetas' => $cantidadresepciondocumento->cant_carpetas,
                'cantidadanillados' => $cantidadresepciondocumento->cant_anillados,
                'r_oficina' => $r_dependencia[0]->sigla,
                'r_oficina_nombre' => $BuscarOficina->dependencia,
                'referencia' => $row['cor_referencia'],
                'proveido' => $row['a_proveido'],
                'observacion' => $row['a_obs'],
                'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                'a_oficina' => $a_dependencia[0]->sigla,
                'origen' => $row['origen'],
                'nro_copia' => $row['nro_copia'],
            ];
            array_push($nuevoarray, $a);
        }
        $arrayData['derivacioncorrespondencia'] = $nuevoarray;
        if ($cor_pdf == 'sobrescribirDestinoVentInterna') {
            $direccion = 'reports/pdf_hojaruta_sobreescribirDestinoVentInterna';
        }
        $this->load->view($direccion, $arrayData);
    }

    public function ReportesDestinoVentInternaSMGI_enBandejaSecretaria_SMGI()
    {
        $cor_id = $this->input->post('cor_id_pdf');
        $pend_id = $this->input->post('pend_id_pdf');
        $cor_codigo = intval($this->input->post('cor_codigo_pdf'));
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaPendiente($pend_id);
        $BuscarOficina = $this->Model_PDF->BuscarDepDestino($pend_id);

        if ($cor_codigo > 80000 && $cor_codigo < 100000) {
            $cantidadresepciondocumento = $this->Model_PDF->cantidadResepcionDocumento($this->Model_PDF->rowCorrespondenciaGestion($cor_id)->recepcion_documento_rec_doc_id);
            $nuevoarray = array();
            foreach ($recepciondocumentoR as $row) {
                $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
                $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
                $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
                $a = (object)[
                    'cor_id' => $row['cor_id'],
                    'cor_codigo' => $row['cor_codigo'],
                    'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                    'r_cargo' => $row['r_usu_rol_cargo'],
                    'cantidadfojas' => $cantidadresepciondocumento->cant_fojas,
                    'cantidadcd' => $cantidadresepciondocumento->cant_cd,
                    'cantidadsobres' => $cantidadresepciondocumento->cant_sobres,
                    'cantidadcarpetas' => $cantidadresepciondocumento->cant_carpetas,
                    'cantidadanillados' => $cantidadresepciondocumento->cant_anillados,
                    'r_oficina' => $r_dependencia[0]->sigla,
                    'r_oficina_nombre' => $BuscarOficina->dependencia,
                    'referencia' => $row['cor_referencia'],
                    'proveido' => $row['a_proveido'],
                    'observacion' => $row['a_obs'],
                    'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                    'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                    'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                    'a_oficina' => $a_dependencia[0]->sigla,
                    'origen' => $row['origen'],
                    'nro_copia' => $row['nro_copia'],
                ];
                array_push($nuevoarray, $a);
            }
            $arrayData['derivacioncorrespondencia'] = $nuevoarray;
            if ($cor_pdf == 'sobrescribirDestinoVentInterna') {
                $direccion = 'reports/pdf_hojaruta_sobreescribirDestinoVentInterna';
            }
            $this->load->view($direccion, $arrayData);
        } else {

            $nuevoarray = array();
            foreach ($recepciondocumentoR as $row) {
                $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
                $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
                $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
                $a = (object)[
                    'cor_id' => $row['cor_id'],
                    'cor_codigo' => $row['cor_codigo'],
                    'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                    'r_cargo' => $row['r_usu_rol_cargo'],
                    'r_oficina' => $r_dependencia[0]->sigla,
                    'r_oficina_nombre' => $BuscarOficina->dependencia,
                    'referencia' => $row['cor_referencia'],
                    'proveido' => $row['a_proveido'],
                    'observacion' => $row['a_obs'],
                    'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                    'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                    'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                    'a_oficina' => $a_dependencia[0]->sigla,
                    'origen' => $row['origen'],
                    'nro_copia' => $row['nro_copia'],
                ];
                array_push($nuevoarray, $a);
            }
            $arrayData['derivacioncorrespondencia'] = $nuevoarray;
            if ($cor_pdf == 'sobrescribirDestinoVentInterna') {
                $direccion = 'reports/pdf_hojaruta_sobreescribirDestinoVentInternaDifCod';
            }
            $this->load->view($direccion, $arrayData);
        }
    }
    public function ReportesDestinoVentInternaBandeja()
    {
        $cor_id = $this->input->post('cor_id_pdf');
        $pend_id = $this->input->post('pend_id_pdf');
        $cor_pdf = $this->input->post('hdr_pdf');
        $direccion = '';
        $arrayData['correspondencia'] = $this->Model_PDF->rowCorrespondenciaGestion($cor_id);
        $recepciondocumentoR = $this->Model_PDF->arrayCorrespondenciaPendiente($pend_id);
        $BuscarOficina = $this->Model_PDF->BuscarDepDestino($pend_id);
        $nuevoarray = array();
        foreach ($recepciondocumentoR as $row) {
            $r_dependencia = $this->Model_PDF->fetchDependenciaVentanillaInternaExterna($row['r_nivel_1_niv1_id'], ($row['r_nivel_2_niv2_id'] == '' ? null : $row['r_nivel_2_niv2_id']), ($row['r_nivel_3_niv3_id'] == '' ? null : $row['r_nivel_3_niv3_id']));
            $recepciondocumento = $this->Model_PDF->nombreUsuarioRol($row['idaccion']);
            $a_dependencia = $this->Model_PDF->fetchDependencia($recepciondocumento->a_nivel_1_niv1_id, ($recepciondocumento->a_nivel_2_niv2_id == '' ? null : $recepciondocumento->a_nivel_2_niv2_id), ($recepciondocumento->a_nivel_3_niv3_id == '' ? null : $recepciondocumento->a_nivel_3_niv3_id));
            $a = (object)[
                'cor_id' => $row['cor_id'],
                'cor_codigo' => $row['cor_codigo'],
                'r_nombre' => $row['r_usu_nombres'] . ' ' . $row['r_usu_apellidos'],
                'r_cargo' => $row['r_usu_rol_cargo'],
                'r_oficina' => $r_dependencia[0]->sigla,
                'r_oficina_nombre' => $BuscarOficina->dependencia,
                'referencia' => $row['cor_referencia'],
                'proveido' => $row['a_proveido'],
                'observacion' => $row['a_obs'],
                'a_fecha' => date("d/m/Y H:i:s", strtotime($row['a_fecha'])),
                'a_nombre' => $recepciondocumento->a_usu_nombres . '' . $recepciondocumento->a_usu_apellidos,
                'a_cargo' => $recepciondocumento->a_usu_rol_cargo,
                'a_oficina' => $a_dependencia[0]->sigla,
                'origen' => $row['origen'],
                'nro_copia' => $row['nro_copia'],
            ];
            array_push($nuevoarray, $a);
        }
        $arrayData['derivacioncorrespondencia'] = $nuevoarray;
        if ($cor_pdf == 'sobrescribirDestinoVentInternaBandeja') {
            $direccion = 'reports/pdf_hojaruta_sobreescribirDestinoVentInternaBandeja';
        }
        $this->load->view($direccion, $arrayData);
    }

    function ReporteBusqueda()
    {
        $cuerpo = $this->input->post('gblarray_reporte');
        //var_dump($cuerpo) ;  
        $data = array(
            "cuerpo" => $cuerpo,
        );
        $this->load->library('Pdf_Library');
        $this->load->view('reports/pdf_ReporteBusquedas', $data);
    }

    function ReportesVentanilla()
    {
        $direccion = '';
        $f_inicio = trim($this->input->post('fecha_inicio'));
        $f_final = trim($this->input->post('fecha_final'));
        list($f_inicioD, $f_inicioH) = explode('T', $f_inicio);
        list($f_finalD, $f_finalH) = explode('T', $f_final);
        $arrayData['correspondencia'] = $this->Model_PDF->ReportesVentanillaUnica($f_inicioD, $f_inicioH, $f_finalD, $f_finalH);
        $arrayData['f_inicio'] = $f_inicioD . ' ' . $f_inicioH;
        $arrayData['f_final'] = $f_finalD . ' ' . $f_finalH;
        $this->load->library('Pdf_Library');
        $this->load->view('reports/pdf_ReporteVentanillaUnica', $arrayData);
    }
    function ReportesVentanillaUnicaRecaudaciones()
    {
        $direccion = '';
        $f_inicio = trim($this->input->post('fecha_inicio'));
        $f_final = trim($this->input->post('fecha_final'));
        $usuario = trim($this->input->post('list_usuarios'));
        list($f_inicioD, $f_inicioH) = explode('T', $f_inicio);
        list($f_finalD, $f_finalH) = explode('T', $f_final);
        $arrayData['correspondencia'] = $this->Model_PDF->Model_ReportesVentanillaUnicaRecaudaciones($f_inicioD, $f_inicioH, $f_finalD, $f_finalH, $usuario);
        $arrayData['recepcionista'] = $this->Model_PDF->Model_ReportesVentanillaUnicaRecaudacionesRecepcionista($usuario);
        $arrayData['f_inicio'] = $f_inicioD . ' ' . $f_inicioH;
        $arrayData['f_final'] = $f_finalD . ' ' . $f_finalH;
        $this->load->library('Pdf_Library');
        $this->load->view('reports/pdf_ReporteVentanillaRecaudaciones', $arrayData);
        echo  print_r($arrayData);
    }



    public  function Reportes_Iframe_Secretary()
    {
        $direccion = '';
        $f_inicio = trim($this->input->post('fecha_inicio'));
        $f_final = trim($this->input->post('fecha_final'));
        $usuario = trim($this->input->post('list_usuariosDIRECTA'));
        $criterio = intval(trim($this->input->post('criterioCheck')));
        list($f_inicioD, $f_inicioH) = explode('T', $f_inicio);
        list($f_finalD, $f_finalH) = explode('T', $f_final);
        $arrayData['recepcionista'] = $this->Model_PDF->Model_ReportesVentanillaUnicaRecaudacionesRecepcionista($usuario);
        $arrayData['f_inicio'] = $f_inicioD . ' ' . $f_inicioH;
        $arrayData['f_final'] = $f_finalD . ' ' . $f_finalH;
        $arrayData['correspondencia'] = $this->Model_PDF->Model_Reportes_Secretaria($f_inicioD, $f_inicioH, $f_finalD, $f_finalH, $usuario, $criterio);
        $this->load->library('Pdf_Library');
        if ($criterio == 1) {
            $this->load->view('reports/pdf_ReporteSecretaryRecibidos', $arrayData);
        } else {
            $this->load->view('reports/pdf_ReporteSecretaryDerivados', $arrayData);
        }
    }


    function ReportesVentanillaInternaSMGI()
    {
        $direccion = '';
        $f_inicio = trim($this->input->post('fecha_inicio'));
        $f_final = trim($this->input->post('fecha_final'));
        list($f_inicioD, $f_inicioH) = explode('T', $f_inicio);
        list($f_finalD, $f_finalH) = explode('T', $f_final);
        $arrayData['correspondencia'] = $this->Model_PDF->ReportesVentanillaInternaSMGI($f_inicioD, $f_inicioH, $f_finalD, $f_finalH);
        $arrayData['f_inicio'] = $f_inicioD . ' ' . $f_inicioH;
        $arrayData['f_final'] = $f_finalD . ' ' . $f_finalH;
        $this->load->library('Pdf_Library');
        $this->load->view('reports/pdf_ReporteVentanillaInternaSMGI', $arrayData);
    }
    function ReportesSecretaryFechas()
    {
        $direccion = '';
        $f_inicio = trim($this->input->post('fecha_inicio'));
        $f_final = trim($this->input->post('fecha_final'));
        list($f_inicioD, $f_inicioH) = explode('T', $f_inicio);
        list($f_finalD, $f_finalH) = explode('T', $f_final);
        $data_n1 = $this->Model_PDF->ReportesSecretary_fechas($f_inicioD, $f_inicioH, $f_finalD, $f_finalH);
        $fechaI = $f_inicioD . ' ' . $f_inicioH;
        $fechaF = $f_finalD . ' ' . $f_finalH;

        $data_n2 =  $this->Model_PDF->ModelHistorialOriginal($data_n1);
        if ($data_n2 == null ||  $data_n2 == 0) {
            $data_n2 = null;
            $data_n3 = null;
        } else {
            $data_n3 = $this->Model_PDF->ModelHistorialCopias($data_n1);
        }

        $data = array(
            "correspondencia" => $data_n1,
            "f_inicio" => $fechaI,
            "f_final" => $fechaF,
            "historial" => $data_n2,
            "copias" => $data_n3,
        );

        json_encode($data);
        $this->load->library('Pdf_Library');
        $this->load->view('reports/pdf_ReporteSecretaryFechas', $data);
    }
}
