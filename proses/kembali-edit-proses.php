<?php
include'../koneksi.php';

$id_kembali=$_POST['id_kembali'];
$namaanggota=$_POST['namaanggota'];
$judulbuku=$_POST['judulbuku'];
$tanggalkembali=$_POST['tanggalkembali'];

If(isset($_POST['simpan'])){
	mysqli_query($db,
		"UPDATE tbkembali
		SET namaanggota = '$namaanggota', judulbuku='$judulbuku', tanggalkembali='$tanggalkembali'
		WHERE idkembali='$id_kembali'"
	);
	header("location:../index.php?p=kembali");
}
?>
