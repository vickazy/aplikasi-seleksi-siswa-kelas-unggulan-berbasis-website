 <?php

 	include('../../koneksi.php');

 	$id      	         = $_POST['id'];
 	$password_baru       = $_POST['password_baru'];
	$password_lama 	 	 = $_POST['password_lama'];

 	//cek password nya sama atau tidak
 	$cek_username = mysqli_query($koneksi, "SELECT password FROM tb_admin WHERE id = $id")or die (mysqli_error($koneksi));
	foreach ($cek_username as $row) {
	
		$passwordnya = $row['password'];
		if($password_lama == $passwordnya){

			$simpan = mysqli_query($koneksi, "UPDATE tb_admin SET password = '$password_baru' WHERE id = $id")or die (mysqli_error($koneksi));
			echo "<script> document.location.href='../../logout.php'; </script>";

		}else{
			echo "<script> document.location.href='../ubah_password.php?id=$id&pesan=password_beda'; </script>";
		}
	}
?>