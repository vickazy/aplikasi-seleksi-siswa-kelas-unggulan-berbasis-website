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
            $hal = "nilai";
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
                             <b>TAMBAH DATA NILAI SISWA</b>
                        </div>
                        <div class="panel-body">
                            <a href="nilai.php"><button class="btn btn-warning btn-sm">Kembali</button></a>
                            <div style="height: 10px"></div>
                            
                            <form role="form" action="proses/simpan_nilai.php" method="post">
                            <?php
                              $id   = $_GET['id']; 
                              $data = mysqli_query($koneksi,"SELECT * FROM tb_siswa WHERE id = $id");
                              while($row = mysqli_fetch_array($data)){ 

                              ?>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <div class="row">
                                    <div class="col-md-4">   
                                    <h4>Data Siswa</h4>                        
                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input class="form-control" name="nisn" value="<?php echo $row['nisn'] ?>" type="text" minlength="10" maxlength="10" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <input class="form-control" name="nama" value="<?php echo $row['nama'] ?>" type="text" disabled />
                                        </div>
                                    </div>

                                    <div class="col-md-2">  
                                    <h4>Data Nilai</h4>                          
                                        <div class="form-group">
                                            <label>Nilai Tugas</label>
                                            <input class="form-control" name="n_tugas" type="text" required autofocus />
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai UTS</label>
                                            <input class="form-control" name="n_uts" type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                    <p>&nbsp;</p>
                                        <div class="form-group">
                                            <label>Nilai UAS</label>
                                            <input class="form-control" name="n_uas" type="text" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai BTQ</label>
                                            <input class="form-control" name="n_btq" type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                    <p>&nbsp;</p>
                                        <div class="form-group">
                                            <label>Nilai Bilingual</label>
                                            <input class="form-control" name="n_bilingual" type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                    <p>&nbsp;</p>

                                        <div class="form-group">
                                            <label>Nilai Kepribadian</label>
                                            <select name="n_kepribadian" class="form-control" required>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup Baik">Cukup Baik</option>
                                                <option value="Kurang Baik">Kurang Baik</option>
                                                <option value="Buruk">Buruk</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai Ahlaq</label>
                                            <select name="n_ahlaq" class="form-control" required>
                                                <option value="Sangat Baik">Sangat Baik</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Cukup Baik">Cukup Baik</option>
                                                <option value="Kurang Baik">Kurang Baik</option>
                                                <option value="Buruk">Buruk</option>
                                            </select>
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
                              <?php
                              }
                              ?>
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
          }
      }
    ?>
</body>
</html>
