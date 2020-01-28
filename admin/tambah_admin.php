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
                             <b>TAMBAH DATA ADMIN</b>
                        </div>
                        <div class="panel-body">
                            <a href="admin.php"><button class="btn btn-warning btn-sm">Kembali</button></a>
                            <div style="height: 10px"></div>
                            
                            <form role="form" action="proses/simpan_admin.php" method="post">

                                <div class="row">
                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" type="text" autofocus required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" type="password" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">                       
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control" name="nama_lengkap" type="text" required />
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
          if($_GET['pesan'] == "gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Username sudah digunakan',
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
