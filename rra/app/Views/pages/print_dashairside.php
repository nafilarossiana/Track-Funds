<?php
require_once('D:\KULIAH\MAGANG\Dashboard RKA 2\rra_ap1\html2pdf\vendor\autoload.php');

use Spipu\Html2Pdf\Html2Pdf;

// Create "Hello World" HTML content
$htmlContent = file_get_contents('contoh.html');
// Specify the file name
$fileName = 'hello_world.pdf';

// Specify the PDF file path
$pdfFilePath = __DIR__ . DIRECTORY_SEPARATOR . $fileName;

// Create an instance of Html2Pdf
$html2pdf = new Html2Pdf();

// Write HTML content to PDF
$html2pdf->writeHTML($htmlContent);

// Output the PDF to a file
$html2pdf->output($pdfFilePath, 'F');

// Set headers to force download
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$fileName");
header("Content-Type: application/pdf");
header("Content-Transfer-Encoding: binary");

// Read the PDF file and send it to output
readfile($pdfFilePath);

// Delete the PDF file after download
unlink($pdfFilePath);

exit();
?>
