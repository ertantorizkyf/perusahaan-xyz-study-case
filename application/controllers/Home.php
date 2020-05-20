<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('id'))){
			redirect('login');
        }
        $session_data = array('navigation' => 'home');
        $this->session->set_userdata($session_data);
        $this->load->model('match_model');
    }

    public function index(){
        $data['upcoming_matches'] = $this->match_model->get_upcoming_match();
        $data['recent_matches'] = $this->match_model->get_recent_match();

        $this->load->view('templates/header');
        $this->load->view('homeviews/home', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function not_found(){
        $this->load->view('templates/header');
        $this->load->view('templates/not_found');
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }
}
?>
