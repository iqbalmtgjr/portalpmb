<?php defined('BASEPATH') OR exit('No direct script access allowed');

	require_once("./application/third_party/dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
    date_default_timezone_set('Asia/Jakarta');
	class Pdfgenerator1 {
		  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
		  {
		    
			$dompdf = new DOMPDF();
			$dompdf->loadHtml($html);
			$dompdf->setPaper($paper, $orientation);
			$dompdf->render();
			if ($stream) {
				$dompdf->stream($filename.".pdf", array("Attachment" => 0));
			} else {
				return $dompdf->output();
			}
		  }
	}