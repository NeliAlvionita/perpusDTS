<?php
require("vendor/autoload.php");
require("koneksi.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from tbanggota");
$html = '<center><h3>DAFTAR ANGGOTA PERPUSTAKAN NELI ALVIONITA | WEB C</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID</th>
 <th>NAMA</th>
 <th>JENIS KELAMIN</th>
 <th>ALAMAT</th>
 <th>STATUS</th>
 <th>FOTO</th>
 </tr>';
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$row['idanggota']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['jeniskelamin']."</td>
 <td>".$row['alamat']."</td>
 <td>".$row['status']."</td>
 <td>".$row['foto']."</td>
 </tr>";
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('tabel_anggota.pdf');
?>