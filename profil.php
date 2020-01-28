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
            $hal = 'profil';
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
              <span style="font-size: 22px; color: #0a0a1c"><b>Profil SMP Negeri Sukawangi</b></span>
              <hr>
              <p style="text-align: justify;">
                SMP Negeri Sukawangi Bekasi berdiri pada tanggal 22 November 2003 sampai sekarang. Pada saat ini, SMP Negeri Sukawangi membagi cabang yaitu SMP Negeri 1 Sukawangi dan SMP Negeri 2 Sukawangi, bahkan belum lama ini sudah di bangun juga SMA Negeri 1 Sukawangi. Saat ini, sekolah-sekolah tersebut mengadakan program kelas unggulan, guna membangkitkan bakat-bakat siswa yang berprestasi.
              </p>
              <b>Detail Profil Sekolah</b>
              <div style="height: 10px"></div>
              <table class=" table-striped">
                <tr>
                  <td>Nama Sekolah</td>
                  <td>:</td>
                  <td>SMP Negeri Sukawangi</td>
                </tr>

                <tr>
                  <td>Jenjang Pendidikan</td>
                  <td>:</td>
                  <td>SMP</td>
                </tr>

                <tr>
                  <td>Status Sekolah</td>
                  <td>:</td>
                  <td>Negeri</td>
                </tr>

                <tr>
                  <td>Akreditasi</td>
                  <td>:</td>
                  <td>A</td>
                </tr>

                <tr>
                  <td>Nama Kepala Sekolah</td>
                  <td>:</td>
                  <td>Suryo Sumaryoko, S.Pd. M.Si</td>
                </tr>

                <tr>
                  <td>Alamat Sekolah</td>
                  <td>:</td>
                  <td>Jl. Raya Sukawangi Rt 10/05 Desa Sukabudi Kecamatan Sukawangi Kabupaten Bekasi, 17650</td>
                </tr>

                <tr>
                  <td>SK Pendirian Sekolah</td>
                  <td>:</td>
                  <td>421/Kep.319-Disdik</td>
                </tr>

                <tr>
                  <td>Tanggal Pendirian Sekolah</td>
                  <td>:</td>
                  <td>22 November 2003</td>
                </tr>

                <tr>
                  <td>Status kepemilikan</td>
                  <td>:</td>
                  <td>Pemerintah</td>
                </tr>

                <tr>
                  <td>SK ijin Operasional</td>
                  <td>:</td>
                  <td>421/Kep.319-Disdik</td>
                </tr>

                <tr>
                  <td>Tanggal SK Ijin Operasional</td>
                  <td>:</td>
                  <td>22 November 2003</td>
                </tr>

                <tr>
                  <td>Jumlah Siswa Tahun 2019/2020</td>
                  <td>:</td>
                  <td>936 Siswa</td>
                </tr>

                <tr>
                  <td>Jumlah Kelas</td>
                  <td>:</td>
                  <td>24 Kelas</td>
                </tr>

                <tr>
                  <td>Jumlah Tenaga Pengajar</td>
                  <td>:</td>
                  <td>33 Pengajar</td>
                </tr>

                <tr>
                  <td>Jumlah Labolatorium</td>
                  <td>:</td>
                  <td>1 Labolatorium</td>
                </tr>

                <tr>
                  <td>Jumlah Perpustakaan</td>
                  <td>:</td>
                  <td>1 Perpustakaan</td>
                </tr>

                <tr>
                  <td>Kurikulum </td>
                  <td>:</td>
                  <td>2013</td>
                </tr>

              </table>
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