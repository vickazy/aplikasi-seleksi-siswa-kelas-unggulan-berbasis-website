 <?php

 	include('koneksi.php');

 	$nama      	= $_POST['nama'];
 	$email      = $_POST['email'];
	$judul      = $_POST['judul'];
	$pesan      = $_POST['pesan'];

	$simpan = mysqli_query($koneksi, "INSERT INTO tb_kontak(nama, email, judul, pesan)  VALUES('$nama', '$email', '$judul', '$pesan')")or die (mysqli_error($koneksi)); 

	if($simpan){
		echo "<script> document.location.href='hubungi_kami.php?pesan=sukses'; </script>";	
	}else{
		echo "<script> document.location.href='hubungi_kami.php?pesan=gagal'; </script>";	
	}
?>