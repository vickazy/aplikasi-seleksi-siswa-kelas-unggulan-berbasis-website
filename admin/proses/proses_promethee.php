 <?php

 	include('../../koneksi.php');
    $kuota = $_POST['kuota'];

    //ambil id tahun ajaran aktif
    $data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran WHERE status = 1");
    while($row = mysqli_fetch_array($data)){
        $id_tahun_ajaran = $row['id'];
    }


 	// ambil data siswa dan nilai siswa
	$ambil_data_siswa = mysqli_query($koneksi, "SELECT tb_siswa.`id` as id_siswa, tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran")or die (mysqli_error($koneksi));
	$total_siswa      = mysqli_num_rows($ambil_data_siswa);

    if($kuota > $total_siswa){

        echo "<script> document.location.href='../promethee.php?pesan=kuota_besar'; </script>";

    }else{

        mysqli_query($koneksi, "TRUNCATE tb_konversi_1")or die (mysqli_error($koneksi));
        mysqli_query($koneksi, "TRUNCATE tb_ipm")or die (mysqli_error($koneksi));

        //hapus dulu kolom di tb_ipm
        $ambil_atribut  = mysqli_query($koneksi,"SHOW COLUMNS IN tb_ipm");
        $jumlah_atribut = mysqli_num_rows($ambil_atribut);
        $jumlah_n       = $jumlah_atribut - 2;

        for ($a=1; $a <= $jumlah_n; $a++) { 
            $hapus_kolom      = mysqli_query($koneksi, "ALTER TABLE tb_ipm Drop n$a")or die (mysqli_error($koneksi));
        }

        //tambah lagi kolom di tb_ipm
        for ($b=1; $b <= $total_siswa; $b++) { 
            $hapus_kolom      = mysqli_query($koneksi, "ALTER TABLE tb_ipm ADD n$b double")or die (mysqli_error($koneksi));
        }


    	while($row = mysqli_fetch_array($ambil_data_siswa)){
            $id           = $row['id_siswa'];
            $nisn         = $row['nisn'];
            $nama         = $row['nama'];
            $tugas        = $row['tugas'];
            $uts          = $row['uts'];
            $uas          = $row['uas'];
            $btq          = $row['btq'];
            $bilingual    = $row['bilingual'];
            $kepribadian  = $row['kepribadian'];
            $ahlaq        = $row['ahlaq'];

            //Update Siswa 
            $update_siswa = mysqli_query($koneksi, "UPDATE tb_nilai SET keterangan_pr = 'Tidak Lulus' WHERE id_siswa = $id")or die (mysqli_error($koneksi));

            //simpan dulu id_siswanya
    	    $simpan_id_siswanya = mysqli_query($koneksi, "INSERT INTO tb_ipm(id_siswa) VALUES('$id')")or die (mysqli_error($koneksi));

            //simpan dulu id siswanya ke tabel konversi 1
            $simpan_id_siswa = mysqli_query($koneksi, "INSERT INTO tb_konversi_1(id, id_siswa) VALUES('', '$id')")or die (mysqli_error($koneksi));

            // mulai konversi nilai siswa / menentukan nilai bobot alternatif setiap siswa
            // bobot tugas
            if($tugas >= 80 && $tugas <=100){
            	$bobot_tugas = 5;

    	    }else if($tugas >= 70 && $tugas <=79){
    	        $bobot_tugas = 4;
    	        
    	    }else if ($tugas >= 60 && $tugas <= 69) {
    	        $bobot_tugas = 3;
    	        
    	    }else if ($tugas >= 50 && $tugas <= 59) {
    	        $bobot_tugas = 2;
    	        
    	    }else{
    	        $bobot_tugas = 1;
    	    
    	    }

    	    // bobot uts
            if($uts >= 80 && $uts <=100){
            	$bobot_uts = 5;
            
            }else if($uts >= 70 && $uts <=79){
                $bobot_uts = 4;
                
            }else if ($uts >= 60 && $uts <= 69) {
                $bobot_uts = 3;
                
            }else if ($uts >= 50 && $uts <= 59) {
                $bobot_uts = 2;
                
            }else{
                $bobot_uts = 1;
            
            }

            // bobot uas
            if($uas >= 80 && $uas <=100){
            	$bobot_uas = 5;
            
            }else if($uas >= 70 && $uas <=79){
                $bobot_uas = 4;
                
            }else if ($uas >= 60 && $uas <= 69) {
                $bobot_uas = 3;
                
            }else if ($uas >= 50 && $uas <= 59) {
                $bobot_uas = 2;
                
            }else{
                $bobot_uas = 1;
            
            }

            // bobot btq
            if($btq >= 80 && $btq <=100){
            	$bobot_btq = 5;
            
            }else if($btq >= 70 && $btq <=79){
                $bobot_btq = 4;
                
            }else if ($btq >= 60 && $btq <= 69) {
                $bobot_btq = 3;
                
            }else if ($btq >= 50 && $btq <= 59) {
                $bobot_btq = 2;
                
            }else{
                $bobot_btq = 1;
            
            }

            // bobot bilingual
            if($bilingual >= 80 && $bilingual <=100){
            	$bobot_bilingual = 5;
            
            }else if($bilingual >= 70 && $bilingual <=79){
                $bobot_bilingual = 4;
                
            }else if ($bilingual >= 60 && $bilingual <= 69) {
                $bobot_bilingual = 3;
                
            }else if ($bilingual >= 50 && $bilingual <= 59) {
                $bobot_bilingual = 2;
                
            }else{
                $bobot_bilingual = 1;
            
            }

            // bobot kepribadian
            if($kepribadian == 'Sangat Baik'){
            	$bobot_kepribadian = 5;
            
            }else if($kepribadian == 'Baik'){
                $bobot_kepribadian = 4;
                
            }else if ($kepribadian == 'Cukup Baik') {
                $bobot_kepribadian = 3;
                
            }else if ($kepribadian == 'Kurang Baik') {
                $bobot_kepribadian = 2;
                
            }else{
                $bobot_kepribadian = 1;
            
            }

            // bobot ahlaq
            if($ahlaq == 'Sangat Baik'){
                $bobot_ahlaq = 5;
            
            }else if($ahlaq == 'Baik'){
                $bobot_ahlaq = 4;
                
            }else if ($ahlaq == 'Cukup Baik') {
                $bobot_ahlaq = 3;
                
            }else if ($ahlaq == 'Kurang Baik') {
                $bobot_ahlaq = 2;
                
            }else{
                $bobot_ahlaq = 1;
            
            }

            // jumlahkan setiap bobot
            $jumlah_bobot = $bobot_tugas + $bobot_uts + $bobot_uas + $bobot_btq + $bobot_bilingual + $bobot_kepribadian + $bobot_ahlaq;

            // update bobot setiap siswa
            $update_bobot = mysqli_query($koneksi, "UPDATE tb_konversi_1 SET bobot_tugas = $bobot_tugas, bobot_uts = $bobot_uts, bobot_uas = $bobot_uas, bobot_btq = $bobot_btq, bobot_bilingual = $bobot_bilingual, bobot_kepribadian = $bobot_kepribadian, bobot_ahlaq = $bobot_ahlaq, jumlah = $jumlah_bobot WHERE id_siswa = $id")or die (mysqli_error($koneksi));
        }

        // ambil data bobot setiap siswa untuk dihitung nilai preferensi

    	$array_ipm    = [];

        for($a = 1; $a <= $total_siswa; $a++){

       	 	$set = mysqli_query($koneksi, "UPDATE tb_konversi_1 SET keterangan = 1 WHERE id = $a")or die (mysqli_error($koneksi));
    	    $ambil_bobot        = mysqli_query($koneksi, "SELECT * FROM tb_konversi_1 WHERE keterangan = 1 ORDER BY id DESC limit 1")or die (mysqli_error($koneksi));
    		while($row = mysqli_fetch_array($ambil_bobot)){
    	        $id           		= $row['id'];
    	        // $id_siswa     		= $row['id_siswa'];
    	        $bobot_tugas        = $row['bobot_tugas'];
    	        $bobot_uts          = $row['bobot_uts'];
    	        $bobot_uas          = $row['bobot_uas'];
    	        $bobot_btq          = $row['bobot_btq'];
    	        $bobot_bilingual    = $row['bobot_bilingual'];
    	        $bobot_kepribadian  = $row['bobot_kepribadian'];
    	        $bobot_ahlaq        = $row['bobot_ahlaq'];

    	        //ambil bobot dibawahnya
    	        $ambil_bobot_dibawahnya        = mysqli_query($koneksi, "SELECT * FROM tb_konversi_1 WHERE keterangan != 1")or die (mysqli_error($koneksi));
    			while($row = mysqli_fetch_array($ambil_bobot_dibawahnya)){

    				$id_siswa 		           = $row['id_siswa'];
    				$bobot_tugas_bawah 		   = $row['bobot_tugas'];
    				$bobot_uts_bawah   		   = $row['bobot_uts'];
    				$bobot_uas_bawah   		   = $row['bobot_uas'];
    				$bobot_btq_bawah   		   = $row['bobot_btq'];
    				$bobot_bilingual_bawah     = $row['bobot_bilingual'];
    				$bobot_kepribadian_bawah   = $row['bobot_kepribadian'];
    				$bobot_ahlaq_bawah   	   = $row['bobot_ahlaq'];

    				//pengurangan
    				$nilai_preferensi_tugas_1 	    = $bobot_tugas - $bobot_tugas_bawah;
    				$nilai_preferensi_tugas_2	    = $bobot_tugas_bawah - $bobot_tugas;

    				$nilai_preferensi_uts_1 	    = $bobot_uts - $bobot_uts_bawah;
    				$nilai_preferensi_uts_2 	    = $bobot_uts_bawah - $bobot_uts;

    				$nilai_preferensi_uas_1 	    = $bobot_uas - $bobot_uas_bawah;
    				$nilai_preferensi_uas_2 	    = $bobot_uas_bawah - $bobot_uas;

    				$nilai_preferensi_btq_1 	    = $bobot_btq - $bobot_btq_bawah;
    				$nilai_preferensi_btq_2 	    = $bobot_btq_bawah - $bobot_btq;

    				$nilai_preferensi_bilingual_1   = $bobot_bilingual - $bobot_bilingual_bawah;
    				$nilai_preferensi_bilingual_2   = $bobot_bilingual_bawah - $bobot_bilingual;

    				$nilai_preferensi_kepribadian_1 = $bobot_kepribadian - $bobot_kepribadian_bawah;
    				$nilai_preferensi_kepribadian_2 = $bobot_kepribadian_bawah - $bobot_kepribadian;

    				$nilai_preferensi_ahlaq_1 	    = $bobot_ahlaq - $bobot_ahlaq_bawah;
    				$nilai_preferensi_ahlaq_2 	    = $bobot_ahlaq_bawah - $bobot_ahlaq;

    				// konversi nilai ke H
    				if($nilai_preferensi_tugas_1 > 0){
    					$H_tugas_1 = 1;
    				}else{
    					$H_tugas_1 = 0;
    				}

    				if($nilai_preferensi_tugas_2 > 0){
    					$H_tugas_2 = 1;
    				}else{
    					$H_tugas_2 = 0;
    				}


    				if($nilai_preferensi_uts_1 > 0){
                        $H_uts_1 = 1;
                    }else{
                        $H_uts_1 = 0;
                    }

                    if($nilai_preferensi_uts_2 > 0){
                        $H_uts_2 = 1;
                    }else{
                        $H_uts_2 = 0;
                    }


                    if($nilai_preferensi_uas_1 > 0){
                        $H_uas_1 = 1;
                    }else{
                        $H_uas_1 = 0;
                    }

                    if($nilai_preferensi_uas_2 > 0){
                        $H_uas_2 = 1;
                    }else{
                        $H_uas_2 = 0;
                    }


                    if($nilai_preferensi_btq_1 > 0){
                        $H_btq_1 = 1;
                    }else{
                        $H_btq_1 = 0;
                    }

                    if($nilai_preferensi_btq_2 > 0){
                        $H_btq_2 = 1;
                    }else{
                        $H_btq_2 = 0;
                    }


                    if($nilai_preferensi_bilingual_1 > 0){
                        $H_bilingual_1 = 1;
                    }else{
                        $H_bilingual_1 = 0;
                    }

                    if($nilai_preferensi_bilingual_2 > 0){
                        $H_bilingual_2 = 1;
                    }else{
                        $H_bilingual_2 = 0;
                    }


                    if($nilai_preferensi_kepribadian_1 > 0){
                        $H_kepribadian_1 = 1;
                    }else{
                        $H_kepribadian_1 = 0;
                    }

                    if($nilai_preferensi_kepribadian_2 > 0){
                        $H_kepribadian_2 = 1;
                    }else{
                        $H_kepribadian_2 = 0;
                    }


                    if($nilai_preferensi_ahlaq_1 > 0){
                        $H_ahlaq_1 = 1;
                    }else{
                        $H_ahlaq_1 = 0;
                    }

                    if($nilai_preferensi_ahlaq_2 > 0){
                        $H_ahlaq_2 = 1;
                    }else{
                        $H_ahlaq_2 = 0;
                    }

    				$ipm_1 = ($H_tugas_1 + $H_uts_1 + $H_uas_1 + $H_btq_1 + $H_bilingual_1 + $H_kepribadian_1 + $H_ahlaq_1) / 7;
    				$ipm_2 = ($H_tugas_2 + $H_uts_2 + $H_uas_2 + $H_btq_2 + $H_bilingual_2 + $H_kepribadian_2 + $H_ahlaq_2) / 7;

    				$ipm_1 = round($ipm_1, 3);
    				$ipm_2 = round($ipm_2, 3);
    				array_push($array_ipm, $ipm_1, $ipm_2);
    			}
    	    }

    	} // akhir for

        $awal   = [];
        $akhir  = [];

    	$total             = $total_siswa - 1;
        $total_pengulangan = ($total + 1) * $total;

        for ($x=$total; $x > 0; $x--) { 
            for ($y=1; $y <= $x; $y++) { 

                $hasil1 = ($total + 1) - $x;
                $hasil2 = $hasil1 + $y;

                $awal_kode_1 = "UPDATE tb_ipm SET tb_ipm.`n$hasil2` = ";
                $awal_kode_2 = "UPDATE tb_ipm SET tb_ipm.`n$hasil1` = ";

                $akhir_kode_1 = " WHERE id = $hasil1";
                $akhir_kode_2 = " WHERE id = $hasil2";

                array_push($awal, $awal_kode_1, $awal_kode_2);
                array_push($akhir, $akhir_kode_1, $akhir_kode_2);
            }   
        }

        for ($z=0; $z < $total_pengulangan; $z++) { 
            $query =  "$awal[$z] $array_ipm[$z] $akhir[$z]";
            $update = mysqli_query($koneksi, "$query")or die (mysqli_error($koneksi));
        }
    	   

        // Menentukan Perangkingan
        $array_id_ipm = [];
        $total_kolom  = 0;
        $s            = 0;

        $array_leaving_flow  = [];
        $array_entering_flow = [];
        $array_id_siswa      = [];

        $ambil_ipm = mysqli_query($koneksi, "SELECT * FROM tb_ipm")or die (mysqli_error($koneksi));
        while($row = mysqli_fetch_array($ambil_ipm)){
            $id       = $row['id'];
            $id_siswa = $row['id_siswa'];
            array_push($array_id_siswa, $id_siswa);
            $s++;

            $ambil_ipm_nya = mysqli_query($koneksi, "SELECT * FROM tb_ipm WHERE id = $id")or die (mysqli_error($koneksi));
            foreach ($ambil_ipm_nya as $baris) {
                $id       = $baris['id'];

                for ($n=1; $n <= $total_siswa; $n++) { 
                   $kolom_n  = $baris['n'.$n];
                   $total_kolom += $kolom_n;
                }

            // Menghitung Leaving Flow
                $leaving_flow = $total_kolom / ($total_siswa - 1);
                $leaving_flow = round($leaving_flow, 3);

                array_push($array_leaving_flow, $leaving_flow);
                $total_kolom = 0;
            }

            // Menghirung Entering Flow
            $ambil_ipm_nya = mysqli_query($koneksi, "SELECT sum(n".$s.") as n".$s." FROM tb_ipm")or die (mysqli_error($koneksi));
            foreach ($ambil_ipm_nya as $baris) {
                $n             = $baris['n'.$s];
                $entering_flow = $n / ($total_siswa - 1);
                $entering_flow = round($entering_flow, 3);

                array_push($array_entering_flow, $entering_flow);
            }
        }

        // Menghitung Net Flow
        for ($t=0; $t < $total_siswa; $t++) { 

            $net_flow    = $array_leaving_flow[$t] - $array_entering_flow[$t];
            $id_siswanya = $array_id_siswa[$t];
            // echo"$array_id_siswa[$t] : $array_leaving_flow[$t] - $array_entering_flow[$t] =  $net_flow <br> ";

            $update_promethee = mysqli_query($koneksi, "UPDATE tb_nilai SET hasil_promethee = $net_flow WHERE id_siswa = $id_siswanya")or die (mysqli_error($koneksi));
        }

        //ambil siswa yang lolos dalam kelas unggulan
        $ambil_hasil_akhir = mysqli_query($koneksi, "SELECT tb_siswa.`id` as id_siswa FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran ORDER BY hasil_promethee DESC LIMIT $kuota")or die (mysqli_error($koneksi));
        while($row = mysqli_fetch_array($ambil_hasil_akhir)){
            $id_siswa = $row['id_siswa'];

            //set siswa yang lulus
            $update_hasil_akhir_lulus = mysqli_query($koneksi, "UPDATE tb_nilai SET keterangan_pr = 'Lulus' WHERE id_siswa = $id_siswa")or die (mysqli_error($koneksi));
        }

        echo "<script> document.location.href='../promethee.php?pesan=sukses'; </script>";	
    }
?>