<?php

	include('koneksi.php');

    //ambil id tahun ajaran aktif
    $ambil_atribut 	= mysqli_query($koneksi,"SHOW COLUMNS IN tb_ipm");
    $jumlah_atribut = mysqli_num_rows($ambil_atribut);
    echo "$jumlah";		
?>