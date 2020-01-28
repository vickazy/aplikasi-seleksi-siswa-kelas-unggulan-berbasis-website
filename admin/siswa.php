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
            $hal = "siswa";
            include('templates/menu.php');
        ?>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
             
             <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <b>DATA SISWA TAHUN AJARAN <?php echo"$tahun_ajaran" ?></b>
                        </div>
                        <div class="panel-body">
                            <a href="tambah_siswa.php"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></a>
                            <a href="import_siswa.php"><button class="btn btn-success btn-sm"><i class="fa fa-database"></i> Import</button></a>
                            <div style="height: 10px"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>ID Siswa</th>
                                          <th>NISN</th>
                                          <th>Nama Siswa</th>
                                          <th>Jenis Kelamin</th>
                                          <th>No Telepon</th>
                                          <th>Nama Ayah</th>
                                          <th>Nama Ibu</th>
                                          <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_siswa WHERE id_tahun_ajaran = $id_tahun_ajaran order by nama ASC ");
                                    while($row = mysqli_fetch_array($data)){ 
                                    $no++;
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['nisn'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td><?php echo $row['jenis_kelamin'] ?></td>
                                            <!-- <td><?php echo $row['alamat'] ?></td> -->
                                            <td><?php echo $row['no_telp'] ?></td>
                                            <td><?php echo $row['nama_ayah'] ?></td>
                                            <td><?php echo $row['nama_ibu'] ?></td>
                                            <td>
                                                <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>" title="Lihat"><i class="fa fa-eye"></i></a>

                                                <a href="edit_siswa.php?id=<?php echo $row['id'] ?>" title="Edit"><button class="btn btn-xs btn-success"><i class="fa fa-edit"></i> </button></a>
                                                <a href="proses/hapus_siswa.php?id=<?php echo $row['id'] ?>" title="Hapus" class="hapus"><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </button></a>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit Mahasiswa-->
                                        <div class="modal fade" id="myModal<?php echo $row['id']; ?>" role="dialog">
                                          <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Detail Data Siswa</h4>
                                              </div>
                                              <div class="modal-body">
                                                    <?php
                                                    $id = $row['id']; 
                                                    $query_edit = mysqli_query($koneksi,"SELECT *, tb_tahun_ajaran.`tahun_ajaran` FROM tb_siswa JOIN tb_tahun_ajaran ON tb_siswa.`id_tahun_ajaran` = tb_tahun_ajaran.`id` WHERE tb_siswa.`id` = '$id'");
                                                    //$result = mysqli_query($conn, $query);
                                                    while ($baris = mysqli_fetch_array($query_edit)) {  
                                                    ?>
                                                    
                                                    <form class="form-inline" action="/action_page.php">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <center><i class="fa fa-user fa-5x"></i></center>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="email">NISN</label>
                                                                  <input class="form-control" placeholder="<?php echo $baris['nisn'] ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="pwd">Nama Siswa:</label>
                                                                  <input class="form-control" placeholder="<?php echo $baris['nama'] ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="pwd">Jenis Kelamin:</label>
                                                                  <input class="form-control" placeholder="<?php echo $baris['jenis_kelamin'] ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="pwd">Masuk Pada Tahun Ajaran:</label>
                                                                  <input class="form-control" placeholder="<?php echo $baris['tahun_ajaran'] ?>" readonly>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label for="pwd">Nomor Telepon:</label>
                                                                  <input class="form-control" placeholder="<?php echo $row['no_telp'] ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="pwd">Nama Ayah:</label>
                                                                  <input class="form-control" placeholder="<?php echo $row['nama_ayah'] ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="pwd">Nama Ibu:</label>
                                                                  <input class="form-control" placeholder="<?php echo $row['nama_ibu'] ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="pwd">Alamat:</label>
                                                                  <textarea class="form-control" rows="5" readonly><?php echo $row['alamat'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>


                                                    <div class="modal-footer">  
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                    <?php 
                                                    }
                                                    //mysql_close($host);
                                                    ?> 
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
