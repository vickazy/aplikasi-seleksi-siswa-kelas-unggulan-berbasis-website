<?php 

include('../../koneksi.php');

// menghubungkan dengan library excel reader
include ('../../assets/library/excel_reader2.php');
?>

<?php

// $ambil_data_nilai  = mysqli_query($koneksi, "SELECT * FROM tb_nilai")or die (mysqli_error($koneksi));
// $total_nilai       = mysqli_num_rows($ambil_data_nilai);

// upload file xls
$target = basename($_FILES['data_nilai']['name']) ;
move_uploaded_file($_FILES['data_nilai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['data_nilai']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['data_nilai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
	$tambahnya = $i - 1;

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$id_siswa      = $data->val($i, 1);
	$tugas         = $data->val($i, 2);
	$uts    	   = $data->val($i, 3);
	$uas           = $data->val($i, 4);
	$btq           = $data->val($i, 5);
	$bilingual     = $data->val($i, 6);
	$kepribadian   = $data->val($i, 7);
	$ahlaq         = $data->val($i, 8);

	if($id_siswa != "" && $tugas != "" && $uts != "" && $uas != "" && $btq != "" && $bilingual != "" && $kepribadian != "" && $ahlaq != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"UPDATE tb_nilai SET tugas = $tugas, uts = $uts, uas = $uas, btq = $btq, bilingual = $bilingual, kepribadian = '$kepribadian', ahlaq = '$ahlaq', status = 1 WHERE id_siswa = $id_siswa");
		$berhasil++;

	}else{
		echo "<script> document.location.href='../nilai.php?pesan=import_gagal'; </script>";
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['data_nilai']['name']);

// alihkan halaman ke index.php
echo "<script> document.location.href='../nilai.php?pesan=import_sukses'; </script>";	
?>