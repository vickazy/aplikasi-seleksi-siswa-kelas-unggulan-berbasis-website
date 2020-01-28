 <?php

 	include('../../koneksi.php');

 	$nisn      	     = $_POST['nisn'];
 	$nama       	 = $_POST['nama'];
	$jenis_kelamin 	 = $_POST['jenis_kelamin'];
	$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
	$no_telp 	     = $_POST['no_telp'];
	$nama_ayah 	     = $_POST['nama_ayah'];
	$nama_ibu 	     = $_POST['nama_ibu'];
	$alamat 	     = $_POST['alamat'];

	// cek nisn di tb siswa apakah sudah ada atau belum
	$cek_nisn    = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nisn = '$nisn'")or die (mysqli_error($koneksi));
	$jumlah_nisn = mysqli_num_rows($cek_nisn);

	if($jumlah_nisn > 0){
		echo "<script> document.location.href='../tambah_siswa.php?pesan=nisn_ada'; </script>";
	}else{

		$simpan = mysqli_query($koneksi, "INSERT INTO tb_siswa(nisn, nama, jenis_kelamin, alamat, no_telp, nama_ayah, nama_ibu, id_tahun_ajaran)  VALUES('$nisn', '$nama', '$jenis_kelamin', '$alamat', '$no_telp', '$nama_ayah', '$nama_ibu', '$id_tahun_ajaran')")or die (mysqli_error($koneksi)); 


		// ambil id siswa terakhir yang ditambahkan
		$ambil_id_siswa = mysqli_query($koneksi, "SELECT id FROM tb_siswa ORDER BY id DESC LIMIT 1")or die (mysqli_error($koneksi));
		while($row = mysqli_fetch_array($ambil_id_siswa)){
			$id_siswa = $row['id'];

			//simpan id siswa ke tb nilai
			$simpan2 = mysqli_query($koneksi, "INSERT INTO tb_nilai(id_siswa)  VALUES('$id_siswa')")or die (mysqli_error($koneksi));

			if($simpan2){
				echo "<script> document.location.href='../siswa.php?pesan=sukses'; </script>";	
			}else{
				echo "<script> document.location.href='../siswa.php?pesan=gagal'; </script>";	
			}
		}
	}
?>