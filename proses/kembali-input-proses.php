<?php
include'../koneksi.php';
$id_kembali=$_POST['id_kembali'];
$idanggota=$_POST['idanggota'];
$idbuku=$_POST['idbuku'];
$tanggalkembali=$_POST['tanggalkembali'];

	
if(isset($_POST['simpan'])){
	$sql = 
	"INSERT INTO tbkembali
		VALUES('$id_kembali','$idanggota','$idbuku','$tanggalkembali')";
	$query = mysqli_query($db, $sql);
	header("location:../index.php?p=kembali");
}
?>