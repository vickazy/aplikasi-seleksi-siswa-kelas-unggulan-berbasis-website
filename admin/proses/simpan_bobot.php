 <?php

 	include('../../koneksi.php');

 	$selisih      	 = $_POST['selisih'];
 	$bobot       	 = $_POST['bobot'];
	$keterangan      = $_POST['keterangan'];

	$simpan = mysqli_query($koneksi, "INSERT INTO tb_bobot_gap(selisih, bobot, keterangan)  VALUES('$selisih', '$bobot', '$keterangan')")or die (mysqli_error($koneksi)); 

	if($simpan){
		echo "<script> document.location.href='../tambah_bobot.php?pesan=sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../tambah_bobot.php?pesan=gagal'; </script>";	
	}
?>