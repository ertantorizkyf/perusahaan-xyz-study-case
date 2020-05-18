<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->dbforge();
    }

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('homeviews/home');
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }
}
?>
