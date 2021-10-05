<?php
include'../koneksi.php';

$id_pinjam=$_POST['id_pinjam'];
$idanggota=$_POST['idanggota'];
$idbuku=$_POST['judulbuku'];
$tanggalpinjam=$_POST['tanggalpinjam'];

If(isset($_POST['simpan'])){
	mysqli_query($db,
		"UPDATE tbpinjam
		SET idanggota = '$idanggota', idbuku='$idbuku', tanggalpinjam='$tanggalpinjam'
		WHERE idpinjam='$id_pinjam'"
	);
	header("location:../index.php?p=pinjam");
}
?>
