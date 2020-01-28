 <?php

 	include('../../koneksi.php');

 	$id      	 	 = $_POST['id'];
 	$selisih      	 = $_POST['selisih'];
 	$bobot       	 = $_POST['bobot'];
	$keterangan      = $_POST['keterangan'];

	$simpan = mysqli_query($koneksi, " UPDATE tb_bobot_gap SET selisih = $selisih, bobot = $bobot, keterangan = '$keterangan' WHERE id = $id ")or die (mysqli_error($koneksi)); 

	if($simpan){
		echo "<script> document.location.href='../edit_bobot.php?id=$id&pesan=edit_sukses'; </script>";	
	}else{
		echo "<script> document.location.href='../edit_bobot.php?id=$id&pesan=edit_gagal'; </script>";	
	}
?>