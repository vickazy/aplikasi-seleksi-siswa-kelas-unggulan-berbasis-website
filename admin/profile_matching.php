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
            $hal = "metode";
            include('templates/menu.php');
        ?>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
             
             <div class="row">
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                              <b>METODE PROFILE MATCHING</b>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Beranda</a>
                                </li>
                                <li class=""><a href="#bobot_gap" data-toggle="tab">Bobot Nilai GAP</a>
                                </li>
                                <li class=""><a href="#bobot" data-toggle="tab">Bobot Alternatif</a>
                                </li>
                                <li class=""><a href="#unggulan" data-toggle="tab">Hasil Kelas Unggulan</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    <h4>Beranda</h4>
                                    <p>Menentukan Kelas Unggulan dengan menggunakan <b>Algoritma Profile Matching</b>.
                                    Klik Tombol <b>Mulai</b> untuk melakukan penentuan kelas unggulan dibawah ini. <br>

                                    Kemudian masukkan <b>Jumlah Siswa</b> yang akan dimasukkan kedalam kelas unggulan.
                                    </p>
                                    <div style="text-align: center;">
                                        <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Mulai</button>
                                    </div>
                                    <small><i>* Klik Menu <b>Hasil Kelas Unggulan</b> untuk melihat hasil</i></small>
                                </div>

                                <div class="tab-pane fade" id="bobot_gap">
                                    <h4>Bobot Nilai GAP</h4>
                                    <a href="tambah_bobot.php"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></a>
                                    <div style="height: 10px"></div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Selisih GAP</th>
                                                  <th>Bobot Nilai</th>
                                                  <th>Keterangan</th>
                                                  <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no=0;
                                            $data = mysqli_query($koneksi,"SELECT * FROM tb_bobot_gap order by id ASC");
                                            while($row = mysqli_fetch_array($data)){ 
                                            $no++;
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['selisih'] ?></td>
                                                    <td><?php echo $row['bobot'] ?></td>
                                                    <td><?php echo $row['keterangan'] ?></td>
                                                    <td>
                                                        <a href="edit_bobot.php?id=<?php echo $row['id'] ?>" title="Edit"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> </button></a>
                                                        <a href="proses/hapus_bobot.php?id=<?php echo $row['id'] ?>" title="Hapus" class="hapus"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="bobot">
                                    <h4>Bobot Alternatif</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Nama Siswa</th>
                                                  <th>Tugas</th>
                                                  <th>UTS</th>
                                                  <th>UAS</th>
                                                  <th>BTQ</th>
                                                  <th>Bilingual</th>
                                                  <th>Kepribadian</th>
                                                  <th>Ahlaq</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no=0;
                                            $data = mysqli_query($koneksi,"SELECT tb_konversi_2.*, tb_siswa.`nama` FROM tb_konversi_2 JOIN tb_siswa ON tb_konversi_2.`id_siswa` = tb_siswa.`id` WHERE id_tahun_ajaran = $id_tahun_ajaran order by tb_siswa.`nama` ASC");
                                            while($row = mysqli_fetch_array($data)){ 
                                            $no++;
                                            ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['nama'] ?></td>
                                                    <td><?php echo $row['bobot_tugas'] ?></td>
                                                    <td><?php echo $row['bobot_uts'] ?></td>
                                                    <td><?php echo $row['bobot_uas'] ?></td>
                                                    <td><?php echo $row['bobot_btq'] ?></td>
                                                    <td><?php echo $row['bobot_bilingual'] ?></td>
                                                    <td><?php echo $row['bobot_kepribadian'] ?></td>
                                                    <td><?php echo $row['bobot_ahlaq'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="unggulan">
                                    <h4>Hasil Kelas Unggulan</h4>
                                    Klik <button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm"> Mulai Lagi</button> untuk mencoba kembali
                                    <div style="height: 10px"></div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="tabel4">
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
                                            $data = mysqli_query($koneksi,"SELECT tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran order by nama ASC");
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

                                    <a href="cetak_semua_pm.php" target="_blank"><button class="btn btn-info btn-sm"><i class="fa fa-download"></i> Cetak</button></a>
                                </div>

                            </div>
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

    <!-- Small modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button> -->

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Masukkan Jumlah Siswa</h4>
          </div>
          <form role="form" action="proses/proses_profile_matching.php" method="post">
          <div class="modal-body">
              <div class="form-group">
                  <input class="form-control" name="kuota" type="text" autofocus required placeholder="contoh: 30" />
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Mulai</button>
          </div>
          </form>
        </div><!-- /.modal-content -->

      </div>
    </div>

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
          }else if($_GET['pesan'] == "proses_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Diproses',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "kuota_besar"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Maaf kuota yang Anda masukkan melebihi jumlah kuota siswa yang ada',
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
