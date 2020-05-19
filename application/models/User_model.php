<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    public function get_all(){
        $query = $this->db->where('deleted_at', NULL)->get('user_tbl');
        return $query->result();
    }

    public function get_by_email($email){
        $query = $this->db->where('email', $email)->where('deleted_at', NULL)->get('user_tbl');
        return $query->result()[0];
    }

    public function get_by_id($id){
        $query = $this->db->where('id', $id)->where('deleted_at', NULL)->get('user_tbl');
        return $query->result()[0];
    }

    public function insert($user){
        $this->db->insert('user_tbl', $user);
        return $this->db->affected_rows();
    }

    public function update($user_id, $user){
        $this->db->set($user);
        $this->db->where('id', $user_id);
        $this->db->update('user_tbl');
        return $this->db->affected_rows();
    }
}
?>
