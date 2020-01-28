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
            $hal = "admin";
            include('templates/menu.php');
        ?>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
             
             <div class="row">
                <div class="col-md-12">
                  <?php
                  if($_SESSION['level'] == 1){
                    ?>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <b>DATA ADMIN</b>
                        </div>
                        <div class="panel-body">
                            <a href="tambah_admin.php"><button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button></a>
                            <div style="height: 10px"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Username</th>
                                          <th>Password</th>
                                          <th>Nama</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_admin order by id ASC");
                                    while($row = mysqli_fetch_array($data)){ 
                                    $no++;
                                    $status = $row['status'];
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['password'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td>
                                              <?php
                                                if($row['status'] == 1){
                                                    ?> <span class="label label-primary">Super Admin</span> <?php
                                                }else{
                                                    ?> <span class="label label-success">Admin</span> <?php
                                                }
                                              ?>
                                            </td>
                                            <td>
                                              <?php
                                              if($status != 1){
                                                ?> 
                                                <a href="edit_admin.php?id=<?php echo $row['id'] ?>" title="Edit"><button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> </button></a>
                                                <a href="proses/hapus_admin.php?id=<?php echo $row['id'] ?>" title="Hapus" class="hapus"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></a>
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
                    <?php
                  }else{
                    ?>
                    <!-- Advanced Tables 2 -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <b>DATA ADMIN</b>
                        </div>
                        <div class="panel-body">
                            <div style="height: 10px"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Username</th>
                                          <th>Nama</th>
                                          <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    $data = mysqli_query($koneksi,"SELECT * FROM tb_admin order by id ASC");
                                    while($row = mysqli_fetch_array($data)){ 
                                    $no++;
                                    $status = $row['status'];
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td>
                                              <?php
                                                if($row['status'] == 1){
                                                    ?> <span class="label label-primary">Super Admin</span> <?php
                                                }else{
                                                    ?> <span class="label label-success">Admin</span> <?php
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
                    <!--End Advanced Tables 2-->
                    <?php
                  }
                  ?>
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
