 <?php

 	include('../../koneksi.php');

 	$id     = $_GET['id'];

	$simpan = mysqli_query($koneksi, "DELETE FROM tb_bobot_gap WHERE id = $id")or die (mysqli_error($koneksi)); 

	if($simpan){
		echo "<script> document.location.href='../profile_matching.php?pesan=hapus_sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../profile_matching.php?pesan=hapus_gagal'; </script>";	
	}
?>