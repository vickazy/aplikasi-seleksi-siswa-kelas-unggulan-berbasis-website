<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="beranda.php">
            <div style="height: 8px"></div>
            <img src="../assets_user/img/New folder/logo.png" />
        </a>

    </div>

    <div class="right-div">
        <div class="btn-group">
            <span style="color: white; font-size: 15px; text-transform: uppercase;"><?php echo $_SESSION['nama'] ?>&nbsp;</span>
        </div>
        <div class="btn-group">
          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-windows"></i></button>
          <ul class="dropdown-menu">
            <li><a href="../logout.php"><i class="fa fa-power-off"></i> &nbsp;Keluar</a></li>
            <li><a href="ubah_username.php?id=<?php echo $_SESSION['id'] ?>"><i class="fa fa-user"></i> &nbsp;Ubah Akun</a></li>
            <li><a href="ubah_password.php?id=<?php echo $_SESSION['id'] ?>"><i class="fa fa-key"></i> Ubah Password</a></li>
          </ul>
        </div>
    </div>
    
</div>