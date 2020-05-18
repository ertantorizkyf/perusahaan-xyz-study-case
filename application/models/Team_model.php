<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model{

    public function get_all(){
        $query = $this->db->where('deleted_at', NULL)->get('team_tbl');
        return $query->result();
    }

    public function get_by_id($id){
        $query = $this->db->where('id', $id)->where('deleted_at', NULL)->get('team_tbl');
        return $query->result()[0];
    }

    public function insert($team){
        $this->db->insert('team_tbl', $team);
        return $this->db->affected_rows();
    }

    public function update($team_id, $team){
        $this->db->set($team);
        $this->db->where('id', $team_id);
        $this->db->update('team_tbl');
        return $this->db->affected_rows();
    }
}
?>
