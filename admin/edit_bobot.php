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
            $hal = "metode";
            include('templates/menu.php');
        ?>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
             
             <div class="row">
                <div class="col-md-6">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                              <b>METODE PROFILE MATCHING</b>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#bobot_gap" data-toggle="tab">Bobot Nilai GAP</a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade active in" id="bobot_gap">
                                    <h4>Edit Bobot Nilai GAP</h4>
                                    <a href="profile_matching.php"><button class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Kembali</button></a>
                                    <div style="height: 10px"></div>
                                  <?php
                                    $id   = $_GET['id']; 
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_bobot_gap WHERE id = $id");
                                    while($row = mysqli_fetch_array($data)){ 
                                    ?>  
                                    <form role="form" action="proses/update_bobot.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <div class="form-group">
                                            <label>Selisih GAP</label>
                                            <input class="form-control" name="selisih" value="<?php echo $row['selisih'] ?>" type="text" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Bobot Nilai</label>
                                            <input class="form-control" name="bobot" value="<?php echo $row['bobot'] ?>" type="text" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input class="form-control" name="keterangan" value="<?php echo $row['keterangan'] ?>" type="text" required />
                                        </div>

                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                        </div>
                                    </form>
                                    <?php
                                    }
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>

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
          if($_GET['pesan'] == "sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Ditambahkan',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "edit_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Diubah',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "hapus_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: 'Data Berhasil Dihapus',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "import_gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Import Gagal',
                    text: 'Ada Data Yang Kosong, Cek Kembali Isi Dokumennya',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "import_sukses"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Import Berhasil',
                    text: 'Data Berhasil Diimportkan',
                  })
              </script>
          <?php
          }
      }
    ?>

    <script>
        $(document).ready(function(){
             $('.hapus').on('click',function(){
                var getLink = $(this).attr('href');
                    swal({
                            title: 'Hapus',
                            text: 'Anda Yakin Ingin Menghapus?',
                            html: true,
                            confirmButtonColor: '#d9534f',
                            showCancelButton: true,
                            cancelButtonText: "Batal",
                            },function(){
                            window.location.href = getLink
                        });
                    return false;
            });
        });
    </script>
</body>
</html>
