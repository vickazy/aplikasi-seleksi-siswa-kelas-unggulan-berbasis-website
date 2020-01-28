 <?php

 	include('../../koneksi.php');

 	$id      	 = $_POST['id'];
 	$judul       = $_POST['judul'];
 	$isi       	 = $_POST['isi'];

 	date_default_timezone_set('Asia/Jakarta');
 	$tanggal     = date('Y-m-d H:i:s');

	$simpan = mysqli_query($koneksi, " UPDATE tb_artikel SET judul = '$judul', isi = '$isi', tanggal = '$tanggal' WHERE id = $id ")or die (mysqli_error($koneksi)); 

	if($simpan){
		echo "<script> document.location.href='../artikel.php?pesan=edit_sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../artikel.php?pesan=edit_gagal'; </script>";	
	}
?>