<div id="label-page"><h3>Tampil Data Pengembalian</h3></div>
<div id="content">
	
	<p id="tombol-tambah-container"><a href="index.php?p=kembali-input" class="tombol">Tambah Pengembalian</a>
	<a target="_blank" href="pages/kembali-cetak.php"><img src="images/print.png" height="50px" height="50px"></a>
	<a target="_blank" href="pages/ekspor/kembali-ekspor-pdf.php"><img src="images/pdf.jpg" height="50px" height="50px"></a>
	<a target="_blank" href="pages/ekspor/kembali-ekspor-excel.php"><img src="images/excel.jpg" height="50px" height="50px"></a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
	<table id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</td>
			<th>ID Pengembalian</th>
			<th>Nama Anggota</th>
			<th>Nama Buku</th>
			<th>Tanggal Pengembalian</th>
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
				$sql = "SELECT * FROM tbkembali LEFT JOIN tbbuku on tbbuku.idbuku = tbkembali.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbkembali.idanggota WHERE idkembali LIKE '%$pencarian%'
						OR nama LIKE '%$pencarian%'
						OR judul LIKE '%$pencarian%'
						OR tanggalkembali LIKE '%$pencarian%'";
				
				$query = $sql;
				$queryJml = $sql;	
						
			}
			else {
				$query = "SELECT * FROM tbkembali LEFT JOIN tbbuku on tbbuku.idbuku = tbkembali.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbkembali.idanggota LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbkembali LEFT JOIN tbbuku on tbbuku.idbuku = tbkembali.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbkembali.idanggota";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT * FROM tbkembali LEFT JOIN tbbuku on tbbuku.idbuku = tbkembali.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbkembali.idanggota LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbkembali LEFT JOIN tbbuku on tbbuku.idbuku = tbkembali.idbuku LEFT JOIN tbanggota on tbanggota.idanggota = tbkembali.idanggota";
			$no = $posisi * 1;
		}
		
		//$sql="SELECT * FROM tbbuku ORDER BY idbuku DESC";
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
			<td>
				<div class="tombol-opsi-container"><a target="_blank" href="pages/kembali-cetak-kartu.php?id=<?php echo $r_tampil_kembali['idkembali'];?>" class="tombol">Cetak Kartu</a></div>
				<div class="tombol-opsi-container"><a href="proses/kembali-hapus.php?id=<?php echo $r_tampil_kembali['idkembali']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a></div>
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
						echo "<a href=\"?p=kembali&hal=$i\">$i</a>";
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