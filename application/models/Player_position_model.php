<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player_position_model extends CI_Model{

    public function get_all(){
        $query = $this->db->where('deleted_at', NULL)->get('player_position_tbl');
        return $query->result();
    }

    public function get_by_id($id){
        $query = $this->db->where('id', $id)->where('deleted_at', NULL)->get('player_position_tbl');
        return $query->result()[0];
    }

    public function insert($position){
        $this->db->insert('player_position_tbl', $position);
        return $this->db->affected_rows();
    }

    public function update($position_id, $position){
        $this->db->set($position);
        $this->db->where('id', $position_id);
        $this->db->update('player_position_tbl');
        return $this->db->affected_rows();
    }
}
?>
