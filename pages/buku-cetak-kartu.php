<?php
	include "../koneksi.php";
	$id_buku=$_GET['id'];
	$q_tampil_buku=mysqli_query($db,"SELECT * FROM tbbuku WHERE idbuku='$id_buku'");
	$r_tampil_buku=mysqli_fetch_array($q_tampil_buku);
?>
<div id="label-page"><h3>Kartu Buku</h3></div>
<div id="content">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Buku</td>
			<td class="isian-formulir"><?php echo $r_tampil_buku['idbuku']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Judul</td>
			<td class="isian-formulir"><?php echo $r_tampil_buku['judul']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Penulis</td>
			<td class="isian-formulir"><?php echo $r_tampil_buku['penulis']; ?></td>
		</tr>
		<tr>
			<td class="label-formulir">Penerbit</td>
			<td class="isian-formulir"><?php echo $r_tampil_buku['penerbit']; ?></td>
		</tr>
        <tr>
			<td class="label-formulir">Tahun Terbit</td>
			<td class="isian-formulir"><?php echo $r_tampil_buku['tahun']; ?></td>
		</tr>
	</table>
</div>
<script>
		window.print();
	</script>