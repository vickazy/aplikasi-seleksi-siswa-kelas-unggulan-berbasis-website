 <?php

 	include('../../koneksi.php');

 	$id      	     = $_POST['id'];
	$n_tugas 	 	 = $_POST['n_tugas'];
	$n_uas 	 		 = $_POST['n_uas'];
	$n_uts 	 		 = $_POST['n_uts'];
	$n_btq 	 		 = $_POST['n_btq'];
	$n_bilingual 	 = $_POST['n_bilingual'];
	$n_kepribadian 	 = $_POST['n_kepribadian'];
	$n_ahlaq 	 	 = $_POST['n_ahlaq'];

	$simpan = mysqli_query($koneksi, "UPDATE tb_nilai SET tugas = $n_tugas, uts = $n_uts, uas = $n_uas, btq = $n_btq, bilingual = $n_bilingual, kepribadian = '$n_kepribadian', ahlaq = '$n_ahlaq', status = 1 WHERE id_siswa = $id")or die (mysqli_error($koneksi)); 

	if($simpan){
		echo "<script> document.location.href='../nilai.php?pesan=sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../nilai.php?pesan=gagal'; </script>";	
	}
?>