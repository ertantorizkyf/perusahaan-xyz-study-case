<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->dbforge();
    }

    public function index(){
        $this->load->view('setupviews/setup');
    }

    function create_user_table(){
        $fields = array(
        'id' => array(
            'type' => 'INT',
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'name' => array(
            'type' =>'VARCHAR',
            'constraint' => '255'
        ),
        'email' => array(
            'type' =>'VARCHAR',
            'constraint' => '255'
        ),
        'password' => array(
            'type' =>'VARCHAR',
            'constraint' => '255'
        ),
        'role' => array(
            'type' => 'ENUM("admin","user")',
            'default' => 'user'
        ),
        'created_at' => array(
            'type' => 'DATETIME'
        ),
        'updated_at' => array(
            'type' => 'DATETIME',
            'null' => TRUE
        ),
        'deleted_at' => array(
            'type' => 'DATETIME',
            'null' => TRUE
        ),
        );
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('user_tbl');
        echo $this->session->set_flashdata('msg','User table created');
        redirect('setup');
    }

    public function create_admin(){
        $current_time = $this->config->item('now');

        $user['name'] = "admin";
        $user['email'] = "admin@mail.com";
        $user['password'] = password_hash(sha1(md5("12345678")), PASSWORD_DEFAULT);
        $user['role'] = "admin";
        $user['created_at'] = $current_time;
        
        $this->db->insert('user_tbl', $user);
        $affected_row = $this->db->affected_rows();

        if($affected_row > 0){
            echo $this->session->set_flashdata('msg','Admin user created');
            redirect('setup');
        }

        // Fail inserting
        echo $this->session->set_flashdata('msg','Fail to create admin');
        redirect('setup');
    }
}
?>
