 <?php

 	include('../../koneksi.php');
    $kuota = $_POST['kuota'];

    //ambil id tahun ajaran aktif
    $data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran WHERE status = 1");
    while($row = mysqli_fetch_array($data)){
        $id_tahun_ajaran = $row['id'];
    }

 	// ambil data siswa dan nilai siswa
	$ambil_data_siswa = mysqli_query($koneksi, "SELECT tb_siswa.`id` as id_siswa, tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE tb_siswa.`id_tahun_ajaran` = $id_tahun_ajaran")or die (mysqli_error($koneksi));
	$total_siswa      = mysqli_num_rows($ambil_data_siswa);
    if($kuota > $total_siswa){

        echo "<script> document.location.href='../profile_matching.php?pesan=kuota_besar'; </script>";

    }else{

        mysqli_query($koneksi, "TRUNCATE tb_konversi_2")or die (mysqli_error($koneksi));
        mysqli_query($koneksi, "TRUNCATE tb_hasil_bobot")or die (mysqli_error($koneksi));

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
            $update_siswa = mysqli_query($koneksi, "UPDATE tb_nilai SET keterangan_pm = 'Tidak Lulus' WHERE id_siswa = $id")or die (mysqli_error($koneksi));

            //simpan dulu id siswanya ke tabel konversi 2
            $simpan_id_siswa = mysqli_query($koneksi, "INSERT INTO tb_konversi_2(id, id_siswa) VALUES('', '$id')")or die (mysqli_error($koneksi));

            //simpan dulu id siswanya ke tabel hasil bobot
            $simpan_id_siswa = mysqli_query($koneksi, "INSERT INTO tb_hasil_bobot(id, id_siswa) VALUES('', '$id')")or die (mysqli_error($koneksi));

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


            //perhitungan GAP
            $gap_tugas 		 = $bobot_tugas - 4;
            $gap_uts 	     = $bobot_uts - 4;
            $gap_uas 	     = $bobot_uas - 4;
            $gap_btq	     = $bobot_btq - 4;
            $gap_bilingual   = $bobot_bilingual - 4;
            $gap_kepribadian = $bobot_kepribadian - 4;
            $gap_ahlaq 	     = $bobot_ahlaq - 4;

            // update bobot setiap siswa
            $update_bobot = mysqli_query($koneksi, "UPDATE tb_konversi_2 SET bobot_tugas = $bobot_tugas, bobot_uts = $bobot_uts, bobot_uas = $bobot_uas, bobot_btq = $bobot_btq, bobot_bilingual = $bobot_bilingual, bobot_kepribadian = $bobot_kepribadian, bobot_ahlaq = $bobot_ahlaq WHERE id_siswa = $id")or die (mysqli_error($koneksi));

            // ambil bobot gap tugas
            $ambil_bobot_gap_tugas = mysqli_query($koneksi, "SELECT bobot FROM tb_bobot_gap WHERE selisih = $gap_tugas")or die (mysqli_error($koneksi));
            while($row = mysqli_fetch_array($ambil_bobot_gap_tugas)){
            	$bobot        = $row['bobot'];
            	
            	$update_bobot_tugas = mysqli_query($koneksi, "UPDATE tb_hasil_bobot SET bobot_gap_tugas = $bobot WHERE id_siswa = $id")or die (mysqli_error($koneksi));
            }

            // ambil bobot gap uts
            $ambil_bobot_gap_uts = mysqli_query($koneksi, "SELECT bobot FROM tb_bobot_gap WHERE selisih = $gap_uts")or die (mysqli_error($koneksi));
            while($row = mysqli_fetch_array($ambil_bobot_gap_uts)){
            	$bobot        = $row['bobot'];
            	
            	$update_bobot_uts = mysqli_query($koneksi, "UPDATE tb_hasil_bobot SET bobot_gap_uts = $bobot WHERE id_siswa = $id")or die (mysqli_error($koneksi));
            }

            // ambil bobot gap uas
            $ambil_bobot_gap_uas = mysqli_query($koneksi, "SELECT bobot FROM tb_bobot_gap WHERE selisih = $gap_uas")or die (mysqli_error($koneksi));
            while($row = mysqli_fetch_array($ambil_bobot_gap_uas)){
            	$bobot        = $row['bobot'];
            	
            	$update_bobot_uas = mysqli_query($koneksi, "UPDATE tb_hasil_bobot SET bobot_gap_uas = $bobot WHERE id_siswa = $id")or die (mysqli_error($koneksi));
            }

            // ambil bobot gap btq
            $ambil_bobot_gap_btq = mysqli_query($koneksi, "SELECT bobot FROM tb_bobot_gap WHERE selisih = $gap_btq")or die (mysqli_error($koneksi));
            while($row = mysqli_fetch_array($ambil_bobot_gap_btq)){
            	$bobot        = $row['bobot'];
            	
            	$update_bobot_btq = mysqli_query($koneksi, "UPDATE tb_hasil_bobot SET bobot_gap_btq = $bobot WHERE id_siswa = $id")or die (mysqli_error($koneksi));
            }

            // ambil bobot gap bilingual
            $ambil_bobot_gap_bilingual = mysqli_query($koneksi, "SELECT bobot FROM tb_bobot_gap WHERE selisih = $gap_bilingual")or die (mysqli_error($koneksi));
            while($row = mysqli_fetch_array($ambil_bobot_gap_bilingual)){
            	$bobot        = $row['bobot'];
            	
            	$update_bobot_bilingual = mysqli_query($koneksi, "UPDATE tb_hasil_bobot SET bobot_gap_bilingual = $bobot WHERE id_siswa = $id")or die (mysqli_error($koneksi));
            }

            // ambil bobot gap kepribadian
            $ambil_bobot_gap_kepribadian = mysqli_query($koneksi, "SELECT bobot FROM tb_bobot_gap WHERE selisih = $gap_kepribadian")or die (mysqli_error($koneksi));
            while($row = mysqli_fetch_array($ambil_bobot_gap_kepribadian)){
            	$bobot        = $row['bobot'];
            	
            	$update_bobot_kepribadian = mysqli_query($koneksi, "UPDATE tb_hasil_bobot SET bobot_gap_kepribadian = $bobot WHERE id_siswa = $id")or die (mysqli_error($koneksi));
            }

            // ambil bobot gap ahlaq
            $ambil_bobot_gap_ahlaq = mysqli_query($koneksi, "SELECT bobot FROM tb_bobot_gap WHERE selisih = $gap_ahlaq")or die (mysqli_error($koneksi));
            while($row = mysqli_fetch_array($ambil_bobot_gap_ahlaq)){
            	$bobot        = $row['bobot'];
            	
            	$update_bobot_ahlaq = mysqli_query($koneksi, "UPDATE tb_hasil_bobot SET bobot_gap_ahlaq = $bobot WHERE id_siswa = $id")or die (mysqli_error($koneksi));
            }

        }

        // hitung core faktor dan secondary factor
        $ambil_hasil_bobot_gap = mysqli_query($koneksi, "SELECT * FROM tb_hasil_bobot")or die (mysqli_error($koneksi));
        while($row = mysqli_fetch_array($ambil_hasil_bobot_gap)){
        	$id_siswa              = $row['id_siswa'];
        	$bobot_gap_tugas       = $row['bobot_gap_tugas'];
        	$bobot_gap_uts         = $row['bobot_gap_uts'];
        	$bobot_gap_uas         = $row['bobot_gap_uas'];
        	$bobot_gap_btq         = $row['bobot_gap_btq'];
        	$bobot_gap_bilingual   = $row['bobot_gap_bilingual'];
        	$bobot_gap_kepribadian = $row['bobot_gap_kepribadian'];
        	$bobot_gap_ahlaq       = $row['bobot_gap_ahlaq'];

        	$core_factor      = ($bobot_gap_tugas + $bobot_gap_uts + $bobot_gap_uas) / 3;
        	$secondary_factor = ($bobot_gap_btq + $bobot_gap_bilingual + $bobot_gap_kepribadian + $bobot_gap_ahlaq) / 4;

        	// perhitungan nilai total
        	$total_nilai = (0.6 * $core_factor ) + (0.4 * $secondary_factor);
        	$total_nilai = round($total_nilai, 4);

        	$update_hasil_akhir = mysqli_query($koneksi, "UPDATE tb_nilai SET hasil_profile_matching = $total_nilai WHERE id_siswa = $id_siswa")or die (mysqli_error($koneksi));
        }

        //ambil siswa yang lolos dalam kelas unggulan
        $ambil_hasil_akhir = mysqli_query($koneksi, "SELECT tb_siswa.`id` as id_siswa FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran ORDER BY hasil_profile_matching DESC LIMIT $kuota")or die (mysqli_error($koneksi));
        while($row = mysqli_fetch_array($ambil_hasil_akhir)){
            $id_siswa = $row['id_siswa'];

            //set siswa yang lulus
            $update_hasil_akhir_lulus = mysqli_query($koneksi, "UPDATE tb_nilai SET keterangan_pm = 'Lulus' WHERE id_siswa = $id_siswa")or die (mysqli_error($koneksi));
        }
        
    	if($ambil_hasil_bobot_gap){
    		echo "<script> document.location.href='../profile_matching.php?pesan=proses_sukses'; </script>";	
    	}else{
    		echo "<script> document.location.href='../profile_matching.php?pesan=proses_gagal'; </script>";	
    	}
    }
?>