<?php
include "../koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Buku</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</th>
			<th>ID Buku</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Tahun Terbit</th>
		</tr>
		
		<?php		
		$nomor=1;
		$query="SELECT * FROM tbbuku ORDER BY idbuku DESC";
		$q_tampil_buku = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_buku)>0)
		{
			while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_buku['idbuku']; ?></td>
			<td><?php echo $r_tampil_buku['judul']; ?></td>
			<td><?php echo $r_tampil_buku['penulis']; ?></td>
			<td><?php echo $r_tampil_buku['penerbit']; ?></td>
            <td><?php echo $r_tampil_buku['tahun']; ?></td>			
		</tr>		
		<?php $nomor++; } 
		}
		?>		
	</table>
	<script>
		window.print();
	</script>
</div>
