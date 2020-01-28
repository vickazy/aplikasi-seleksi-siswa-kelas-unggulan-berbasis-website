 <?php

 	include('../../koneksi.php');

 	$id      	     = $_POST['id'];
 	$nisn      	     = $_POST['nisn'];
 	$nama       	 = $_POST['nama'];
	$jenis_kelamin 	 = $_POST['jenis_kelamin'];
	$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
	$no_telp 	     = $_POST['no_telp'];
	$nama_ayah 	     = $_POST['nama_ayah'];
	$nama_ibu 	     = $_POST['nama_ibu'];
	$alamat 	     = $_POST['alamat'];

	
	// cek nisn di tb siswa apakah sudah ada atau belum
	$cek_nisn    = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nisn = '$nisn' AND id != $id")or die (mysqli_error($koneksi));
	$jumlah_nisn = mysqli_num_rows($cek_nisn);

	if($jumlah_nisn > 0){
		echo "<script> document.location.href='../edit_siswa.php?pesan=nisn_ada&id=$id'; </script>";
	}else{

		$simpan = mysqli_query($koneksi, "UPDATE tb_siswa SET nisn = '$nisn', nama = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_telp = '$no_telp', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', id_tahun_ajaran = $id_tahun_ajaran WHERE id = $id")or die (mysqli_error($koneksi)); 

		if($simpan){
			echo "<script> document.location.href='../siswa.php?pesan=edit_sukses'; </script>";	
		}else{
			echo "<script> document.location.href='../siswa.php?pesan=edit_gagal'; </script>";	
		}
	}
?>