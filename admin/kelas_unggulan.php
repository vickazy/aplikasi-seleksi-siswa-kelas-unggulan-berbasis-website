<?php include('templates/session.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <?php include('templates/css.php') ?>
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero" style="background-color: #171c5c" >
        <?php include('templates/header.php') ?>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <?php 
            $hal = "kelas_unggulan";
            include('templates/menu.php');
        ?>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
             
             <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <b>DATA KELAS UNGGULAN HASIL ALGORITMA <span style="color: green">PROFILE MATCHING</span></b>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>NISN</th>
                                                  <th>Nama Siswa</th>
                                                  <th>Nilai Profile Matching</th>
                                                  <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no=0;
                                            $data = mysqli_query($koneksi,"SELECT tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran AND keterangan_pm = 'Lulus' ORDER BY hasil_profile_matching DESC");
                                            while($row = mysqli_fetch_array($data)){ 
                                            $no++;
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['nisn'] ?></td>
                                                    <td><?php echo $row['nama'] ?></td>
                                                    <td><?php echo $row['hasil_profile_matching'] ?></td>
                                                    <td><?php echo $row['keterangan_pm'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <a href="cetak_pm.php" target="_blank"><button class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Cetak</button></a>
                                    
                                </div>
                            </div>
                            <!--End Advanced Tables -->

                        </div>

                        <div class="col-md-6">
                            
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <b>DATA KELAS UNGGULAN HASIL ALGORITMA <span style="color: green">PROMETHEE</span></b>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>NISN</th>
                                                  <th>Nama Siswa</th>
                                                  <th>Nilai Promethee</th>
                                                  <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no=0;
                                            $data = mysqli_query($koneksi,"SELECT tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran  AND keterangan_pr = 'Lulus' ORDER BY hasil_promethee DESC");
                                            while($row = mysqli_fetch_array($data)){ 
                                            $no++;
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['nisn'] ?></td>
                                                    <td><?php echo $row['nama'] ?></td>
                                                    <td><?php echo $row['hasil_promethee'] ?></td>
                                                    <td><?php echo $row['keterangan_pr'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <a href="cetak_pr.php" target="_blank"><button class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Cetak</button></a>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                    
                        </div>
                    </div>
                </div>
            </div>
              <!-- /. ROW  -->
        </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section" style="background-color: black; color: white">
        <?php include('templates/footer.php') ?>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <?php include('templates/js.php') ?>
    <!-- DATATABLE SCRIPTS  -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    
    <?php 
      if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Ditambahkan',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "edit_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Diubah',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "hapus_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Dihapus',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "import_gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Import Gagal',
                    text: 'Ada Data Yang Kosong, Cek Kembali Isi Dokumennya',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "import_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Import Berhasil',
                    text: 'Data Berhasil Diimportkan',
                  })
              </script>
          <?php
          }
      }
    ?>

    <script>
        $(document).ready(function(){
             $('.hapus').on('click',function(){
                var getLink = $(this).attr('href');
                    swal({
                            title: 'Hapus',
                            text: 'Anda Yakin Ingin Menghapus?',
                            html: true,
                            confirmButtonColor: '#d9534f',
                            showCancelButton: true,
                            cancelButtonText: "Batal",
                            },function(){
                            window.location.href = getLink
                        });
                    return false;
            });
        });
    </script>
</body>
</html>
