<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include('templates/css.php'); ?>

  </head>
  <body>
    
    <div class="probootstrap-page-wrapper">
      <!-- Fixed navbar -->
      
      <nav class="navbar navbar-default probootstrap-navbar" style="background-color: #171c5c">
        <?php 
            $hal = 'hubungi_kami';
            include('templates/navbar.php') 
        ?>
      </nav>
      
      <section class="probootstrap-section-colored">
        <img src="assets_user/img/header.jpg" class="img-responsive" width="100%">
      </section>

      <section class=" probootstrap-section-sm">
        <div class="container">
          
          <div style="height: 25px"></div>
          <div class="row">
            <div class="col-md-8">
              <span style="font-size: 22px; color: #0a0a1c"><b>Letak SMP Negeri Sukawangi</b></span>
              <hr>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1014798.6993569396!2d106.64323618299946!3d-6.514416858876345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6987f1dc8ab585%3A0x645f1ae7af6aca06!2sSMPN%201%20Sukawangi!5e0!3m2!1sid!2sid!4v1575515945743!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

              <div style="height: 40px"></div>
              <span style="font-size: 18px; color: #0a0a1c"><b>Kontak SMP Negeri Sukawangi</b></span>
              <hr>
              <div class="row">
                  <form action="kirim.php" method="post">
                      <div class="col-md-5">
                          <div class="form-group">
                            <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap">
                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control" id="name" name="email" placeholder="Email">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="name" name="judul" placeholder="Judul Pesan">
                          </div>
                      </div>
                      <div class="col-md-7">
                          <div class="form-group">
                              <textarea class="form-control" name="pesan" rows="6" placeholder="Tulis Pesan"></textarea>
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <button class="btn btn-info">Kirim</button>
                          </div>
                      </div>
                  </form>
              </div>

            </div>

            <div class="col-md-4">
                <span style="font-size: 18px; color: #0a0a1c"><b>Artikel Terbaru</b></span>
                <hr>
                <ul>
                  <?php
                  include('koneksi.php');
                  $data = mysqli_query($koneksi,"SELECT * FROM tb_artikel order by id DESC LIMIT 10");
                  while($row = mysqli_fetch_array($data)){ 
                  ?>
                  <a href="lihat_artikel.php?id=<?php echo $row['id'] ?>" style="color: grey; text-transform: uppercase; font-size: 12px;"><li><?php echo $row['judul'] ?></li></a>
                  <?php
                  }
                  ?>
                </ul>
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

<?php 
  if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "sukses"){
      ?>
          <script type="text/javascript">
              Swal.fire({
                type: 'success',
                title: 'Berhasil',
                text: 'Pesan Berhasil Dikirimkan',
              })
          </script>
      <?php
      }else if($_GET['pesan'] == "gagal"){
      ?>
          <script type="text/javascript">
              Swal.fire({
                type: 'warning',
                title: 'Gagal',
                text: 'Pesan Gagal Dikirimkan',
              })
          </script>
      <?php
    }
  }
?>
