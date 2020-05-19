<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('id'))){
			redirect('login');
		}
        $this->load->model('user_model');
    }

    public function create_form(){
        $this->load->view('templates/header');
        $this->load->view('userviews/create');
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function create_process(){
        $current_time = $this->config->item('now');

        $user['name'] = $this->input->post('name');
        $user['email'] = $this->input->post('email');
        $user['password'] = password_hash(sha1(md5($this->input->post('password'))), PASSWORD_DEFAULT);
        $user['role'] = $this->input->post('role');
        $user['created_at'] = $current_time;

        $insert = $this->user_model->insert($user);
        if($insert > 0){
            echo $this->session->set_flashdata('message','Pengguna baru berhasil ditambahkan');
        } else{
            echo $this->session->set_flashdata('message','Gagal menambahkan pengguna baru');
        }

        redirect('user/create');
    }

    public function list(){
        $data['users'] = $this->user_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('userviews/list', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function delete($id){
        // Soft delete operation
        $current_time = $this->config->item('now');
        $user['deleted_at'] = $current_time;

        $delete = $this->user_model->update($id, $user);
        if($delete > 0){
            $message = 'Pengguna berhasil dihapus';
        } else{
            $message = 'Gagal menghapus pengguna, silakan coba lagi';
        }
        
        echo '<script>
        alert("'.$message.'");
        window.location.href="'.base_url().'user/list";
        </script>';
    }

    public function edit_form($id){
        $data['user'] = $this->user_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('userviews/edit', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function edit_process(){
        $current_time = $this->config->item('now');

        $id = $this->input->post('user_id');
        $user['name'] = $this->input->post('name');
        $user['email'] = $this->input->post('email');
        $user['role'] = $this->input->post('role');
        $user['updated_at'] = $current_time;

        $update = $this->user_model->update($id, $user);
        if($update > 0){
            echo $this->session->set_flashdata('message','Pengguna berhasil diperbarui');
        } else{
            echo $this->session->set_flashdata('message','Gagal memperbarui pengguna');
        }

        redirect('user/'.$id.'/edit');
    }
}
?>
