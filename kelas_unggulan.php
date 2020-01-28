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
            $hal = 'beranda';
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
            
            <div class="col-md-12">
                <?php
                include('koneksi.php');

                //ambil id tahun ajaran aktif
                $data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran WHERE status = 1");
                while($row = mysqli_fetch_array($data)){
                $id_tahun_ajaran = $row['id'];
                $tahun_ajaran    = $row['tahun_ajaran'];
                ?>
                <span style="font-size: 22px; color: #0a0a1c"><b>Kelas Unggulan Tahun Ajaran <?php echo "$tahun_ajaran"; ?></b></span>
                <?php
                }
                ?>
                <hr>

                <form class="form-inline" action="lihat_kelas.php" method="post">
                    <div class="form-group">
                      <select class="form-control" name="algoritma">
                          <option>Silahkan Pilih:</option>
                          <option value="1">1. Kelas Unggulan Hasil Algoritma Profile Matching</option>
                          <option value="2">2. Kelas Unggulan Hasil Algoritma Promethee</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lihat</button>
                </form>
                <div style="height: 10px"></div>

                <span>Data Tidak Ditemukan</span>

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