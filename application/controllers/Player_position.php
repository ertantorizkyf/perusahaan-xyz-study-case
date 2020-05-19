<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player_position extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('id'))){
			redirect('login');
		}
        $this->load->model('player_position_model');
    }

    public function create_form(){
        $this->load->view('templates/header');
        $this->load->view('playerpositionviews/create');
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function create_process(){
        $current_time = $this->config->item('now');

        $position['name'] = $this->input->post('name');
        $position['created_at'] = $current_time;

        $insert = $this->player_position_model->insert($position);
        if($insert > 0){
            echo $this->session->set_flashdata('message','Posisi pemain berhasil ditambahkan');
        } else{
            echo $this->session->set_flashdata('message','Gagal menambahkan posisi pemain');
        }

        redirect('player-position/create');
    }

    public function list(){
        $data['positions'] = $this->player_position_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('playerpositionviews/list', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function delete($id){
        // Soft delete operation
        $current_time = $this->config->item('now');
        $team['deleted_at'] = $current_time;

        $delete = $this->player_position_model->update($id, $team);
        if($delete > 0){
            $message = 'Posisi pemain berhasil dihapus';
        } else{
            $message = 'Gagal menghapus posisi pemain, silakan coba lagi';
        }
        
        echo '<script>
        alert("'.$message.'");
        window.location.href="'.base_url().'player-position/list";
        </script>';
    }

    public function edit_form($id){
        $data['position'] = $this->player_position_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('playerpositionviews/edit', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function edit_process(){
        $current_time = $this->config->item('now');

        $id = $this->input->post('position_id');
        $position['name'] = $this->input->post('name');
        $position['updated_at'] = $current_time;

        $update = $this->player_position_model->update($id, $position);
        if($update > 0){
            echo $this->session->set_flashdata('message','Posisi pemain berhasil diperbarui');
        } else{
            echo $this->session->set_flashdata('message','Gagal memperbarui posisi pemain');
        }

        redirect('player-position/'.$id.'/edit');
    }
}
?>
