<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('home_model');
        // create table if not exist
        $this->home_model->check_table_if_exist();
    }

	public function index()
	{
        if(!$this->session->has_userdata('id')){
            redirect('login');
        }
        $user_id = $this->session->userdata('id');
        $todos = $this->home_model->read_data($user_id);

        $home_data['todos'] = $todos;
        $this->load->view('header');
		$this->load->view('home', $home_data);
	}

    function logout()
    {
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value)
        {
            $this->session->unset_userdata($row);
        }

        redirect('login');
    }

    function create_todo()
    {
        header('Content-type: application/json');
        $jsonData = json_decode($this->input->raw_input_stream,true);
        
        if(!$this->session->has_userdata('id')){
            return FALSE;
        }
        $user_id = $this->session->userdata('id');
        $data = array(
            'user_id' => $user_id,
            'title' => $jsonData['todo']
        );

        $success = $this->home_model->create_data($data);
    }

    function update_todo()
    {
        header('Content-type: application/json');
        $jsonData = json_decode($this->input->raw_input_stream,true);

        $data = array(
            'title' => $jsonData['todo']
        );
        $success = $this->home_model->update_data($jsonData['id'], $data);

        echo json_encode(array(
			'success' => $success,
			'msg' => $jsonData,
		));
    }

    function delete_todo()
    {
        header('Content-type: application/json');
        $jsonData = json_decode($this->input->raw_input_stream,true);

        $success = $this->home_model->delete_data($jsonData['id']);

        echo json_encode(array(
			'success' => $success,
			'msg' => $jsonData,
		));
    }

    function update_checkbox()
    {
        header('Content-type: application/json');
        $jsonData = json_decode($this->input->raw_input_stream,true);

        $data = array(
            'check' => $jsonData['check']
        );
        $success = $this->home_model->update_data($jsonData['id'], $data);

        echo json_encode(array(
			'success' => $success,
			'msg' => $jsonData,
		));
    }


}


?>