<?php include('templates/session.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <?php include('templates/css.php') ?>
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>
<body >
    <div class="navbar navbar-inverse set-radius-zero" style="background-color: #171c5c">
        <?php include('templates/header.php') ?>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <?php 
            $hal = "beranda";
            include('templates/menu.php');
        ?>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">

            <div class="row">

                <div class="col-md-7 col-sm-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bookmark"></i> Resume
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="alert back-widget-set text-center" style="background-color: #329ea8; color: white">
                                        <i class="fa fa-user fa-2x"></i><br>
                                        <?php
                                        $data         = mysqli_query($koneksi,"SELECT * FROM tb_siswa order by id DESC");
                                        $jumlah_siswa = mysqli_num_rows($data);
                                        ?>
                                        <span><?php echo $jumlah_siswa ?></span>
                                        <p>Siswa</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="alert back-widget-set text-center" style="background-color: #b03333; color: white">
                                        <i class="fa fa-recycle fa-2x"></i><br>
                                        <?php
                                        $data         = mysqli_query($koneksi,"SELECT * FROM tb_bobot_gap order by id DESC");
                                        $jumlah_bobot = mysqli_num_rows($data);
                                        ?>
                                        <span><?php echo $jumlah_bobot ?></span>
                                        <p>Bobot Gap</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="alert back-widget-set text-center" style="background-color: #39b033; color: white">
                                        <i class="fa fa-file-text fa-2x"></i><br>
                                        <?php
                                        $data           = mysqli_query($koneksi,"SELECT * FROM tb_artikel order by id DESC");
                                        $jumlah_artikel = mysqli_num_rows($data);
                                        ?>
                                        <span><?php echo $jumlah_artikel ?></span>
                                        <p>Artikel</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="alert back-widget-set text-center" style="background-color: #c9c934; color: white">
                                        <i class="fa fa-envelope fa-2x"></i><br>
                                        <?php
                                        $data         = mysqli_query($koneksi,"SELECT * FROM tb_kontak order by id DESC");
                                        $jumlah_pesan = mysqli_num_rows($data);
                                        ?>
                                        <span><?php echo $jumlah_pesan ?></span>
                                        <p>Pesan</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell"></i> Tahun Ajaran Aktif
                        </div>
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-md-3">
                                  <img src="../assets/img/kalender.png" style="height: 90px">
                              </div>
                              <div class="col-md-9">
                                  <p>Tahun Ajaran yang Aktif pada saat ini</p>
                                  <?php
                                  $data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran WHERE status = 1");
                                  while($row = mysqli_fetch_array($data)){
                                  ?>
                                  <h3>Tahun Ajaran : <b><?php echo $row['tahun_ajaran']; ?></b></h3>
                                  <?php
                                  }
                                  ?>
                                  <div style="height: 18px"></div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-7 col-sm-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tasks"></i> Tahun Ajaran
                        </div>
                        <div class="panel-body">
                            <a href="tambah_ajaran.php"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></a>
                            <div style="height: 10px"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>ID</th>
                                          <th>Tahun Ajaran</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran order by id DESC");
                                    while($row = mysqli_fetch_array($data)){ 
                                    $no++;
                                    $status = $row['status'];
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['tahun_ajaran'] ?></td>
                                            <td>
                                                <?php 
                                                if($status == 1){
                                                  ?> <span class="label label-primary">Aktif</span> <?php
                                                }else{
                                                  ?> <span class="label label-danger">Tidak Aktif</span> <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($status == 1){
                                                    ?>
                                                    <a href="edit_siswa.php?id=<?php echo $row['id'] ?>" title="Edit"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> </button></a>
                                                    <a href="proses/hapus_siswa.php?id=<?php echo $row['id'] ?>" title="Hapus" class="hapus"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a href="proses/aktifkan_ajaran.php?id=<?php echo $row['id'] ?>" title="Edit"><button class="btn btn-sm btn-warning"> Aktifkan</button></a>
                                                    <a href="edit_siswa.php?id=<?php echo $row['id'] ?>" title="Edit"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> </button></a>
                                                    <a href="proses/hapus_siswa.php?id=<?php echo $row['id'] ?>" title="Hapus" class="hapus"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></a>
                                                    <?php
                                                }
                                                ?>
                                                
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-sm-5">
                    <div class="jumbotron">
                      <h2>Perikas Data Siswa</h2>
                      <small>Periksa kembali Data Siswa yang akan mengikuti seleksi Kelas Unggulan</small>
                      <p><a class="btn btn-primary btn-lg" href="siswa.php" role="button">Periksa</a></p>
                    </div>
                </div>

            </div>

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
          if($_GET['pesan'] == "logout"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Logout',
                    text: 'Silahkan Login Kembali',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "password_gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Password Gagal Diubah',
                    text: 'Password Lama Salah',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Login Gagal',
                    text: 'Silahkan Periksa Kembali Username dan Password Anda',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "sukses_tambah"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Ditambahkan',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "sukses_aktif"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Tahun Ajaran Berhasil Diaktifkan',
                  })
              </script>
          <?php
          }
      }
    ?>
</body>
</html>
