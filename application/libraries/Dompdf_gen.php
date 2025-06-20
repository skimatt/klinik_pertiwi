<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Pastikan autoload Dompdf sudah benar
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Dompdf_gen {
    public $dompdf; // Dibuat public agar bisa diakses jika perlu fitur-fitur lainnya

    public function __construct() {
        // Inisialisasi Dompdf
        $this->dompdf = new Dompdf();

        // Optional: Atur default font agar tidak error jika font tidak ditemukan
        $this->dompdf->set_option('defaultFont', 'DejaVu Sans');
    }

    /**
     * Load HTML content into dompdf
     */
    public function load_html($html) {
        $this->dompdf->loadHtml($html);
    }

    /**
     * Set ukuran dan orientasi kertas
     */
    public function set_paper($size = 'A4', $orientation = 'portrait') {
        $this->dompdf->setPaper($size, $orientation);
    }

    /**
     * Render HTML menjadi PDF
     */
    public function render() {
        $this->dompdf->render();
    }

    /**
     * Tampilkan atau download PDF ke browser
     */
    public function stream($filename = 'document.pdf', $options = array('Attachment' => 0)) {
        $this->dompdf->stream($filename, $options);
    }
}
