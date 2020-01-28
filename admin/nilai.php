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
            $hal = "nilai";
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
                             <b>DATA NILAI SISWA TAHUN AJARAN <?php echo"$tahun_ajaran" ?></b>
                        </div>
                        <div class="panel-body">
                            <a href="import_nilai.php"><button class="btn btn-success btn-sm"><i class="fa fa-database"></i> Import</button></a>
                            <div style="height: 10px"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          <th rowspan="2">No</th>
                                          <th rowspan="2">ID Siswa</th>
                                          <th rowspan="2">NISN</th>
                                          <th rowspan="2">Nama Siswa</th>
                                          <th colspan="7" style="text-align: center;">Nilai Hasil Tes Seleksi</th>
                                          <th rowspan="2" style="text-align: center;" width="40">Aksi</th>
                                        </tr>
                                        <tr style="text-align: center; font-weight: bold;">
                                          <td>Tugas</td>
                                          <td>UTS</td>
                                          <td>UAS</td>
                                          <td>BTQ</td>
                                          <td>Bilingual</td>
                                          <td>Kepribadian</td>
                                          <td>Ahlaq</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    $data = mysqli_query($koneksi,"SELECT tb_siswa.`id` as id_siswa, tb_siswa.`nisn`, tb_siswa.`nama`, tb_nilai.* FROM tb_siswa JOIN tb_nilai ON tb_siswa.`id` = tb_nilai.`id_siswa` WHERE id_tahun_ajaran = $id_tahun_ajaran ORDER BY nama ASC ");
                                    while($row = mysqli_fetch_array($data)){ 
                                    $status = $row['status'];
                                    $no++;
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['id_siswa'] ?></td>
                                            <td><?php echo $row['nisn'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td><?php echo $row['tugas'] ?></td>
                                            <td><?php echo $row['uts'] ?></td>
                                            <td><?php echo $row['uas'] ?></td>
                                            <td><?php echo $row['btq'] ?></td>
                                            <td><?php echo $row['bilingual'] ?></td>
                                            <td><?php echo $row['kepribadian'] ?></td>
                                            <td><?php echo $row['ahlaq'] ?></td>
                                            <td>
                                                <?php
                                                if($status == 0){
                                                  ?>
                                                  <a href="tambah_nilai.php?id=<?php echo $row['id'] ?>" title="Input Nilai"><button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Input Nilai</button></a>
                                                  <?php
                                                }else{
                                                  ?>
                                                  <a href="edit_nilai.php?id=<?php echo $row['id'] ?>" title="Edit"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit Nilai</button></a>
                                                  <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
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
