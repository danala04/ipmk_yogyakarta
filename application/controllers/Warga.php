<?php 
 
class Warga extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("warga"));
		}
		$this->load->model('warga_model');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
 
	function index(){
		$this->load->view('warga/index');
	}

	function ekstrakulikuler(){
		$data = array('data_ekstrakulikuler' => $this->warga_model->ambil_ekstrakulikuler()->result_array(),);
		$this->load->view('warga/ekstrakulikuler', $data);
	}

	function tambah_ekstrakulikuler(){
		$this->load->view('warga/tambah_ekstrakulikuler');
	}

	function simpan_ekstrakulikuler(){
	    $id_ekstrakulikuler	= '';
	    $nama= $_POST['nama']; 
	    $deskripsi= $_POST['deskripsi'];
		$waktu= $_POST['waktu'];
		$tempat= $_POST['tempat'];

	    $data = array(  
	      'id'=> $id_ekstrakulikuler,
	      'nama'=> $nama,
	      'deskripsi'=> $deskripsi,
		  'waktu'=> $waktu,
		  'tempat'=> $tempat,
	      );

	    $this->warga_model->simpan('ekstrakulikuler', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('warga/ekstrakulikuler');
  	}

  	function edit_ekstrakulikuler($kode = 0){
	    $row = $this->warga_model->edit_ekstrakulikuler("where ekstrakulikuler.`id`  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	      'nama' => $row[0]['nama'],
	      'deskripsi' => $row[0]['deskripsi'],
		  'waktu' => $row[0]['waktu'],
		  'tempat' => $row[0]['tempat'],
	    );
	    $this->load->view('warga/edit_ekstrakulikuler', $data);
  	}

  	function update_ekstrakulikuler(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'nama' => $this->input->post('nama'),
	      'deskripsi' => $this->input->post('deskripsi'),
		  'waktu' => $this->input->post('waktu'),
		  'tempat' => $this->input->post('tempat'),
	      );

	    $res = $this->warga_model->update_ekstrakulikuler($data);
	    if($res=1){
	      header('location:'.base_url().'admin/ekstrakulikuler');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function hapus_ekstrakulikuler($kode = 0){
	    $result = $this->warga_model->Hapus('ekstrakulikuler',array('id' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'warga/ekstrakulikuler');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}


	function pengurus(){
		$data = array('data_pengurus' => $this->warga_model->ambil_pengurus()->result_array(),);
		$this->load->view('warga/pengurus', $data);
	}

	function tambah_pengurus(){
		$data = array('data_pengurus' => $this->warga_model->ambil_pengurus()->result_array(),);
		$this->load->view('warga/tambah_pengurus', $data);
	}

	function simpan_pengurus(){
		$id_pengurus= $_POST['']; 
	    $nama= $_POST['nama']; 
		$ttl= $_POST['ttl']; 
	    $jenis_kelamin= $_POST['jenis_kelamin']; 
	    $alamat_kuningan= $_POST['alamat_kuningan']; 
	    $no_hp= $_POST['no_hp'];
		$jurusan= $_POST['jurusan']; 
		$universitas= $_POST['universitas']; 
		$angkatan= $_POST['angkatan'];  
		$jabatan= $_POST['jabatan'];  

	    $data = array(  
		  'id_pengurus'=> $id_pengurus,
	      'nama'=> $nama,
		  'ttl'=> $ttl,
	      'jenis_kelamin'=> $jenis_kelamin,
	      'alamat_kuningan'=> $alamat_kuningan,
	      'no_hp'=> $no_hp,
		  'jurusan'=> $jurusan,
		  'universitas'=> $universitas,
	      'angkatan'=> $angkatan,
		  'jabatan'=> $jabatan,
	      );

	    $this->warga_model->simpan('pengurus', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('warga/pengurus');
  	}

  	function hapus_pengurus($kode = 0){
	    $result = $this->warga_model->Hapus('pengurus',array('id_pengurus' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'warga/pengurus');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_pengurus($kode = 0){
	    $row = $this->warga_model->edit_pengurus("where pengurus.`id_pengurus`  = '$kode'")->result_array();

	    $data = array(
		  'id_pengurus' => $row[0]['id_pengurus'],
	      'nama' => $row[0]['nama'],
		  'ttl' => $row[0]['ttl'],
	      'jenis_kelamin' => $row[0]['jenis_kelamin'],
	      'alamat_kuningan' => $row[0]['alamat_kuningan'],
	      'no_hp' => $row[0]['no_hp'],
	      'jurusan' => $row[0]['jurusan'],
		  'universitas' => $row[0]['universitas'],
		  'angkatan' => $row[0]['angkatan'],
		  'jabatan' => $row[0]['jabatan'],
	    );

	    $this->load->view('warga/edit_pengurus', $data);
  	}

  	function update_pengurus(){
	    $data = array(
		  'id_pengurus' => $this->input->post('id_pengurus'),
	      'nama' => $this->input->post('nama'),
		  'ttl' => $this->input->post('ttl'),
	      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	      'alamat_kuningan' => $this->input->post('alamat_kuningan'),
	      'no_hp' => $this->input->post('no_hp'),
		  'jurusan' => $this->input->post('jurusan'),
		  'universitas' => $this->input->post('universitas'),
	      'angkatan' => $this->input->post('angkatan'),
		  'jabatan' => $this->input->post('jabatan'),
	      );

	    $res = $this->warga_model->update_pengurus($data);
	    if($res=1){
	      header('location:'.base_url().'warga/pengurus');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function siswa_2018(){
		$data = array('siswa_2018' => $this->warga_model->ambil_siswa_2018()->result_array(),);
		$this->load->view('warga/siswa_2018', $data);
	}

	function tambah_siswa_2018(){
		$this->load->view('warga/tambah_siswa_2018');
	}

	function simpan_siswa(){
	    $id_mahasiswa= $_POST['id_mahasiswa']; 
	    $nama= $_POST['nama']; 
		$ttl= $_POST['ttl']; 
	    $jenis_kelamin= $_POST['jenis_kelamin']; 
	    $alamat_kuningan= $_POST['alamat_kuningan'];
	    $no_hp= $_POST['no_hp']; 
		$jurusan= $_POST['jurusan'];
		$universitas= $_POST['universitas'];
		$angkatan= $_POST['angkatan'];

	    if($angkatan == 'Kelas 2018'){
	    	$angkatannya = '2018';
	    }elseif($angkatan == 'Kelas 2019'){
	    	$angkatannya = '2019';
	    }else{
	    	$angkatannya = '2020';	
	    }

	    $data = array(  
	      'id_mahasiswa'=> $id_mahasiswa,
	      'nama'=> $nama,
		  'ttl'=> $ttl,
	      'jenis_kelamin'=> $jenis_kelamin,
	      'alamat_kuningan'=> $alamat_kuningan,
	      'no_hp'=> $no_hp,
		  'jurusan'=> $jurusan,
		  'universitas'=> $universitas,
		  'angkatan'=> $angkatan,
	      );

	    $this->warga_model->simpan('siswa', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    if($angkatan == 'Kelas 2018'){
	   		 redirect('warga/siswa_2018');
	    }elseif($kelas == 'Kelas 2019'){
	   		 redirect('warga/siswa_2019');
	    }else{
	    	 redirect('warga/siswa_2020');
	    }
  	}

  	function hapus_siswa_2018($kode = 0){
	    $result = $this->warga_model->Hapus('siswa',array('id_mahasiswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'warga/siswa_2018');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_siswa_2018($kode = 0){
	    $row = $this->warga_model->edit_siswa("where siswa.`id_mahasiswa`  = '$kode'")->result_array();

	    $data = array(
		  'id_mahasiswa' => $row[0]['id_mahasiswa'],
	      'nama' => $row[0]['nama'],
		  'ttl' => $row[0]['ttl'],
	      'jenis_kelamin' => $row[0]['jenis_kelamin'],
	      'alamat_kuningan' => $row[0]['alamat_kuningan'],
		  'no_hp' => $row[0]['no_hp'],
		  'jurusan' => $row[0]['jurusan'],
		  'universitas' => $row[0]['universitas'],
		  'angkatan' => $row[0]['angkatan'],
	    );

	    $this->load->view('warga/edit_siswa_2018', $data);
  	}

  	function update_siswa_2018(){
	    $data = array(
		  'id_mahasiswa' => $this->input->post('id_mahasiswa'),
	      'nama' => $this->input->post('nama'),
		  'ttl' => $this->input->post('ttl'),
	      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	      'alamat_kuningan' => $this->input->post('alamat_kuningan'),
		  'no_hp' => $this->input->post('no_hp'),
		  'jurusan' => $this->input->post('jurusan'),
		  'universitas' => $this->input->post('universitas'),
		  'angkatan' => $this->input->post('angkatan'),
	      );

	    $res = $this->warga_model->update_siswa($data);
	    if($res=1){
	      header('location:'.base_url().'warga/siswa_2018');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function siswa_2019(){
		$data = array('siswa_2019' => $this->warga_model->ambil_siswa_2019()->result_array(),);
		$this->load->view('warga/siswa_2019', $data);
	}

	function tambah_siswa_2019(){
		$this->load->view('warga/tambah_siswa_2019');
	}

  	function hapus_siswa_2019($kode = 0){
	    $result = $this->warga_model->Hapus('siswa',array('id_mahasiswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'warga/siswa_2019');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_siswa_2019($kode = 0){
	    $row = $this->warga_model->edit_siswa("where siswa.`id_mahasiswa`  = '$kode'")->result_array();

	    $data = array(
		  'id_mahasiswa' => $row[0]['id_mahasiswa'],
	      'nama' => $row[0]['nama'],
		  'ttl' => $row[0]['ttl'],
	      'jenis_kelamin' => $row[0]['jenis_kelamin'],
	      'alamat_kuningan' => $row[0]['alamat_kuningan'],
		  'no_hp' => $row[0]['no_hp'],
		  'jurusan' => $row[0]['jurusan'],
		  'universitas' => $row[0]['universitas'],
		  'angkatan' => $row[0]['angkatan'],
	    );

	    $this->load->view('warga/edit_siswa_2019', $data);
  	}

  	function update_siswa_2019(){
	    $data = array(
		  'id_mahasiswa' => $this->input->post('id_mahasiswa'),
	      'nama' => $this->input->post('nama'),
		  'ttl' => $this->input->post('ttl'),
	      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	      'alamat_kuningan' => $this->input->post('alamat_kuningan'),
		  'no_hp' => $this->input->post('no_hp'),
		  'jurusan' => $this->input->post('jurusan'),
		  'universitas' => $this->input->post('universitas'),
		  'angkatan' => $this->input->post('angkatan'),
	      );

	    $res = $this->warga_model->update_siswa($data);
	    if($res=1){
	      header('location:'.base_url().'warga/siswa_2019');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function siswa_2020(){
		$data = array('siswa_2020' => $this->warga_model->ambil_siswa_2020()->result_array(),);
		$this->load->view('warga/siswa_2020', $data);
	}

	function tambah_siswa_2020(){
		$this->load->view('warga/tambah_siswa_2020');
	}

  	function hapus_siswa_2020($kode = 0){
	    $result = $this->warga_model->Hapus('siswa',array('id_mahasiswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'warga/siswa_2020');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_siswa_2020($kode = 0){
	    $row = $this->warga_model->edit_siswa("where siswa.`id_mahasiswa`  = '$kode'")->result_array();

	    $data = array(
		  'id_mahasiswa' => $row[0]['id_mahasiswa'],
	      'nama' => $row[0]['nama'],
		  'ttl' => $row[0]['ttl'],
	      'jenis_kelamin' => $row[0]['jenis_kelamin'],
	      'alamat_kuningan' => $row[0]['alamat_kuningan'],
		  'no_hp' => $row[0]['no_hp'],
		  'jurusan' => $row[0]['jurusan'],
		  'universitas' => $row[0]['universitas'],
		  'angkatan' => $row[0]['angkatan'],
	    );

	    $this->load->view('warga/edit_siswa_2020', $data);
  	}

  	function update_siswa_2020(){
	    $data = array(
		  'id_mahasiswa' => $this->input->post('id_mahasiswa'),
	      'nama' => $this->input->post('nama'),
		  'ttl' => $this->input->post('ttl'),
	      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	      'alamat_kuningan' => $this->input->post('alamat_kuningan'),
		  'no_hp' => $this->input->post('no_hp'),
		  'jurusan' => $this->input->post('jurusan'),
		  'universitas' => $this->input->post('universitas'),
		  'angkatan' => $this->input->post('angkatan'),
	      );

	    $res = $this->warga_model->update_siswa($data);
	    if($res=1){
	      header('location:'.base_url().'warga/siswa_2020');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function artikel(){
		$data = array('data_artikel' => $this->warga_model->ambil_artikel()->result_array(),);
		$this->load->view('warga/artikel', $data);
	}

	function tambah_artikel(){
		$this->load->view('warga/tambah_artikel');
	}

	function detail_artikel($kode = 0){
	    $row = $this->warga_model->edit_artikel("where artikel.`id_artikel`  = '$kode'")->result_array();

	    $data = array(
	      'id_artikel' => $row[0]['id_artikel'],
	      'judul' => $row[0]['judul'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	      'penulis' => $row[0]['penulis'],
	      'tanggal' => $row[0]['tanggal'],
	    );

	    $this->load->view('warga/detail_artikel', $data);
  	}

  	function simpan_artikel(){
        $id_artikel  = '';
        $judul     = $this->input->post('judul');
        $isi     = $this->input->post('isi');
        $penulis     = $this->input->post('penulis');
		$tanggal =  date('Y-m-d');

        //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'artikel';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location   = 'artikel/';
        $pict       = $location.$data_image;


        $data=array(
            'id_artikel'=>$id_artikel,
            'judul'=>$judul,
            'isi'=>$isi,
            'gambar'=> $pict,
            'penulis'=>$penulis,
            'tanggal'=>$tanggal
            );
        //simpan data 
        $this->warga_model->simpan('artikel', $data);

        $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
        redirect('warga/artikel');
    }

    function hapus_artikel($kode = 0){
	    $result = $this->warga_model->Hapus('artikel',array('id_artikel' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'warga/artikel');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_artikel($kode = 0){
	    $row = $this->warga_model->edit_artikel("where artikel.`id_artikel`  = '$kode'")->result_array();

	    $data = array(
	      'id_artikel' => $row[0]['id_artikel'],
	      'judul' => $row[0]['judul'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	      'penulis' => $row[0]['penulis'],
	      'tanggal' => $row[0]['tanggal'],
	    );

	    $this->load->view('warga/edit_artikel', $data);
  	}

  	function update_artikel(){
  		$tanggal =  date('Y-m-d');

  		 //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'artikel';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location   = 'artikel/';
        $pict       = $location.$data_image;

	    $data = array(
	      'id_artikel' => $this->input->post('id_artikel'),
	      'judul' => $this->input->post('judul'),
	      'isi' => $this->input->post('isi'),
	      'gambar' => $pict,
	      'penulis' => $this->input->post('penulis'),
	      'tanggal' => $tanggal,
	      );

	    $res = $this->warga_model->update_artikel($data);
	    if($res=1){
	      header('location:'.base_url().'warga/artikel');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function profil(){
		$data = array('data_profil' => $this->warga_model->ambil_profil()->result_array(),);
		$this->load->view('warga/profil', $data);
	}

	function tambah_profil(){
		$this->load->view('warga/tambah_profil');
	}

	function detail_profil($kode = 0){
	    $row = $this->warga_model->edit_profil("where profil.`id_profil`  = '$kode'")->result_array();

	    $data = array(
	      'id_profil' => $row[0]['id_profil'],
	      'nama' => $row[0]['nama'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	    );

	    $this->load->view('warga/detail_profil', $data);
  	}

  	function simpan_profil(){
        $id_profil  = '';
        $judul     = $this->input->post('judul');
        $isi     = $this->input->post('isi');

        //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'profil';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location   = 'profil/';
        $pict       = $location.$data_image;


        $data=array(
            'id_profil'=>$id_profil,
            'nama'=>$judul,
            'isi'=>$isi,
            'gambar'=> $pict
            );
        //simpan data 
        $this->warga_model->simpan('profil', $data);

        $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
        redirect('warga/profil');
    }

    function hapus_profil($kode = 0){
	    $result = $this->warga_model->Hapus('profil',array('id_profil' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'warga/profil');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_profil($kode = 0){
	    $row = $this->warga_model->edit_profil("where profil.`id_profil`  = '$kode'")->result_array();

	    $data = array(
	      'id_profil' => $row[0]['id_profil'],
	      'nama' => $row[0]['nama'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	    );

	    $this->load->view('warga/edit_profil', $data);
  	}

  	function update_profil(){
  		$tanggal =  date('Y-m-d');

  		 //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'profil';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location   = 'profil/';
        $pict       = $location.$data_image;

	    $data = array(
	      'id_profil' => $this->input->post('id_profil'),
	      'nama' => $this->input->post('judul'),
	      'isi' => $this->input->post('isi'),
	      'gambar' => $pict,
	      );

	    $res = $this->warga_model->update_profil($data);
	    if($res=1){
	      header('location:'.base_url().'warga/profil');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}
}