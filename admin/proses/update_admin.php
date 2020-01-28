 <?php

 	include('../../koneksi.php');

 	$id      	         = $_POST['id'];
 	$username      	     = $_POST['username'];
 	$password       	 = $_POST['password'];
	$nama_lengkap 	 	 = $_POST['nama_lengkap'];
	$status				 = 2;

	//cek dulu ada atau ngganya username yang sama
	$cek_username = mysqli_query($koneksi, "SELECT username FROM tb_admin WHERE username = '$username' AND id != $id")or die (mysqli_error($koneksi));
	$jumlah		  = mysqli_num_rows($cek_username);

	if($jumlah > 0){
		echo "<script> document.location.href='../edit_admin.php?id=$id&pesan=gagal'; </script>";
	}else{
		$simpan = mysqli_query($koneksi, "UPDATE tb_admin SET username = '$username', password = '$password', nama = '$nama_lengkap' WHERE id = $id")or die (mysqli_error($koneksi));
		echo "<script> document.location.href='../admin.php?pesan=edit_sukses'; </script>";
	} 
?>