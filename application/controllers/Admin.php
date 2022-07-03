<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin"));
		}
		$this->load->model('admin_model');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
 
	function index(){
		$this->load->view('admin/dashboard');
	}

	function galeri(){
		$data = array('data_galeri' => $this->admin_model->ambil_galeri()->result_array(),);
		$this->load->view('admin/galeri', $data);
	}

	function tambah_galeri(){
		$this->load->view('admin/tambah_galeri');
	}

	function simpan_galeri(){
        $id_galeri  = '';
        $deskripsi     = $this->input->post('deskripsi');

        //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'galeri';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('berkas');
        $data_image = $this->upload->data('file_name');
        $location   = 'galeri/';
        $pict       = $location.$data_image;


        $data=array(
            'id_galeri'=>$id_galeri,
            'berkas'=> $pict,
            'deskripsi'=>$deskripsi
            );
        //simpan data 
        $this->admin_model->simpan('galeri', $data);

        $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
        redirect('admin/galeri');
    }

    function edit_galeri($kode = 0){
	    $row = $this->admin_model->edit_galeri("where galeri.`id_galeri`  = '$kode'")->result_array();

	    $data = array(
	      'id_galeri' => $row[0]['id_galeri'],
	      'berkas' => $row[0]['berkas'],
	      'deskripsi' => $row[0]['deskripsi'],
	    );
	    $this->load->view('admin/edit_galeri', $data);
  	}

  	function update_galeri(){

  		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'galeri';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('berkas');
        $data_image = $this->upload->data('file_name');
        $location   = 'galeri/';
        $pict       = $location.$data_image;

	    $data = array(
	      'id_galeri' => $this->input->post('id_galeri'),
	      'berkas' =>$pict,
	      'deskripsi' => $this->input->post('deskripsi'),
	      );

	    $res = $this->admin_model->update_galeri($data);
	    if($res=1){
	      header('location:'.base_url().'admin/galeri');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function hapus_galeri($kode = 0){
	    $result = $this->admin_model->Hapus('galeri',array('id_galeri' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/galeri');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function kegiatan(){
		$data = array('data_kegiatan' => $this->admin_model->ambil_kegiatan()->result_array(),);
		$this->load->view('admin/kegiatan', $data);
	}

	function tambah_kegiatan(){
		$this->load->view('admin/tambah_kegiatan');
	}

	function simpan_kegiatan(){
	    $id_kegiatan	= '';
		$waktu= $_POST['waktu'];
		$jam= $_POST['jam'];
	    $nama_kegiatan= $_POST['nama_kegiatan']; 
	    $deskripsi= $_POST['deskripsi'];
		$tempat= $_POST['tempat'];

	    $data = array(  
	      'id_kegiatan'=> $id_kegiatan,
		  'waktu'=> $waktu,
		  'jam'=> $jam,
	      'nama_kegiatan'=> $nama_kegiatan,
	      'deskripsi'=> $deskripsi,
		  'tempat'=> $tempat,
	      );

	    $this->admin_model->simpan('kegiatan', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('admin/kegiatan');
  	}

  	function edit_kegiatan($kode = 0){
	    $row = $this->admin_model->edit_kegiatan("where kegiatan.`id_kegiatan`  = '$kode'")->result_array();

	    $data = array(
		  'id_kegiatan' => $row[0]['id_kegiatan'],
		  'waktu' => $row[0]['waktu'],
		  'jam' => $row[0]['jam'],
		  'nama_kegiatan' => $row[0]['nama_kegiatan'],
		  'deskripsi' => $row[0]['deskripsi'],
		  'tempat' => $row[0]['tempat'],
	    );
	    $this->load->view('admin/edit_kegiatan', $data);
  	}

  	function update_kegiatan(){
	    $data = array(
	      'id_kegiatan' => $this->input->post('id_kegiatan'),
		  'waktu' => $this->input->post('waktu'),
		  'jam' => $this->input->post('jam'),
	      'nama_kegiatan' => $this->input->post('nama_kegiatan'),
	      'deskripsi' => $this->input->post('deskripsi'),
		  'tempat' => $this->input->post('tempat'),
	      );

	    $res = $this->admin_model->update_kegiatan($data);
	    if($res=1){
	      header('location:'.base_url().'admin/kegiatan');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function hapus_kegiatan($kode = 0){
	    $result = $this->admin_model->Hapus('kegiatan',array('id_kegiatan' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/kegiatan');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function pengurus(){
		$data = array('data_pengurus' => $this->admin_model->ambil_pengurus()->result_array(),);
		$this->load->view('admin/pengurus', $data);
	}

	function tambah_pengurus(){
		$data = array('data_pengurus' => $this->admin_model->ambil_pengurus()->result_array(),);
		$this->load->view('admin/tambah_pengurus', $data);
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

	    $this->admin_model->simpan('pengurus', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('admin/pengurus');
  	}

  	function hapus_pengurus($kode = 0){
	    $result = $this->admin_model->Hapus('pengurus',array('id_pengurus' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/pengurus');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_pengurus($kode = 0){
	    $row = $this->admin_model->edit_pengurus("where pengurus.`id_pengurus`  = '$kode'")->result_array();

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

	    $this->load->view('admin/edit_pengurus', $data);
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

	    $res = $this->admin_model->update_pengurus($data);
	    if($res=1){
	      header('location:'.base_url().'admin/pengurus');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function mahasiswa_2018(){
		$data = array('mahasiswa_2018' => $this->admin_model->ambil_mahasiswa_2018()->result_array(),);
		$this->load->view('admin/mahasiswa_2018', $data);
	}

	function tambah_mahasiswa_2018(){
		$this->load->view('admin/tambah_mahasiswa_2018');
	}

	function simpan_mahasiswa(){
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

	    $this->admin_model->simpan('mahasiswa', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    if($angkatan == 'Kelas 2018'){
	   		 redirect('admin/mahasiswa_2018');
	    }elseif($kelas == 'Kelas 2019'){
	   		 redirect('admin/mahasiswa_2019');
	    }else{
	    	 redirect('admin/mahasiswa_2020');
	    }
  	}

  	function hapus_mahsiswa_2018($kode = 0){
	    $result = $this->admin_model->Hapus('mahasiswa',array('id_mahasiswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/mahasiswa_2018');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_mahasiswa_2018($kode = 0){
	    $row = $this->admin_model->edit_mahasiswa("where mahasiswa.`id_mahasiswa`  = '$kode'")->result_array();

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

	    $this->load->view('admin/edit_mahasiswa_2018', $data);
  	}

  	function update_mahasiswa_2018(){
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

	    $res = $this->admin_model->update_mahasiswa($data);
	    if($res=1){
	      header('location:'.base_url().'admin/mahasiswa_2018');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function mahasiswa_2019(){
		$data = array('mahasiswa_2019' => $this->admin_model->ambil_mahasiswa_2019()->result_array(),);
		$this->load->view('admin/mahasiswa_2019', $data);
	}

	function tambah_mahasiswa_2019(){
		$this->load->view('admin/tambah_mahasiswa_2019');
	}

  	function hapus_mahasiswa_2019($kode = 0){
	    $result = $this->admin_model->Hapus('mahasiswa',array('id_mahasiswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/mahasiswa_2019');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_mahasiswa_2019($kode = 0){
	    $row = $this->admin_model->edit_mahasiswa("where mahasiswa.`id_mahasiswa`  = '$kode'")->result_array();

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

	    $this->load->view('admin/edit_mahasiswa_2019', $data);
  	}

  	function update_mahasiswa_2019(){
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

	    $res = $this->admin_model->update_mahasiswa($data);
	    if($res=1){
	      header('location:'.base_url().'admin/mahasiswa_2019');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function mahasiswa_2020(){
		$data = array('mahasiswa_2020' => $this->admin_model->ambil_mahasiswa_2020()->result_array(),);
		$this->load->view('admin/mahasiswa_2020', $data);
	}

	function tambah_mahasiswa_2020(){
		$this->load->view('admin/tambah_mahasiswa_2020');
	}

  	function hapus_mahasiswa_2020($kode = 0){
	    $result = $this->admin_model->Hapus('mahasiswa',array('id_mahasiswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/mahasiswa_2020');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_mahasiswa_2020($kode = 0){
	    $row = $this->admin_model->edit_mahasiswa("where mahasiswa.`id_mahasiswa`  = '$kode'")->result_array();

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

	    $this->load->view('admin/edit_mahasiswa_2020', $data);
  	}

  	function update_mahasiswa_2020(){
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

	    $res = $this->admin_model->update_mahasiswa($data);
	    if($res=1){
	      header('location:'.base_url().'admin/mahasiswa_2020');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function artikel(){
		$data = array('data_artikel' => $this->admin_model->ambil_artikel()->result_array(),);
		$this->load->view('admin/artikel', $data);
	}

	function tambah_artikel(){
		$this->load->view('admin/tambah_artikel');
	}

	function detail_artikel($kode = 0){
	    $row = $this->admin_model->edit_artikel("where artikel.`id_artikel`  = '$kode'")->result_array();

	    $data = array(
	      'id_artikel' => $row[0]['id_artikel'],
	      'judul' => $row[0]['judul'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	      'penulis' => $row[0]['penulis'],
	      'tanggal' => $row[0]['tanggal'],
	    );

	    $this->load->view('admin/detail_artikel', $data);
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
        $this->admin_model->simpan('artikel', $data);

        $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
        redirect('admin/artikel');
    }

    function hapus_artikel($kode = 0){
	    $result = $this->admin_model->Hapus('artikel',array('id_artikel' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/artikel');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_artikel($kode = 0){
	    $row = $this->admin_model->edit_artikel("where artikel.`id_artikel`  = '$kode'")->result_array();

	    $data = array(
	      'id_artikel' => $row[0]['id_artikel'],
	      'judul' => $row[0]['judul'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	      'penulis' => $row[0]['penulis'],
	      'tanggal' => $row[0]['tanggal'],
	    );

	    $this->load->view('admin/edit_artikel', $data);
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

	    $res = $this->admin_model->update_artikel($data);
	    if($res=1){
	      header('location:'.base_url().'admin/artikel');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function profil(){
		$data = array('data_profil' => $this->admin_model->ambil_profil()->result_array(),);
		$this->load->view('admin/profil', $data);
	}

	function tambah_profil(){
		$this->load->view('admin/tambah_profil');
	}

	function detail_profil($kode = 0){
	    $row = $this->admin_model->edit_profil("where profil.`id_profil`  = '$kode'")->result_array();

	    $data = array(
	      'id_profil' => $row[0]['id_profil'],
	      'nama' => $row[0]['nama'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	    );

	    $this->load->view('admin/detail_profil', $data);
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
        $this->admin_model->simpan('profil', $data);

        $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
        redirect('admin/profil');
    }

    function hapus_profil($kode = 0){
	    $result = $this->admin_model->Hapus('profil',array('id_profil' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/profil');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_profil($kode = 0){
	    $row = $this->admin_model->edit_profil("where profil.`id_profil`  = '$kode'")->result_array();

	    $data = array(
	      'id_profil' => $row[0]['id_profil'],
	      'nama' => $row[0]['nama'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	    );

	    $this->load->view('admin/edit_profil', $data);
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

	    $res = $this->admin_model->update_profil($data);
	    if($res=1){
	      header('location:'.base_url().'admin/profil');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}
}