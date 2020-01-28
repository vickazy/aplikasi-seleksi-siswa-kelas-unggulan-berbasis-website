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
            $hal = 'artikel';
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
              <?php
              include('koneksi.php');
              $id = $_GET['id']; 

              $data = mysqli_query($koneksi,"SELECT * FROM tb_artikel WHERE id = $id");
              while($row = mysqli_fetch_array($data)){ 
              ?>

              <span style="font-size: 22px; color: #0a0a1c"><b><?php echo $row['judul'] ?></b></span>
              <hr>
              
              <p><?php echo $row['isi'] ?></p>
              <small>Diposkan <?php echo $row['tanggal'] ?></small>

              <?php
              }
              ?>
            </div>

            <div class="col-md-4">
                <span style="font-size: 18px; color: #0a0a1c"><b>Artikel Terbaru</b></span>
                <hr>
                <ul>
                  <?php
                  include('koneksi.php');
                  $data = mysqli_query($koneksi,"SELECT * FROM tb_artikel order by id DESC LIMIT 5");
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