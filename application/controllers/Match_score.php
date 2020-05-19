<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_score extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->dbforge();
        $this->load->model('match_score_model');
        $this->load->model('player_model');
        $this->load->model('match_model');
        $this->load->model('match_scorer_model');
    }

    public function create_form($id){
        $data['match_id'] = $id;
        // GET LIST OF PLAYERS FOR SCORER INPUT
        $team_ids = $this->match_model->get_teams_by_match_id($id);
        $data['home_players'] = $this->player_model->get_by_team_id($team_ids->home_team_id);
        $data['away_players'] = $this->player_model->get_by_team_id($team_ids->away_team_id);

        $this->load->view('templates/header');
        $this->load->view('matchscoreviews/create', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('matchscoreviews/module_script');
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
                $recent_match_score = $this->match_score_model->get_most_recent();
                $i = 0;
                $scorer_counter = $this->input->post('scorer_counter');
                while($i <= $scorer_counter){
                    $check_scorer = $this->input->post('scorer_'.$i.'_id');
                    if($check_scorer > 0){
                        $scorers['scorer'.$i]['match_score_id'] = $recent_match_score->id;
                        $scorers['scorer'.$i]['scorer_id'] = $this->input->post('scorer_'.$i.'_id');
                        $scorers['scorer'.$i]['score_time'] = $this->input->post('score_'.$i.'_time');
                        $scorers['scorer'.$i]['created_at'] = $current_time;
                    }    
                    $i++;
                }
                $insert = $this->match_scorer_model->batch_insert($scorers);
                if($insert > 0){
                    $message = 'Skor pertandingan berhasil ditambahkan';
                } else{
                    $message = 'Gagal menambahkan skor pertandingan';
                }
                // $message = 'Skor pertandingan berhasil ditambahkan';
            } else{
                $message = 'Gagal menambahkan skor pertandingan';
            }
        }
        
        echo '<script>
        alert("'.$message.'");
        window.location.href="'.base_url().'match/list";
        </script>';
    }

    public function list($id){
        $data['score'] = $this->match_score_model->get_by_match_id($id);
        $data['scorers'] = $this->match_scorer_model->get_by_match_score_id($data['score']->id);

        $this->load->view('templates/header');
        $this->load->view('matchscoreviews/detail', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

}
?>
