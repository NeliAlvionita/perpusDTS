<?php
include'../koneksi.php';
$id_buku=$_POST['id_buku'];
$judul=$_POST['judul'];
$penulis=$_POST['penulis'];
$penerbit=$_POST['penerbit'];
$tahun=$_POST['tahun'];
	
if(isset($_POST['simpan'])){
	$sql = 
	"INSERT INTO tbbuku
		VALUES('$id_buku','$judul','$penulis','$penerbit','$tahun')";
	$query = mysqli_query($db, $sql);
	header("location:../index.php?p=buku");
}
?>