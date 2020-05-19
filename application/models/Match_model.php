<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Match_model extends CI_Model{

    public function get_all(){
        $this->db->select('m.id, m.match_date, m.home_team_id, m.away_team_id, ht.name as home_team, at.name as away_team');
        $this->db->from('match_tbl m');
        $this->db->join('team_tbl ht', 'm.home_team_id = ht.id');
        $this->db->join('team_tbl at', 'm.away_team_id = at.id');
        $this->db->where('m.deleted_at', NULL);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id){
        $this->db->select('m.id, m.match_date, m.home_team_id, m.away_team_id, ht.name as home_team, at.name as away_team');
        $this->db->from('match_tbl m');
        $this->db->join('team_tbl ht', 'm.home_team_id = ht.id');
        $this->db->join('team_tbl at', 'm.away_team_id = at.id');
        $this->db->where('m.id', $id);
        $this->db->where('m.deleted_at', NULL);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function insert($match){
        $this->db->insert('match_tbl', $match);
        return $this->db->affected_rows();
    }

    public function update($match_id, $match){
        $this->db->set($match);
        $this->db->where('id', $match_id);
        $this->db->update('match_tbl');
        return $this->db->affected_rows();
    }
}
?>