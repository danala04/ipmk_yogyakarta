<?php 
 
class Admin_model extends CI_Model{	

	public function ambil_galeri(){
		$query=$this->db->query("SELECT * FROM galeri");
		return $query;
	}

	public function simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	public function edit_galeri($where= "") {
		$data = $this->db->query('SELECT * FROM galeri '.$where);
		return $data;
	}

	public function update_galeri($data){
        $this->db->where('id_galeri',$data['id_galeri']);
        $this->db->update('galeri',$data);
    }	

    public function ambil_kegiatan(){
		$query=$this->db->query("SELECT * FROM kegiatan");
		return $query;
	}

	public function edit_kegiatan($where= "") {
		$data = $this->db->query('SELECT * FROM kegiatan '.$where);
		return $data;
	}

	public function update_kegiatan($data){
        $this->db->where('id_kegiatan',$data['id_kegiatan']);
        $this->db->update('kegiatan',$data);
    }

    public function ambil_pengurus(){
		$query=$this->db->query("SELECT * FROM pengurus");
		return $query;
	}	

	public function edit_pengurus($where= "") {
		$data = $this->db->query('SELECT * FROM pengurus '.$where);
		return $data;
	}

	public function update_pengurus($data){
        $this->db->where('id_pengurus',$data['id_pengurus']);
        $this->db->update('pengurus',$data);
    }

	public function edit_mahasiswa($where= "") {
		$data = $this->db->query('SELECT * FROM mahasiswa '.$where);
		return $data;
	}

	public function update_mahasiswa($data){
        $this->db->where('id_mahasiswa',$data['id_mahasiswa']);
        $this->db->update('mahasiswa',$data);
    }

	public function ambil_mahasiswa_2018(){
		$query=$this->db->query("SELECT * from mahasiswa  where angkatan = '2018'");
		return $query;
	}	

    public function ambil_mahasiswa_2019(){
		$query=$this->db->query("SELECT * from mahasiswa  where angkatan = '2019'");
		return $query;
	}

	 public function ambil_mahasiswa_2020(){
		$query=$this->db->query("SELECT * from mahasiswa  where angkatan = '2020'");
		return $query;
	}

	public function ambil_artikel(){
		$query=$this->db->query("SELECT * from artikel");
		return $query;
	}

	public function edit_artikel($where= "") {
		$data = $this->db->query('SELECT * FROM artikel '.$where);
		return $data;
	}

	public function update_artikel($data){
        $this->db->where('id_artikel',$data['id_artikel']);
        $this->db->update('artikel',$data);
    }

    public function ambil_profil(){
		$query=$this->db->query("SELECT * from profil");
		return $query;
	}

	public function edit_profil($where= "") {
		$data = $this->db->query('SELECT * FROM profil '.$where);
		return $data;
	}

	public function update_profil($data){
        $this->db->where('id_profil',$data['id_profil']);
        $this->db->update('profil',$data);
    }

}