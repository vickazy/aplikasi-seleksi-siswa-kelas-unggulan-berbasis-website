 <?php

 	include('../../koneksi.php');

 	$username      	     = $_POST['username'];
 	$password       	 = $_POST['password'];
	$nama_lengkap 	 	 = $_POST['nama_lengkap'];
	$status				 = 2;

	//cek dulu ada atau ngganya username yang sama
	$cek_username = mysqli_query($koneksi, "SELECT username FROM tb_admin WHERE username = '$username'")or die (mysqli_error($koneksi));
	$jumlah		  = mysqli_num_rows($cek_username);

	if($jumlah > 0){
		echo "<script> document.location.href='../tambah_admin.php?pesan=gagal'; </script>";
	}else{
		$simpan = mysqli_query($koneksi, "INSERT INTO tb_admin(username, password, nama, status)  VALUES('$username', '$password', '$nama_lengkap', '$status')")or die (mysqli_error($koneksi));
		echo "<script> document.location.href='../admin.php?pesan=sukses'; </script>";
	} 
?>