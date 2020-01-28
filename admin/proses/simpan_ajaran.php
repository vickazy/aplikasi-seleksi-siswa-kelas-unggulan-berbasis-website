 <?php

 	include('../../koneksi.php');

 	$ajaran      	     = $_POST['ajaran'];
	$status				 = 0;

	//cek dulu ada atau ngganya username yang sama
	$cek_username = mysqli_query($koneksi, "SELECT tahun_ajaran FROM tb_tahun_ajaran WHERE tahun_ajaran = '$ajaran'")or die (mysqli_error($koneksi));
	$jumlah		  = mysqli_num_rows($cek_username);

	if($jumlah > 0){
		echo "<script> document.location.href='../tambah_ajaran.php?pesan=gagal'; </script>";
	}else{

		$simpan = mysqli_query($koneksi, "INSERT INTO tb_tahun_ajaran(tahun_ajaran, status)  VALUES('$ajaran', '$status')")or die (mysqli_error($koneksi));
		echo "<script> document.location.href='../beranda.php?pesan=sukses_tambah'; </script>";
	}
?>