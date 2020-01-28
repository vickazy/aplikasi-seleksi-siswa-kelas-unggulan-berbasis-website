<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include('templates/css.php'); ?>

    <!--[if lt IE 9]>
      <script src="assets_user/js/vendor/html5shiv.min.js"></script>
      <script src="assets_user/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="probootstrap-page-wrapper">
      <!-- Fixed navbar -->
      
      <nav class="navbar navbar-default probootstrap-navbar" style="background-color: #171c5c">
        <?php 
            $hal = 'beranda';
            include('templates/navbar.php') 
        ?>
      </nav>
      
      <section class="probootstrap-section-colored">
        <img src="assets_user/img/header.jpg" class="img-responsive" width="100%">
      </section>

      
      <section class="probootstrap-section probootstrap-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <span class="thumbnail" style="background-color: #033761">
                      <div style="height: 50px"></div>
                      <center>
                          <b style="color: #f2f5f0; font-size: 30px"><i class="icon-check"></i></b><br>
                          <b style="color: #f2f5f0">KURIKULUM<br>
                          2013</b>
                      </center>
                      <div style="height: 50px"></div>
                    </span>
                </div>

                <div class="col-md-3">
                    <span class="thumbnail" style="background-color: #035861">
                      <div style="height: 50px"></div>
                      <center>
                          <b style="color: #f2f5f0; font-size: 30px"><i class="icon-check"></i></b><br>
                          <b style="color: #f2f5f0">TERAKREDITASI<br>
                          A</b>
                      </center>
                      <div style="height: 50px"></div>
                    </span>
                </div>

                <div class="col-md-3">
                    <span class="thumbnail" style="background-color: #4d0361">
                      <div style="height: 50px"></div>
                      <center>
                          <b style="color: #f2f5f0; font-size: 30px"><i class="icon-check"></i></b><br>
                          <b style="color: #f2f5f0">PRESTASI<br>
                          TINGKAT NASIONAL</b>
                      </center>
                      <div style="height: 50px"></div>
                    </span>
                </div>

                <div class="col-md-3">
                    <span class="thumbnail" style="background-color: #036153">
                      <div style="height: 50px"></div>
                      <center>
                          <b style="color: #f2f5f0; font-size: 30px"><i class="icon-check"></i></b><br>
                          <b style="color: #f2f5f0">SARANA DAN PRASARANA<br>
                          MEMADAI</b>
                      </center>
                      <div style="height: 50px"></div>
                    </span>
                </div>
            </div>
            <hr>
        </div>
      </section>


      <section class=" probootstrap-section-sm">
        <div class="container">
          
          <div class="row">
            <div class="col-md-7">
              <!-- <span style="font-size: 18px; color: #0a0a1c">Hasil Seleksi Kelas Unggulan</span> -->
              <span style="font-size: 22px; color: #0a0a1c"><b>Hasil Seleksi Kelas Unggulan</b></span>
              <hr>
              <!-- <hr> -->
              <img src="assets_user/img/unggulan.jpg" class="img-responsive">
              <p>Berikut siswa - siswi pilihan yang masuk dalam kelas unggulan. Bagi siswa - siswi yang tidak terpilih, diharapkan untuk terus meningkatkan belajarnya.<br>
              <a href="kelas_unggulan.php"><button class="btn btn-info">Lihat</button></a>
              </p>
            </div>

            <div class="col-md-5">
              <div class="row">

                  <div class="col-md-12">
                      <span style="font-size: 22px; color: #0a0a1c"><b>Pimpimpan Sekolah</span>
                        <hr>
                  </div>
                  
                  <div class="col-md-6">
                    <center><img src="assets_user/img/kepala sekolah.jpg" class="img-responsive" style="height: 230px; width: 100%"></center>
                    <div style="height: 5px"></div>
                    <center>
                        <button class="btn btn-primary">
                            Kepala Sekolah <br> <b>Suryo Sumaryoko</b>
                        </button>
                    </center>
                  </div>

                  <div class="col-md-6">
                    <center><img src="assets_user/img/wakil.jpg" class="img-responsive" style="height: 230px; width: 100%"></center>
                    <div style="height: 5px"></div>
                    <center>
                        <button class="btn btn-primary">
                            Wakil Kepala<br> <b>Uswatun Hasanah</b>
                        </button>
                    </center>
                  </div>

              </div>
            </div>

          </div>
          <hr>

          <div class="row">
            <div class="col-md-4" style="background-color: #0a0a1c;">
              <div style="height: 10px"></div>
              <span style="font-size: 20px; color: white">Prestasi</span><br>
              <span style="font-size: 18px; color: white">SMP Negeri Sukawangi</span>
              <div style="height: 15px"></div>
              <ul>
                <li>Karmo - Satya Lencana Karya Satya XX Tingkat Nasional</li>
                <li>Ety Nurhayati - Satya Lencana Karya Satya XX Tingkat Nasional</li>
              </ul>
            </div>

             <div class="col-md-1"></div>

            <div class="col-md-7" style="background-color: #dcdce6;">
              <div style="height: 10px"></div>
              <span style="font-size: 20px; color: #0696ba"><b>Berita Terbaru</b></span><br>

              <?php
              include('koneksi.php');

              $data = mysqli_query($koneksi,"SELECT * FROM tb_artikel ORDER BY id DESC LIMIT 1");
              while($row = mysqli_fetch_array($data)){ 
              ?>
              <span style="font-size: 18px;"><?php echo $row['judul'] ?></span>
              <hr>
              <span><?php echo $row['isi'] ?></span>

              <?php
              }
              ?>
            </div>

          </div>
          <hr>

        </div>
      </section>
      
      
      <footer class="probootstrap-footer ">
          <?php include('templates/footer.php') ?>
      </footer>

    </div>
    <!-- END wrapper -->
    
    <?php include('templates/js.php') ?>
    
  </body>
</html>