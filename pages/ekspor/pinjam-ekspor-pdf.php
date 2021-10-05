<?php
require("vendor/autoload.php");
require("koneksi.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota order by idpinjam ASC");
$html = '<center><h3>DAFTAR PEMINJAMAN PERPUSTAKAN NELI ALVIONITA | WEB C</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID</th>
 <th>NAMA ANGGOTA</th>
 <th>JUDUL BUKU</th>
 <th>TANGGAL PEMINJAMAN</th>
 </tr>';
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$row['idpinjam']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['judul']."</td>
 <td>".$row['tanggalpinjam']."</td>
 </tr>";
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('tabel_peminjaman.pdf');
?>