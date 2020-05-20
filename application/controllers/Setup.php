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
        $user['email'] = "admin@xyz-mail.com";
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

    function create_team_table(){
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
        'logo' => array(
            'type' =>'VARCHAR',
            'constraint' => '255'
        ),
        'year_founded' => array(
            'type' =>'VARCHAR',
            'constraint' => '4'
        ),
        'address' => array(
            'type' =>'VARCHAR',
            'constraint' => '255'
        ),
        'city' => array(
            'type' =>'VARCHAR',
            'constraint' => '255'
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
        $this->dbforge->create_table('team_tbl');
        echo $this->session->set_flashdata('msg','Team table created');
        redirect('setup');
    }

    function create_player_position_table(){
        $fields = array(
        'id' => array(
            'type' => 'INT',
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'name' => array(
            'type' => 'VARCHAR',
            'constraint' => '255'
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
        $this->dbforge->create_table('player_position_tbl');
        echo $this->session->set_flashdata('msg','Player position table created');
        redirect('setup');
    }

    function create_player_table(){
        $fields = array(
        'id' => array(
            'type' => 'INT',
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'name' => array(
            'type' => 'VARCHAR',
            'constraint' => '255'
        ),
        'height' => array(
            'type' => 'FLOAT'
        ),
        'weight' => array(
            'type' => 'FLOAT'
        ),
        'team_id' => array(
            'type' => 'INT',
            'unsigned' => TRUE
        ),
        'position_id' => array(
            'type' => 'INT',
            'unsigned' => TRUE
        ),
        'jersey_number' => array(
            'type' => 'INT',
            'unsigned' => TRUE
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
        $this->dbforge->create_table('player_tbl');
        echo $this->session->set_flashdata('msg','Player table created');
        redirect('setup');
    }

    function create_match_table(){
        $fields = array(
        'id' => array(
            'type' => 'INT',
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'match_date' => array(
            'type' => 'DATETIME'
        ),
        'home_team_id' => array(
            'type' => 'INT',
            'unsigned' => TRUE
        ),
        'away_team_id' => array(
            'type' => 'INT',
            'unsigned' => TRUE
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
        $this->dbforge->create_table('match_tbl');
        echo $this->session->set_flashdata('msg','Match table created');
        redirect('setup');
    }

    function create_match_score_table(){
        $fields = array(
        'id' => array(
            'type' => 'INT',
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'match_id' => array(
            'type' => 'INT',
            'unsigned' => TRUE
        ),
        'home_score' => array(
            'type' => 'INT',
            'unsigned' => TRUE
        ),
        'away_score' => array(
            'type' => 'INT',
            'unsigned' => TRUE
        ),
        'created_at' => array(
            'type' => 'DATETIME'
        ),
        );
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('match_score_tbl');
        echo $this->session->set_flashdata('msg','Match score table created');
        redirect('setup');
    }

    function create_match_scorer_table(){
        $fields = array(
        'id' => array(
            'type' => 'INT',
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'match_score_id' => array(
            'type' => 'INT',
            'unsigned' => TRUE
        ),
        'scorer_id' => array(
            'type' => 'INT',
            'unsigned' => TRUE
        ),
        'score_time' => array(
            'type' => 'FLOAT'
        ),
        'created_at' => array(
            'type' => 'DATETIME'
        ),
        );
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('match_scorer_tbl');
        echo $this->session->set_flashdata('msg','Match score table created');
        redirect('setup');
    }
}
?>
