<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Pengembalian</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</th>
			<th>ID Pengembalian</th>
			<th>Nama Anggota</th>
			<th>Judul Buku</th>
			<th>Tanggal Pengembalian</th>
		</tr>
		
		<?php		
		$nomor=1;
		$query="SELECT * FROM tbkembali LEFT JOIN tbbuku on tbbuku.idbuku = tbkembali.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbkembali.idanggota";
		$q_tampil_kembali = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_kembali)>0)
		{
			while($r_tampil_kembali=mysqli_fetch_array($q_tampil_kembali)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_kembali['idkembali']; ?></td>
			<td><?php echo $r_tampil_kembali['nama']; ?></td>
			<td><?php echo $r_tampil_kembali['judul']; ?></td>
			<td><?php echo $r_tampil_kembali['tanggalkembali']; ?></td>			
		</tr>		
		<?php $nomor++; } 
		}
		?>		
	</table>
	<script>
		window.print();
	</script>
</div>
