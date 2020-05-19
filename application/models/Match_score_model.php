<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_score_model extends CI_Model{

    public function insert($match){
        $this->db->insert('match_score_tbl', $match);
        return $this->db->affected_rows();
    }

    public function get_most_recent(){
        $query = $this->db->order_by('id', 'DESC')->get('match_score_tbl');
        return $query->result()[0];
    }

    public function get_by_match_id($match_id){
        $query = $this->db->where('match_id', $match_id)->get('match_score_tbl');
        return $query->result()[0];
    }
}
?>
