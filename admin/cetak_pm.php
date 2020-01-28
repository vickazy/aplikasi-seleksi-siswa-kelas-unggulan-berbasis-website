<?php
include ("../koneksi.php");

//ambil id tahun ajaran aktif
$data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran WHERE status = 1");
while($row = mysqli_fetch_array($data)){
    $id_tahun_ajaran = $row['id'];
    $tahun_ajaran    = $row['tahun_ajaran'];
 }

// memanggil library FPDF
require('../assets/library/fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan

// Logo
$pdf->Image('../assets/img/tut wuri.png',10,8,25);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,5,'SMP NEGERI SUKAWANGI',0,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,5,'TERAKREDITASI A',0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->Cell(190,5,'SK Ijin Operasional : 421/Kep.319-Disdik',0,1,'C');

$pdf->SetFont('Arial','',9);
$pdf->Cell(190,5,'Jl. Raya Sukawangi Rt 10/05, Desa Sukabudi, Kecamatan Sukawangi, Kabupaten Bekasi, 17650',0,1,'C');

$pdf->SetFont('Arial','B',9);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(190,4,'PENGUMUMAN',0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(190,5,'HASIL SELEKSI SISWA KELAS UNGGULAN TAHUN AJARAN '.$tahun_ajaran,0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat

$pdf->Cell(10,4,'',0,1);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(12,6,'NO',1,0);
$pdf->Cell(25,6,'NISN',1,0);
$pdf->Cell(73,6,'NAMA SISWA',1,0);
$pdf->Cell(50,6,'NILAI PROFILE MATCHING',1,0);
$pdf->Cell(30,6,'KETERANGAN',1,1);

$pdf->SetFont('Arial','',10);

$no  = 1;
$sql = $koneksi->query("SELECT tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran AND keterangan_pm = 'Lulus' ORDER BY hasil_profile_matching DESC");
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(12,6,$no++,1,0);
    $pdf->Cell(25,6,$row['nisn'],1,0);
    $pdf->Cell(73,6,$row['nama'],1,0);
    $pdf->Cell(50,6,$row['hasil_profile_matching'],1,0);
    $pdf->Cell(30,6,$row['keterangan_pm'],1,1); 
}

$tanggal_sekarang = date('d-m-Y');
$pdf->SetFont('Arial','',9);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(145);
$pdf->Cell(190,4,'Bekasi, '.$tanggal_sekarang,0,1,'L');
$pdf->Cell(145);
$pdf->Cell(190,4,'Kepala Sekolah',0,1,'L');

$pdf->Cell(10,10,'',0,1);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(145);
$pdf->Cell(190,4,'Suryo Sumaryoko, S.Pd. M.Si',0,1,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(145);
$pdf->Cell(190,4,'NIP: 196905201996012001',0,1,'L');

$pdf->Output('','Laporan Hasil Kelulusan Seleksi Siswa Kelas Unggulan dengan Profile Matching.pdf', false);
?>