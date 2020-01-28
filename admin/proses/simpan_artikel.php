 <?php

 	include('../../koneksi.php');

 	$judul       = $_POST['judul'];
 	$isi       	 = $_POST['isi'];

 	date_default_timezone_set('Asia/Jakarta');
 	$tanggal     = date('Y-m-d H:i:s');

	$simpan = mysqli_query($koneksi, "INSERT INTO tb_artikel(judul, isi, tanggal)  VALUES('$judul', '$isi', '$tanggal')")or die (mysqli_error($koneksi)); 

	if($simpan){
		echo "<script> document.location.href='../artikel.php?pesan=sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../artikel.php?pesan=gagal'; </script>";	
	}
?>