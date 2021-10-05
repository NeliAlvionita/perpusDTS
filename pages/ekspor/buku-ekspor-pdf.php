<?php
require("vendor/autoload.php");
require("koneksi.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from tbbuku");
$html = '<center><h3>DAFTAR BUKU PERPUSTAKAN NELI ALVIONITA | WEB C</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID</th>
 <th>JUDUL</th>
 <th>PENULIS</th>
 <th>PENERBIT</th>
 <th>TAHUN TERBIT</th>
 </tr>';
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$row['idbuku']."</td>
 <td>".$row['judul']."</td>
 <td>".$row['penulis']."</td>
 <td>".$row['penerbit']."</td>
 <td>".$row['tahun']."</td>
 </tr>";
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('tabel_buku.pdf');
?>