<?php
include 'koneksi.php';
 
require('vendor/autoload.php');
 
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
$spreadsheet = new Spreadsheet();
 
$spreadsheet->getActiveSheet()->mergeCells('A2:G2');
$spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'DAFTAR ANGGOTA PERPUSTAKAAN NELI | WEB C');
 
 
//Font Color
$spreadsheet->getActiveSheet()->getStyle('A3:G3')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
 
 
// Header Tabel
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A3', 'NO')
->setCellValue('B3', 'ID ANGGOTA')
->setCellValue('C3', 'NAMA')
->setCellValue('D3', 'JENIS KELAMIN')
->setCellValue('E3', 'ALAMAT')
->setCellValue('F3', 'STATUS')
->setCellValue('G3', 'FOTO')
;
 
$i=4; 
$no=1; 
$query = mysqli_query($koneksi,"select * from tbanggota");
while ($row = mysqli_fetch_array($query)) {
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $no)
    ->setCellValue('B'.$i, $row['idanggota'])
	->setCellValue('C'.$i, $row['nama'])
	->setCellValue('D'.$i, $row['jeniskelamin'])
	->setCellValue('E'.$i, $row['alamat'])
	->setCellValue('F'.$i, $row['status'])
    ->setCellValue('G'.$i, $row['foto']);
	$i++; $no++;
}
 
 
// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);
ob_end_clean();
// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="tabel_anggota.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
 
// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0
 
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
 
?>