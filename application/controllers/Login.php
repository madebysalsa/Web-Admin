<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  public function index()
	{
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == false) {
            $data ['title'] = 'Masuk';
        $this->load->view('login/admin_header', $data);
       $this->load->view('login/login');
       $this->load->view('login/admin_footer');
        } else {
           $this->masuk(); 
        }
        

    }

    private function masuk()
    {
        $user = $this->db->get_where('user', ['email' => $this->input->post('email')])->row_array();
        if ($user['email']) {
            if ($user['is_aktif'] != 0) {
                if ($this->input->post('password') == $user['password']) {
                    $userdata = [
                        'id' => $user['id_user'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($userdata);
                    $this->session->set_flashdata('flash', "
                    <div class='alert alert-warning mt-5 pt-3 pb-3 alert-dismissible fade show welcome' role='alert'>
                    <h1 class='display-4'> You have been logged in :)</h1>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>
                ");
                    if ($userdata['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('login');
     }
     
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger">Password anda salah !!!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger">Akun anda belum didaftarkan</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger">Email anda tidak ditemukan</div>');
            redirect('login');
        }
 }

public function logout()
{
    $userdata = [
                        'id', 
                        'email', 
                        'role_id', 
                    ];
    $this->session->unset_userdata($userdata);
    $this->session->sess_destroy();
    redirect('login');
}

}