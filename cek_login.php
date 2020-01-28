<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username  = $_POST['username'];
$password  = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	while($row = mysqli_fetch_array($data)){
    	$id    		  = $row['id'];
    	$status    	  = $row['status'];
    	$username     = $row['username'];
    	$nama         = $row['nama'];

		$_SESSION['id']     	  = $id;
		$_SESSION['username']     = $username;
		$_SESSION['nama']         = $nama;
		$_SESSION['level']        = $status;
		$_SESSION['status']       = "login";
		header("location:admin/beranda.php");
	}
}else{
	header("location:login.php?pesan=gagal");
}
?>