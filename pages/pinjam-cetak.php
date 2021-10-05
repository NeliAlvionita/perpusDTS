<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Buku</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</th>
			<th>ID Peminjaman</th>
			<th>Nama Anggota</th>
			<th>Judul Buku</th>
			<th>Tanggal Peminjaman</th>
		</tr>
		
		<?php		
		$nomor=1;
		$query="SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota order by idpinjam DESC";
		$q_tampil_pinjam = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_pinjam)>0)
		{
			while($r_tampil_pinjam=mysqli_fetch_array($q_tampil_pinjam)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_pinjam['idpinjam']; ?></td>
			<td><?php echo $r_tampil_pinjam['nama']; ?></td>
			<td><?php echo $r_tampil_pinjam['judul']; ?></td>
			<td><?php echo $r_tampil_pinjam['tanggalpinjam']; ?></td>			
		</tr>		
		<?php $nomor++; } 
		}
		?>		
	</table>
	<script>
		window.print();
	</script>
</div>
