<?php
class Auth extends CI_Controller{

	function __construct(){
        parent::__construct();
        $this->load->model('user_model');
	}

    public function login_form(){
        $this->load->view('authviews/login');
    }

	public function login(){
		$email = $this->input->post('email');
		$password = sha1(md5($this->input->post('password')));
		
		$user = $this->user_model->get_by_email($email);
		if(isset($user)){
			$existing_password = $user->password;

			if(password_verify($password, $existing_password)){
                $data_session = array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role
                );
                $this->session->set_userdata($data_session);
                redirect(base_url());
            } else{
                $this->session->set_flashdata('message', 'Password salah, silakan coba lagi');
                redirect('login');
            }
        } else{
            $this->session->set_flashdata('message', 'Email tidak terdaftar, silakan coba lagi');
            redirect('login');
        }
	}

    public function logout(){
  		$this->session->sess_destroy();
  		redirect('login');
  	}
}
