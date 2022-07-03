<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | SMA Mekar Arum</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url() ?>images/logo mekar.png">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_admin/scss/style.css">
    <link href="<?php echo base_url() ?>assets_admin/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="<?php echo base_url() ?>https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <aside id="left-panel" class="left-panel">
        <?php
            $this->load->view('menu');
        ?>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="<?php echo base_url('login/logout'); ?>">Logout
                        </a>
                    </div>

                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-12">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-8">
                    <a href="<?php echo base_url()?>admin/mahasiswa_2019"><button class="btn btn-info">Kembali</button></a><br><br>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Edit</strong> Siswa Angkatan 2019
                      </div>
                      <div class="card-body card-block">
                        <form action="<?php echo base_url()?>admin/update_mahasiswa_2019" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="id_mahasiswa" value="<?php echo $id_mahasiswa ?>">
                            <input type="hidden" name="kelas" value="2019">

                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nama</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="nama" value="<?php echo $nama ?>" placeholder="nama" class="form-control">
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">tempat, Tgl Lahir</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="ttl" value="<?php echo $ttl ?>" placeholder="ttl" class="form-control">
                                </div>
                              </div>


                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Jenis Kelamin</label>
                                </div>
                                <div class="col-12 col-md-9">
                                   <select name="jenis_kelamin" class="form-control">
                                       <option value="Laki-laki">Laki-laki</option>
                                       <option value="Perempuan">Perempuan</option>
                                   </select>
                                </div>
                              </div>


                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Alamat Kuningan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="alamat_kuningan" value="<?php echo $alamat_kuningan ?>" placeholder="alamat_kuningan" class="form-control">
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">No. Hp</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="no_hp" value="<?php echo $no_hp ?>" placeholder="no_hp" class="form-control">
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Jurusan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="jurusan" value="<?php echo $jurusan ?>" placeholder="jurusan" class="form-control">
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Universitas</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="universitas" value="<?php echo $universitas ?>" placeholder="universitas" class="form-control">
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Angkatan</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="angkatan" value="<?php echo $angkatan ?>" placeholder="angkatan" class="form-control">
                                </div>
                              </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                              <i class="fa fa-dot-circle-o"></i> Edit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                              <i class="fa fa-ban"></i> Reset
                            </button>
                          </div>
                        </form>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <?php $this->load->view('js'); ?>
    
</body>
</html>
