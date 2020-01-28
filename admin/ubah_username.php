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
                             <b>UBAH USERNAME</b>
                        </div>
                        <div class="panel-body">
                            <div style="height: 10px"></div>
                            
                            <?php
                            $id   = $_GET['id'];
                            $data = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id = $id");
                            while($row = mysqli_fetch_array($data)){
                            ?>
                            <form role="form" action="proses/update_username.php" method="post">

                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <div class="row">
                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" type="text" value="<?php echo $row['username'] ?>" autofocus required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">                       
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control" name="nama_lengkap" type="text" value="<?php echo $row['nama'] ?>" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">                      
                                        <div class="form-group">
                                            <label>Masukkan Password</label>
                                            <input class="form-control" name="password" type="text" required />
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            }
                            ?>
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
          if($_GET['pesan'] == "username_ada"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Username sudah digunakan',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "password_beda"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Password Anda salah',
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
