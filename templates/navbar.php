<div class="container">
          <div class="navbar-header">
            <div class="btn-more js-btn-more visible-xs">
              <a href="assets_user/#"><i class="icon-dots-three-vertical "></i></a>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"> <img src="assets_user/img/New folder/logo.png"></a>
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="<?php if($hal == 'beranda'){ echo"active"; } ?>" ><a style="color: #e9e9f2;" href="index.php">BERANDA</a></li>
              <li class="<?php if($hal == 'profil'){ echo"active"; } ?>" ><a style="color: #e9e9f2" href="profil.php">PROFIL</a></li>
              <li class="<?php if($hal == 'visi_misi'){ echo"active"; } ?>" ><a style="color: #e9e9f2" href="visi_misi.php">VISI & MISI</a></li>
              <li class="<?php if($hal == 'artikel'){ echo"active"; } ?>" ><a style="color: #e9e9f2" href="artikel.php?halaman=1">ARTIKEL</a></li>
              <li class="<?php if($hal == 'hubungi_kami'){ echo"active"; } ?>" ><a style="color: #e9e9f2" href="hubungi_kami.php">HUBUNGI KAMI</a></li>
              <li><a style="color: #e9e9f2" href="login.php" target="_blank">LOGIN ADMIN</a></li>
            </ul>
          </div>
        </div>