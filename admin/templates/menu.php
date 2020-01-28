<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">

                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            
                            <li><a href="beranda.php" class="<?php if($hal == 'beranda'){ echo"menu-top-active"; } ?>"><i class="fa fa-home" ></i> BERANDA</a></li>
                           
                            <li><a href="siswa.php" class="<?php if($hal == 'siswa'){ echo"menu-top-active"; } ?>"><i class="fa fa-users"></i> SISWA</a></li>
                            <li><a href="nilai.php" class="<?php if($hal == 'nilai'){ echo"menu-top-active"; } ?>"><i class="fa fa-gears"></i> NILAI</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle <?php if($hal == 'metode'){ echo"menu-top-active"; } ?>" id="ddlmenuItem" data-toggle="dropdown"><i class="fa fa-gear"></i> METODE <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="profile_matching.php">PROFILE MATCHING</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="promethee.php">PROMETHEE</a></li>
                                </ul>
                            </li>
                            <li><a href="kelas_unggulan.php" class="<?php if($hal == 'kelas_unggulan'){ echo"menu-top-active"; } ?>"><i class="fa fa-thumbs-up"></i> KELAS UNGGULAN</a></li>
                            <li><a href="artikel.php" class="<?php if($hal == 'artikel'){ echo"menu-top-active"; } ?>"><i class="fa fa-file-text"></i> ARTIKEL</a></li>
                            <li><a href="pesan.php" class="<?php if($hal == 'pesan'){ echo"menu-top-active"; } ?>"><i class="fa fa-envelope"></i> PESAN</a></li>
                            <li><a href="admin.php" class="<?php if($hal == 'admin'){ echo"menu-top-active"; } ?>"><i class="fa fa-user"></i> ADMIN</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>