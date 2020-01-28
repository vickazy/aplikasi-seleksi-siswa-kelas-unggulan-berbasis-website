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

                <?php
                $algoritma = $_POST['algoritma'];
                if($algoritma == 1){
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                            <thead>
                                <tr>
                                  <th>No</th>
                                  <th>NISN</th>
                                  <th>Nama Siswa</th>
                                  <th>Nilai Profile Matching</th>
                                  <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            //ambil id tahun ajaran aktif
                            $data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran WHERE status = 1");
                            while($row = mysqli_fetch_array($data)){
                                $id_tahun_ajaran = $row['id'];
                            }

                            $no=0;
                            $data = mysqli_query($koneksi,"SELECT tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran AND keterangan_pm = 'Lulus' ORDER BY hasil_profile_matching DESC");
                            while($row = mysqli_fetch_array($data)){ 
                            $no++;
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nisn'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['hasil_profile_matching'] ?></td>
                                    <td><?php echo $no; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                            <thead>
                                <tr>
                                  <th>No</th>
                                  <th>NISN</th>
                                  <th>Nama Siswa</th>
                                  <th>Nilai Promethee</th>
                                  <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            //ambil id tahun ajaran aktif
                            $data = mysqli_query($koneksi,"SELECT * FROM tb_tahun_ajaran WHERE status = 1");
                            while($row = mysqli_fetch_array($data)){
                                $id_tahun_ajaran = $row['id'];
                            }

                            $no=0;
                            $data = mysqli_query($koneksi,"SELECT tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran  AND keterangan_pr = 'Lulus' ORDER BY hasil_promethee DESC");
                            while($row = mysqli_fetch_array($data)){ 
                            $no++;
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nisn'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['hasil_promethee'] ?></td>
                                    <td><?php echo $no; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
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