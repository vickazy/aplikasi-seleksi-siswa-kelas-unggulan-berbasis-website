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
            $hal = 'visi_misi';
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
              <span style="font-size: 22px; color: #0a0a1c"><b>Visi & Misi</b></span>
              <hr>
              <span style="font-size: 16px; color: #0a0a1c"><b>Visi</b></span><br>
              <span>Menghasilkan Lulusan yang taqwa, cerdas, terampil dan mampu berkompetisi di bidangnya masing-masing indikator.
                <ul>
                  <li>Taqwa kepada Tuhan Yang Maha Esa</li>
                  <li>Memiliki tingkat kecerdasan yang tinggi</li>
                  <li>Mampu berprestasisesuai dengan kompetisinya</li>
                  <li>Mampu berkompetisi di masyarakat</li>
                  <li>Mampu mensejahterakan dirinya dan orang lain</li>
                </ul>
              </span>

              <span style="font-size: 16px; color: #0a0a1c"><b>Misi</b></span>
              <ul>
                <li>Meningkatkan ketaqwaan kepada Tuhan Yang Maha Esa secara terus-menerus</li>
                <li>Melaksanakan kegiatan belajar-mengajar secara efektif</li>
                <li>Memandu kompetensi siswa kea rah yang lebih relevan</li>
                <li>Meningkatkan kompetensi siswa sesuai dengan kemampuannya</li>
                <li>Memotivasi dan menumbuhkan semangat siswa untuk berprestasi mengikuti perkembangan alam, pengetahuan dan teknologi</li>
              </ul>

            </div>

            <div class="col-md-4">
                <span style="font-size: 18px; color: #0a0a1c"><b>Halaman</b></span>
                <hr>
                <a href="index.php"><div class="btn btn-primary">Beranda</div><div style="height: 5px"></div></a>
                <a href="profil.php"><div class="btn btn-primary">Profil</div><div style="height: 5px"></div></a>
                <a href="visi_misi.php"><div class="btn btn-primary">Visi & Misi</div><div style="height: 5px"></div></a>
                <a href="artikel.php?halaman=1"><div class="btn btn-primary">Artikel</div><div style="height: 5px"></div></a>
                <a href="hubungi_kami.php"><div class="btn btn-primary">Hubungi Kami</div><div style="height: 5px"></div></a>
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