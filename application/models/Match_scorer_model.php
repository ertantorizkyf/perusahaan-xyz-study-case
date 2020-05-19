<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_scorer_model extends CI_Model{

    public function batch_insert($scorers){
        $this->db->insert_batch('match_scorer_tbl', $scorers);
        return $this->db->affected_rows();
    }

    public function get_by_match_score_id($match_score_id){
        $this->db->select('s.id, p.name, t.name as team, pp.name as position, p.jersey_number, s.score_time');
        $this->db->from('match_scorer_tbl s');
        $this->db->join('player_tbl p', 's.scorer_id = p.id');
        $this->db->join('player_position_tbl pp', 'p.position_id = pp.id');
        $this->db->join('team_tbl t', 'p.team_id = t.id');
        $this->db->where('s.match_score_id', $match_score_id);
        $query = $this->db->get();
        return $query->result();
    }

}
?>
