<?php 

include('../../koneksi.php');

// menghubungkan dengan library excel reader
include ('../../assets/library/excel_reader2.php');
?>

<?php

// $ambil_data_siswa  = mysqli_query($koneksi, "SELECT * FROM tb_siswa")or die (mysqli_error($koneksi));
// $total_siswa       = mysqli_num_rows($ambil_data_siswa);

// upload file xls
$target = basename($_FILES['data_siswa']['name']) ;
move_uploaded_file($_FILES['data_siswa']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['data_siswa']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['data_siswa']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
	$tambahnya = $i - 1;

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nisn             = $data->val($i, 1);
	$nama             = $data->val($i, 2);
	$jenis_kelamin    = $data->val($i, 3);
	$alamat           = $data->val($i, 4);
	$no_telp          = $data->val($i, 5);
	$nama_ayah        = $data->val($i, 6);
	$nama_ibu         = $data->val($i, 7);
	$id_tahun_ajaran  = $data->val($i, 8);

	if($nisn != "" && $nama != "" && $jenis_kelamin != "" && $alamat != "" && $no_telp != "" && $nama_ayah != "" && $nama_ibu != "" && $id_tahun_ajaran != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into tb_siswa values('','$nisn','$nama','$jenis_kelamin', '$alamat', '$no_telp', '$nama_ayah', '$nama_ibu', '$id_tahun_ajaran')");
		$berhasil++;

	}else{
		echo "<script> document.location.href='../siswa.php?pesan=import_gagal'; </script>";
	}
}

$limit = $jumlah_baris - 1;
$array_id_siswa = [];

//ambil id siswa untuk dimasukkan ke tabel nilai
$ambil_id = mysqli_query($koneksi,"SELECT id FROM tb_siswa ORDER BY id DESC LIMIT $limit");
while($row = mysqli_fetch_array($ambil_id)){ 
	$id_siswa = $row['id'];

	array_push($array_id_siswa, $id_siswa);
}

sort($array_id_siswa);
for ($i=0; $i < $limit; $i++) { 
	
	$id_siswa = $array_id_siswa[$i];
	// masukkan ke tb nilai
	$simpan = mysqli_query($koneksi,"INSERT INTO tb_nilai(id_siswa) values('$id_siswa')");
}


// hapus kembali file .xls yang di upload tadi
unlink($_FILES['data_siswa']['name']);

// alihkan halaman ke index.php
echo "<script> document.location.href='../siswa.php?pesan=import_sukses'; </script>";	
?>