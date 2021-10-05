<?php
	include "../koneksi.php";
	$id_kembali=$_GET['id'];
	$q_tampil_kembali=mysqli_query($db,"SELECT * FROM tbkembali LEFT JOIN tbbuku on tbbuku.idbuku = tbkembali.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbkembali.idanggota WHERE idkembali = '$id_kembali'");
	$r_tampil_kembali=mysqli_fetch_array($q_tampil_kembali);
?>
<div id="label-page"><h3>Kartu Pengembalian</h3></div>
<div id="content">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Pengembalian</td>
			<td class="isian-formulir"><?php echo $r_tampil_kembali['idkembali']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama Anggota</td>
			<td class="isian-formulir"><?php echo $r_tampil_kembali['nama']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir"><?php echo $r_tampil_kembali['judul']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal Pengembalian</td>
			<td class="isian-formulir"><?php echo $r_tampil_kembali['tanggalkembali']; ?></td>
		</tr>
	</table>
</div>
<script>
		window.print();
	</script>