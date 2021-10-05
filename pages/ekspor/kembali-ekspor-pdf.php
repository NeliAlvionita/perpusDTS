<?php
require("vendor/autoload.php");
require("koneksi.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT * FROM tbkembali LEFT JOIN tbbuku on tbbuku.idbuku = tbkembali.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbkembali.idanggota");
$html = '<center><h3>DAFTAR PENGEMBALIAN BUKU PERPUSTAKAN NELI ALVIONITA | WEB C</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID</th>
 <th>NAMA ANGGOTA</th>
 <th>JUDUL BUKU</th>
 <th>TANGGAL PENGEMBALIAN</th>
 </tr>';
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$row['idkembali']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['judul']."</td>
 <td>".$row['tanggalkembali']."</td>
 </tr>";
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('tabel_pengembalian.pdf');
?>