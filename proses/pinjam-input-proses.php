<?php
include'../koneksi.php';
$id_pinjam=$_POST['id_pinjam'];
$idanggota=$_POST['idanggota'];
$idbuku=$_POST['idbuku'];
$tanggalpinjam=$_POST['tanggalpinjam'];

	
if(isset($_POST['simpan'])){
	$sql = 
	"INSERT INTO tbpinjam
		VALUES('$id_pinjam','$idbuku','$tanggalpinjam','$idanggota')";
	$query = mysqli_query($db, $sql);
	header("location:../index.php?p=pinjam");
}
?>