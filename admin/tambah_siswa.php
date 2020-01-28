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
            $hal = "siswa";
            include('templates/menu.php');
        ?>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
             
             <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <b>TAMBAH DATA SISWA</b>
                        </div>
                        <div class="panel-body">
                            <a href="siswa.php"><button class="btn btn-warning btn-sm">Kembali</button></a>
                            <div style="height: 10px"></div>
                            
                            <form role="form" action="proses/simpan_siswa.php" method="post">

                                <div class="row">
                                    <div class="col-md-4">                        
                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input class="form-control" name="nisn" type="text" minlength="10" maxlength="10" autofocus required />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <input class="form-control" name="nama" type="text" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                              <option value="Laki-Laki">Laki-Laki</option>
                                              <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">                          
                                        <div class="form-group">
                                            <label>Nomor Telepon</label>
                                            <input class="form-control" name="no_telp" type="text" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <input class="form-control" name="nama_ayah" type="text" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input class="form-control" name="nama_ibu" type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Masuk Pada Tahun Ajaran</label>
                                            <select name="id_tahun_ajaran" class="form-control">
                                              <option>pilih</option>
                                              <?php
                                              $data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran order by tahun_ajaran ASC ");
                                              while($row = mysqli_fetch_array($data)){
                                              ?>
                                              <option value="<?php echo $row['id'] ?>">Tahun Ajaran <?php echo $row['tahun_ajaran'] ?></option>
                                              <?php
                                              }
                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-info">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
          }else if($_GET['pesan'] == "nisn_ada"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Tambah Data Gagal',
                    text: 'NISN Tidak Boleh Sama Dengan Siswa Yang Lain',
                  })
              </script>
          <?php
          }
      }
    ?>
</body>
</html>
