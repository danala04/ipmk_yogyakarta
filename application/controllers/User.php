<?php 
 
class User extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
	}
 
	function index(){
		$cari = $this->user_model->ambil_artikel();
		if ($cari)
		{
		    $data['hasil_artikel'] = $cari;
		}
		 
		$dpthasil = $this->user_model->ambil_galeri();
		if ($dpthasil)
		{
		    $data['hasil_galeri'] = $dpthasil;
		}
		 
		$this->load->view('user/index', $data); 
	}

	function kelas_2018(){
		$data = array('data_kelas_2018' => $this->user_model->ambil_kelas_2018()->result_array(),);
		$this->load->view('user/kelas_2018', $data);
	}

	function kelas_2019(){
		$data = array('data_kelas_2019' => $this->user_model->ambil_kelas_2019()->result_array(),);
		$this->load->view('user/kelas_2019', $data);
	}

	function kelas_2020(){
		$data = array('data_kelas_2020' => $this->user_model->ambil_kelas_2020()->result_array(),);
		$this->load->view('user/kelas_2020', $data);
	}

	function pengurus(){
		$data = array('data_pengurus' => $this->user_model->ambil_pengurus()->result_array(),);
		$this->load->view('user/pengurus', $data);
	}

	function kegiatan(){
		$data = array('data_kegiatan' => $this->user_model->ambil_kegiatan()->result_array(),);
		$this->load->view('user/kegiatan', $data);
	}

	function galeri(){
		$dpthasil = $this->user_model->ambil_galeri();
		if ($dpthasil)
		{
		    $data['hasil_galeri'] = $dpthasil;
		}

		$this->load->view('user/galeri', $data);
	}

	function kontak(){
		$this->load->view('user/kontak');
	}

	function artikel(){
		$cari = $this->user_model->ambil_artikel();
		if ($cari)
		{
		    $data['hasil_artikel'] = $cari;
		}
		 
		$this->load->view('user/artikel', $data); 
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

	    $this->load->view('user/detail_artikel', $data);
  	}

  	function profil(){
		$cari = $this->user_model->ambil_profil();
		if ($cari)
		{
		    $data['hasil_profil'] = $cari;
		}
		 
		$this->load->view('user/profil', $data); 
	}

	function detail_profil($kode = 0){
	    $row = $this->admin_model->edit_profil("where profil.`id_profil`  = '$kode'")->result_array();

	    $data = array(
	      'id_profil' => $row[0]['id_profil'],
	      'nama' => $row[0]['nama'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	    );

	    $this->load->view('user/detail_profil', $data);
  	}

}