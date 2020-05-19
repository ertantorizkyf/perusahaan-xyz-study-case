<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('id'))){
			redirect('login');
        }
        $session_data = array('navigation' => 'player');
        $this->session->set_userdata($session_data);
        $this->load->model('player_model');
        $this->load->model('player_position_model');
        $this->load->model('team_model');
    }

    public function create_form(){
        $data['positions'] = $this->player_position_model->get_all();
        $data['teams'] = $this->team_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('playerviews/create', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function create_process(){
        $current_time = $this->config->item('now');

        $player['name'] = $this->input->post('name');
        $player['height'] = $this->input->post('height');
        $player['weight'] = $this->input->post('weight');
        $player['team_id'] = $this->input->post('team_id');
        $player['position_id'] = $this->input->post('position_id');
        $player['jersey_number'] = $this->input->post('jersey_no');
        $player['created_at'] = $current_time;

        $insert = $this->player_model->insert($player);
        if($insert > 0){
            echo $this->session->set_flashdata('message','Pemain berhasil ditambahkan');
        } else{
            echo $this->session->set_flashdata('message','Gagal menambahkan pemain');
        }

        redirect('player/create');
    }

    public function list(){
        $data['players'] = $this->player_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('playerviews/list', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function delete($id){
        // Soft delete operation
        $current_time = $this->config->item('now');
        $team['deleted_at'] = $current_time;

        $delete = $this->player_model->update($id, $team);
        if($delete > 0){
            $message = 'Posisi pemain berhasil dihapus';
        } else{
            $message = 'Gagal menghapus posisi pemain, silakan coba lagi';
        }
        
        echo '<script>
        alert("'.$message.'");
        window.location.href="'.base_url().'player/list";
        </script>';
    }

    public function edit_form($id){
        $data['player'] = $this->player_model->get_by_id($id);
        $data['positions'] = $this->player_position_model->get_all();
        $data['teams'] = $this->team_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('playerviews/edit', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function edit_process(){
        $current_time = $this->config->item('now');

        $id = $this->input->post('player_id');
        $player['name'] = $this->input->post('name');
        $player['height'] = $this->input->post('height');
        $player['weight'] = $this->input->post('weight');
        $player['team_id'] = $this->input->post('team_id');
        $player['position_id'] = $this->input->post('position_id');
        $player['jersey_number'] = $this->input->post('jersey_no');
        $player['updated_at'] = $current_time;

        $update = $this->player_model->update($id, $player);
        if($update > 0){
            echo $this->session->set_flashdata('message','Pemain berhasil diperbarui');
        } else{
            echo $this->session->set_flashdata('message','Gagal memperbarui pemain');
        }

        redirect('player/'.$id.'/edit');
    }
}
?>
