<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('dompdf/autoload.inc.php');

use Dompdf\Dompdf;

function pdf_create($html, $filename, $stream = TRUE, $papersize = 'letter', $orientation = 'portrait')
{
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($papersize, $orientation);
    $dompdf->render();

    if ($stream) {
        $dompdf->stream($filename . '.pdf');
    } else {
        $CI =& get_instance();
        $CI->load->helper('file');
        write_file('./pdf/' . $filename . '.pdf', $dompdf->output());
    }
}

/* End of file to_pdf_helper.php */
/* Location: ./application/helpers/to_pdf_helper.php */