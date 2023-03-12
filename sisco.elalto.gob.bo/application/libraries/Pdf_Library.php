<?php
/*
* Author: René Condori Laruta
* start Pdf.php file
* Location: ./application/libraries/Pdf.php
*/

defined('BASEPATH') OR exit('No direct script access allowed');
require_once dirname(__FILE__).'/TCPDF/tcpdf.php';

class Pdf_Library extends TCPDF
{
    public function __construct()
    {
        parent::__construct();
    }
}
