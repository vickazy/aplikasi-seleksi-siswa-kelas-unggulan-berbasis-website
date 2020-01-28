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

              $halaman = 6; /* page halaman*/
              $page    =isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai   =($page>1) ? ($page * $halaman) - $halaman : 0;
              
              $result  = mysqli_query($koneksi,"SELECT * FROM tb_artikel order by id asc");
              $total   = mysqli_num_rows($result);
              $pages   = ceil($total/$halaman);

              $data = mysqli_query($koneksi,"SELECT * FROM tb_artikel order by id DESC LIMIT $mulai, $halaman");
              while($row = mysqli_fetch_array($data)){ 
              ?>

              <span style="font-size: 22px; color: #0a0a1c"><b><?php echo $row['judul'] ?></b></span>
              <hr>
              <p><?php echo $row['judul'] ?> <br><a href="lihat_artikel.php?id=<?php echo $row['id'] ?>" style="color: #32a852">Selengkapnya</a></p>

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


          <div class="btn-group" role="group" aria-label="Basic example">
            <b>Halaman &nbsp;</b>
            <?php
                $halamannya = $_GET['halaman'];

                for ($i=1; $i<=$pages ; $i++){
                $aktif = $i;
            ?>
              <a href="artikel.php?halaman=<?php echo $i; ?>" style="text-decoration:none">
                <!-- <button type="button" class="btn btn-sm <?php if($halamannya == $aktif){ echo"btn-primary"; }else{ echo"btn-default"; } ?>"><?php echo $i; ?></button> -->

                <span class="label label-sm <?php if($halamannya == $aktif){ echo"label-primary"; }else{ echo"label-default"; } ?>"><?php echo $i; ?></span>
              </a>&nbsp;
            <?php
                  }
            ?>
          </div>
          <div style="height: 20px"></div>

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