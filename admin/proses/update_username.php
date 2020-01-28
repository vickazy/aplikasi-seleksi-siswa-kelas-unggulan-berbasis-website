 <?php

 	include('../../koneksi.php');

 	$id      	         = $_POST['id'];
 	$username      	     = $_POST['username'];
	$nama_lengkap 	 	 = $_POST['nama_lengkap'];

 	$password       	 = $_POST['password'];

 	//cek password nya sama atau tidak
 	$cek_username = mysqli_query($koneksi, "SELECT password FROM tb_admin WHERE id = $id")or die (mysqli_error($koneksi));
	foreach ($cek_username as $row) {
	
		$passwordnya = $row['password'];
		if($password == $passwordnya){

			//cek dulu ada atau ngganya username yang sama
			$cek_username = mysqli_query($koneksi, "SELECT username FROM tb_admin WHERE username = '$username' AND id != $id")or die (mysqli_error($koneksi));
			$jumlah		  = mysqli_num_rows($cek_username);

			if($jumlah > 0){
				echo "<script> document.location.href='../ubah_username.php?id=$id&pesan=username_ada'; </script>";
			}else{

				$simpan = mysqli_query($koneksi, "UPDATE tb_admin SET username = '$username', nama = '$nama_lengkap' WHERE id = $id")or die (mysqli_error($koneksi));
				echo "<script> document.location.href='../../logout.php'; </script>";
			}

		}else{
			echo "<script> document.location.href='../ubah_username.php?id=$id&pesan=password_beda'; </script>";
		}
	}
?>