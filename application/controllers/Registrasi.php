<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	
	public function index()
    {
        if ($this->session->userdata('username')) {
            redirect ('admin');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]',
        [
            'is_unique' => 'Username sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', 
        [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('registrasi_view');
        } else {
            $data = [
                'Username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Akun kamu telah terdaftar. Silahkan Login </div>');
            redirect('login');
        }
	}
}
