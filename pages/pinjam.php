<div id="label-page"><h3>Tampil Data Peminjaman</h3></div>
<div id="content">
	
	<p id="tombol-tambah-container"><a href="index.php?p=pinjam-input" class="tombol">Tambah Peminjaman</a>
	<a target="_blank" href="pages/pinjam-cetak.php"><img src="images/print.png" height="50px" height="50px"></a>
	<a target="_blank" href="pages/ekspor/pinjam-ekspor-pdf.php"><img src="images/pdf.jpg" height="50px" height="50px"></a>
	<a target="_blank" href="pages/ekspor/pinjam-ekspor-excel.php"><img src="images/excel.jpg" height="50px" height="50px"></a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Peminjaman</th>
			<th>Nama Anggota</th>
			<th>Nama Buku</th>
			<th>Tanggal Peminjaman</th>
			<th id="label-opsi">Opsi</th>
		</tr>
		<?php
		$batas = 10;
		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$nomor = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
			$nomor = $posisi+1;
		}	
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			if($pencarian != ""){
				$sql = "SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota WHERE idpinjam LIKE '%$pencarian%'
						OR nama LIKE '%$pencarian%'
						OR judul LIKE '%$pencarian%'
						OR tanggalpinjam LIKE '%$pencarian%'";
				
				$query = $sql;
				$queryJml = $sql;	
						
			}
			else {
				$query = "SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbpinjam LEFT JOIN tbbuku on tbbuku.idbuku = tbpinjam.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbpinjam.idanggota";
			$no = $posisi * 1;
		}
		
		//$sql="SELECT * FROM tbbuku ORDER BY idbuku DESC";
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
			<td>
				<div class="tombol-opsi-container"><a target="_blank" href="pages/pinjam-cetak-kartu.php?id=<?php echo $r_tampil_pinjam['idpinjam'];?>" class="tombol">Cetak Kartu</a></div>
				<div class="tombol-opsi-container"><a href="proses/pinjam-hapus.php?id=<?php echo $r_tampil_pinjam['idpinjam']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a></div>
			</td>			
		</tr>		
		<?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
	<?php
	if(isset($_POST['pencarian'])){
	if($_POST['pencarian']!=''){
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
	}
	else{ ?>
		<div style="float: left;">		
		<?php
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Jumlah Data : <b>$jml</b>";
		?>			
		</div>		
		<div class="pagination">		
				<?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=pinjam&hal=$i\">$i</a>";
					}
					else {
						echo "<a class=\"active\">$i</a>";
					}
				}
				?>
		</div>
	<?php
	}
	?>
</div>