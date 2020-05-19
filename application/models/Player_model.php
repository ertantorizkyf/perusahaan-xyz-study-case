<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player_model extends CI_Model{

    public function get_all(){
        $this->db->select('p.id, p.name, p.height, p.weight, t.name as team, pp.name as position, p.jersey_number');
        $this->db->from('player_tbl p');
        $this->db->join('player_position_tbl pp', 'p.position_id = pp.id');
        $this->db->join('team_tbl t', 'p.team_id = t.id');
        $this->db->where('p.deleted_at', NULL);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id){
        $this->db->select('p.id, p.name, p.height, p.weight, p.team_id, t.name as team,
            p.position_id, pp.name as position, p.jersey_number');
        $this->db->from('player_tbl p');
        $this->db->join('player_position_tbl pp', 'p.position_id = pp.id');
        $this->db->join('team_tbl t', 'p.team_id = t.id');
        $this->db->where('p.id', $id);
        $this->db->where('p.deleted_at', NULL);
        $query = $this->db->get();
        return $query->result()[0];
    }

    public function get_by_team_id($team_id){
        $this->db->select('p.id, p.name, p.height, p.weight, p.team_id, t.name as team,
            p.position_id, pp.name as position, p.jersey_number');
        $this->db->from('player_tbl p');
        $this->db->join('player_position_tbl pp', 'p.position_id = pp.id');
        $this->db->join('team_tbl t', 'p.team_id = t.id');
        $this->db->where('p.team_id', $team_id);
        $this->db->where('p.deleted_at', NULL);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($player){
        $this->db->insert('player_tbl', $player);
        return $this->db->affected_rows();
    }

    public function update($player_id, $player){
        $this->db->set($player);
        $this->db->where('id', $player_id);
        $this->db->update('player_tbl');
        return $this->db->affected_rows();
    }
}
?>
