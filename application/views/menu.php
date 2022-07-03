<nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="<?php echo base_url() ?>images/logo mekar.png" alt="Logo" width="50"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url() ?>images/logo mekar.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url() ?>admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/profil"> <i class="menu-icon fa fa-user"></i>Profil </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/artikel"> <i class="menu-icon fa fa-tasks"></i>Artikel </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/galeri"> <i class="menu-icon fa fa-id-card-o"></i>Galeri </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/kegiatan"> <i class="menu-icon fa fa-bar-chart"></i>Kegiatan </a>
                    </li> 
                    <li>
                        <a href="<?php echo base_url() ?>admin/pengurus"> <i class="menu-icon fa fa-users"></i>Data Pengurus </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Data Mahasiswa</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() ?>admin/mahasiswa_2018">Angkatan 2018</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() ?>admin/mahasiswa_2019">Angkatan 2019</a></li>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url() ?>admin/mahasiswa_2020">Angkatan 2020</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>login/logout"> <i class="menu-icon fa fa-share"></i>Logout </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>