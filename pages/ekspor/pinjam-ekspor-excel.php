<?php
include 'koneksi.php';
 
require('vendor/autoload.php');
 
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
$spreadsheet = new Spreadsheet();
 
$spreadsheet->getActiveSheet()->mergeCells('A2:G2');
$spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'DAFTAR PEMINJAMAN PERPUSTAKAAN NELI | WEB C');
 
 
//Font Color
$spreadsheet->getActiveSheet()->getStyle('A3:G3')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKBLUE);
 
 
// Header Tabel
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A3', 'NO')
->setCellValue('B3', 'ID')
->setCellValue('C3', 'NAMA ANGGOTA')
->setCellValue('D3', 'JUDUL BUKU')
->setCellValue('E3', 'TANGGAL PEMINJAMAN')
;
 
$i=4; 
$no=1; 
$query = mysqli_query($koneksi,"SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota order by idpinjam ASC");
while ($row = mysqli_fetch_array($query)) {
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $no)
    ->setCellValue('B'.$i, $row['idpinjam'])
	->setCellValue('C'.$i, $row['nama'])
	->setCellValue('D'.$i, $row['judul'])
	->setCellValue('E'.$i, $row['tanggalpinjam']);
	$i++; $no++;
}
 
 
// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Report Excel '.date('d-m-Y H'));
 
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);
ob_end_clean();
// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="tabel_peminjaman.xlsx"');
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