<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Pdf {
    protected $CI;
    protected $dompdf;

    public function __construct() {
        $this->CI =& get_instance();
        $this->dompdf = new Dompdf();
    }

    public function create_pdf($html, $filename) {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}
?>