<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('id'))
        {
            redirect('home');
        }
        $this->load->library('form_validation');
        // $this->load->library('encrypt');
        // $this->load->model('register_model');
    }

	public function index()
	{
        $this->load->view('header');
		$this->load->view('register');
	}

    function validation()
    {
        $this->form_validation->set_rules('user_first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('user_middle_name', 'Middle Name', 'required|trim');
        $this->form_validation->set_rules('user_last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('user_confirm_password', 'Password Confirmation', 'required|min_length[8]|matches[user_password]');

        if($this->form_validation->run())
        {
            
        }
        else
        {
            $this->index();
        }
    }



}


?>