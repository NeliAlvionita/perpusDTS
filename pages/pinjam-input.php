<div id="label-page"><h3>Input Data Peminjaman</h3></div>
<div id="content">
	<form action="proses/pinjam-input-proses.php" method="post" >
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Peminjaman</td>
			<td class="isian-formulir"><input type="text" name="id_pinjam" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir">Nama Anggota</td>
			<td class="isian-formulir">
			<select name="idanggota" class="isian-formulir isian-formulir-border">
				<?php
				include'../koneksi.php';
				$sql_anggota = mysqli_query($db, "SELECT * FROM tbanggota");
				while($data_anggota = mysqli_fetch_array($sql_anggota)){
				?>
				<option value="<?=$data_anggota['idanggota'];?>">
				<?php echo $data_anggota['nama'];?></option>
				<?php
				}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td class="label-formulir">Judul Buku</td>
			<td class="isian-formulir">
			<select name="idbuku" class="isian-formulir isian-formulir-border">
				<?php
				include'../koneksi.php';
				$sql_buku = mysqli_query($db, "SELECT * FROM tbbuku");
				while($data_buku = mysqli_fetch_array($sql_buku)){
				?>
				<option value="<?=$data_buku['idbuku'];?>"><?php echo $data_buku['judul'];?></option>
				<?php
				}
				?>
			</select>
			</td>
		</tr>
        <tr>
			<td class="label-formulir">Tanggal Peminjaman</td>
			<td class="isian-formulir"><input type="date" name="tanggalpinjam" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>