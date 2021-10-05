<?php
include'../koneksi.php';

$id_buku=$_POST['id_buku'];
$judul=$_POST['judul'];
$penulis=$_POST['penulis'];
$penerbit=$_POST['penerbit'];
$tahun=$_POST['tahun'];

If(isset($_POST['simpan'])){
	mysqli_query($db,
		"UPDATE tbbuku
		SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun='$tahun'
		WHERE idbuku='$id_buku'"
	);
	header("location:../index.php?p=buku");
}
?>
