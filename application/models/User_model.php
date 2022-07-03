<?php 
 
class User_model extends CI_Model{	

	function ambil_artikel(){
        $sql1 = "select * FROM artikel";
        $cari = $this->db->query($sql1);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_artikel[]=$baris;
            }
            return $hasil_artikel;
        }
    }

    function ambil_galeri(){
        $sql2 = "select * FROM galeri";
        $dapat = $this->db->query($sql2);
        if($dapat->num_rows()>0)
        {
	        foreach ($dapat->result() as $barishasil)
	        {
	           $hasil_galeri[]=$barishasil;
	        }  
	        return $hasil_galeri;  
        }
    }
    
    public function ambil_kegiatan(){
		$query=$this->db->query("SELECT * FROM kegiatan");
		return $query;
	}

    function ambil_kelas_2018(){
		$query=$this->db->query("SELECT * from mahasiswa where angkatan = '2018';");
		return $query;
	}

	function ambil_kelas_2019(){
		$query=$this->db->query("SELECT * from mahasiswa where angkatan = '2019';");
		return $query;
	}

	function ambil_kelas_2020(){
		$query=$this->db->query("SELECT * from mahasiswa where angkatan = '2020';");
		return $query;
	}

	function ambil_pengurus(){
		$query=$this->db->query("SELECT * from pengurus");
		return $query;
	}

	function ambil_profil(){
        $sql1 = "select * FROM profil";
        $cari = $this->db->query($sql1);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_profil[]=$baris;
            }
            return $hasil_profil;
        }
    }
}