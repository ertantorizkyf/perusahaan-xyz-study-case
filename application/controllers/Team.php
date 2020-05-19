<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('id'))){
			redirect('login');
        }
        $session_data = array('navigation' => 'team');
        $this->session->set_userdata($session_data);
        $this->load->model('team_model');
    }

    public function create_form(){
        $this->load->view('templates/header');
        $this->load->view('teamviews/create');
        $this->load->view('templates/script_imports');
        $this->load->view('teamviews/module_script');
        $this->load->view('templates/footer');
    }

    public function create_process(){
        $current_time = $this->config->item('now');

        $team['name'] = $this->input->post('name');
        $team['logo'] = $this->input->post('logo');
        $team['year_founded'] = $this->input->post('year_founded');
        $team['address'] = $this->input->post('address');
        $team['city'] = $this->input->post('city');
        $team['created_at'] = $current_time;

        $insert = $this->team_model->insert($team);
        if($insert > 0){
            echo $this->session->set_flashdata('message','Tim baru berhasil ditambahkan');
        } else{
            echo $this->session->set_flashdata('message','Gagal menambahkan tim baru');
        }

        redirect('team/create');
    }

    public function list(){
        $data['teams'] = $this->team_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('teamviews/list', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('templates/footer');
    }

    public function delete($id){
        // Soft delete operation
        $current_time = $this->config->item('now');
        $team['deleted_at'] = $current_time;

        $delete = $this->team_model->update($id, $team);
        if($delete > 0){
            $message = 'Tim berhasil dihapus';
        } else{
            $message = 'Gagal menghapus tim, silakan coba lagi';
        }
        
        echo '<script>
        alert("'.$message.'");
        window.location.href="'.base_url().'team/list";
        </script>';
    }

    public function edit_form($id){
        $data['team'] = $this->team_model->get_by_id($id);

        $this->load->view('templates/header');
        $this->load->view('teamviews/edit', $data);
        $this->load->view('templates/script_imports');
        $this->load->view('teamviews/module_script');
        $this->load->view('templates/footer');
    }

    public function edit_process(){
        $current_time = $this->config->item('now');

        $id = $this->input->post('team_id');
        $team['name'] = $this->input->post('name');
        $team['logo'] = $this->input->post('logo');
        $team['year_founded'] = $this->input->post('year_founded');
        $team['address'] = $this->input->post('address');
        $team['city'] = $this->input->post('city');
        $team['updated_at'] = $current_time;

        $update = $this->team_model->update($id, $team);
        if($update > 0){
            echo $this->session->set_flashdata('message','Tim baru berhasil diperbarui');
        } else{
            echo $this->session->set_flashdata('message','Gagal memperbarui tim baru');
        }

        redirect('team/'.$id.'/edit');
    }

    public function photo_upload(){
		if(isset($_POST["image"])){
			$data = $_POST["image"];
			$user_id = $this->session->userdata('id');
	 
			if(exif_imagetype($data)) {
                // Generate random name
                $name = sha1(microtime()) . ".png";
                $path =  $this->config->item('app_base_dir')."/assets/team_logo";
                $image_array_1 = explode(";", $data);
                $image_array_2 = explode(",", $image_array_1[1]);
                $data = base64_decode($image_array_2[1]);
        
                if(file_put_contents($path."/".$name, $data)){
                    $response = $name;
                } else{
                    $response = "FAILED";
                }
		   	} else{
				$response = "FAILED";
		   	}
		} else{
			$response = "FAILED";
		}
		
		echo $response;
	}
}
?>
