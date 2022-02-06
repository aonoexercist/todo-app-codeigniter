<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if($this->session->has_userdata('id')){
        //     redirect('home');
        // }
        // else {
        //     redirect('login');
        // }

        $this->load->model('login_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $this->load->view('header');
		$this->load->view('login');
	}

    function validation()
    {
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[8]');

        if($this->form_validation->run())
        {
            $result = $this->login_model->login($this->input->post('user_email'), $this->input->post('user_password'));
            if($result)
            {
                $session_data = array(
                    'id' => $result->id,
                    'user_data' => $result
                );
                $this->session->set_userdata($session_data);
                redirect('home');
            }
            else
            {
                // $this->session->set_flashdata('message',"Wrong Email or Password");
                $this->index();
            }
        }
        else
        {
            $this->index();
        }
    }


}


?>