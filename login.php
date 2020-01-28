<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Sistem Pendukung Keputusan Seleksi Siswa Kelas Unggulan SMP Negeri Sukawangi</title>
    <link rel="shortcut icon" href="assets/images/favicon.png1" />
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" type="text/css" href="assets/css/sweet.css">

    <style type="text/css">
        
        body::after {
          background: url('assets/img/3.jpg');
          background-attachment: fixed;
          content: "";
          opacity: 0.6;
          position: absolute;
          top: 0;
          right: 0;
          left: 0;
          z-index: -1; 
          width: 100%;
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;  

          /*background-repeat: no-repeat;*/
        }
    </style>

</head>
<body id="background" >
    <div class="navbar navbar-inverse set-radius-zero" style="background-color: #171c5c">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="login.php">
                    <div style="height: 8px"></div>
                    <img src="assets_user/img/New folder/logo.png" />
                </a>

            </div>
            
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            
                            <li><a href="login.php" class="menu-top-active">LOGIN</a></li>
                            <li><a href="index.php" target="_blank">WEB USER</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
    <div>
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <div style="height: 30px"></div>
                <h4 class="header-line" style="text-align: center; color: white">Sistem Pendukung Keputusan Seleksi Siswa Kelas Unggulan SMP Negeri Sukawangi</h4>
                
            </div>

        </div>
           <div class="row">
                <div class="col-md-4 col-sm-4">
                    
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center;">
                            <b>LOGIN</b>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="cek_login.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" />
                                </div>
                                <div style="text-align: center;">
                                    <button type="submit" class="btn btn-info">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    
                </div>
            </div>
                   <!-- /. ROW  -->
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   &copy; 2019 | Skripsi Teknik Informatika
                </div>

            </div>
        </div>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/sweet.js"></script>
    
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
