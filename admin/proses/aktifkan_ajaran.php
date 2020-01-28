 <?php

 	include('../../koneksi.php');

 	$id = $_GET['id'];

	$update1 = mysqli_query($koneksi, "UPDATE tb_tahun_ajaran SET status = 0")or die (mysqli_error($koneksi));
	$update2 = mysqli_query($koneksi, "UPDATE tb_tahun_ajaran SET status = 1 WHERE id = $id")or die (mysqli_error($koneksi));
	echo "<script> document.location.href='../beranda.php?pesan=sukses_aktif'; </script>";
?>