<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_score extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->dbforge();
        $this->load->model('match_score_model');
    }

    public function create_form($id){
        $data['match_id'] = $id;

        $this->load->view('templates/header');
        $this->load->view('matchscoreviews/create', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function create_process(){
        $current_time = $this->config->item('now');

        $match['match_id'] = $this->input->post('match_id');
        $match['home_score'] = $this->input->post('home_score');
        $match['away_score'] = $this->input->post('away_score');
        $match['created_at'] = $current_time;

        $match_score = $this->match_score_model->get_by_match_id($match['match_id']);
        if(isset($match_score)){
            $message = 'Skor pertandingan sudah pernah ditambahkan sebelumnya';
        } else{
            $insert = $this->match_score_model->insert($match);
            if($insert > 0){
                $message = 'Skor pertandingan berhasil ditambahkan';
            } else{
                $message = 'Gagal menambahkan skor pertandingan';
            }
        }
        
        echo '<script>
        alert("'.$message.'");
        window.location.href="'.base_url().'match/list";
        </script>';
    }

    public function list(){
        $data['matches'] = $this->match_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('matchviews/list', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function delete($id){
        // Soft delete operation
        $current_time = $this->config->item('now');
        $match['deleted_at'] = $current_time;

        $delete = $this->match_model->update($id, $match);
        if($delete > 0){
            $message = 'Jadwal pertandingan berhasil dihapus';
        } else{
            $message = 'Gagal menghapus jadwal pertandingan, silakan coba lagi';
        }
        
        echo '<script>
        alert("'.$message.'");
        window.location.href="'.base_url().'match/list";
        </script>';
    }

    public function edit_form($id){
        $data['match'] = $this->match_model->get_by_id($id);
        $data['teams'] = $this->team_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('matchviews/edit', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('matchviews/module_script');
        $this->load->view('templates/footer');
    }

    public function edit_process(){
        $current_time = $this->config->item('now');

        $id = $this->input->post('match_id');
        $match_date = new DateTime($this->input->post('match_date'));
        $match_time = new DateTime($this->input->post('match_time'));
        $match['match_date'] = $match_date->format('Y-m-d').' '.$match_time->format('H:i:s');
        $match['home_team_id'] = $this->input->post('home_team_id');
        $match['away_team_id'] = $this->input->post('away_team_id');
        $match['updated_at'] = $current_time;

        $update = $this->match_model->update($id, $match);
        if($update > 0){
            echo $this->session->set_flashdata('message','Jadwal pertandingan berhasil diperbarui');
        } else{
            echo $this->session->set_flashdata('message','Gagal memperbarui jadwal pertandingan');
        }

        redirect('match/'.$id.'/edit');
    }
}
?>
