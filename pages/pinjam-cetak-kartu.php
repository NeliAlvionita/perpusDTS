<?php
	include "../koneksi.php";
	$id_pinjam=$_GET['id'];
	$q_tampil_pinjam=mysqli_query($db,"SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota WHERE idpinjam = '$id_pinjam'");
	$r_tampil_pinjam=mysqli_fetch_array($q_tampil_pinjam);
?>
<div id="label-page"><h3>Kartu Peminjaman</h3></div>
<div id="content">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Peminjaman</td>
			<td class="isian-formulir"><?php echo $r_tampil_pinjam['idpinjam']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama Anggota</td>
			<td class="isian-formulir"><?php echo $r_tampil_pinjam['nama']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><?php echo $r_tampil_pinjam['judul']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Peminjaman</td>
			<td class="isian-formulir"><?php echo $r_tampil_pinjam['tanggalpinjam']; ?></td>
		</tr>
	</table>
</div>
<script>
		window.print();
	</script>