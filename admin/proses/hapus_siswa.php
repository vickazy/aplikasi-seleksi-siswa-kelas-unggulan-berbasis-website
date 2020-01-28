 <?php

 	include('../../koneksi.php');

 	$id     = $_GET['id'];

	$hapus = mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE id = $id")or die (mysqli_error($koneksi)); 
	$hapus = mysqli_query($koneksi, "DELETE FROM tb_nilai WHERE id_siswa = $id")or die (mysqli_error($koneksi)); 

	if($hapus){
		echo "<script> document.location.href='../siswa.php?pesan=hapus_sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../siswa.php?pesan=hapus_gagal'; </script>";	
	}
?>