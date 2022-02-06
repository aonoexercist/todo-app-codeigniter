<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if($this->session->has_userdata('id')){
        //     redirect('home');
        // }
        // else {
        //     redirect('login');
        // }

        $this->load->model('register_model');
        // create table if not exist
        $this->register_model->check_table_if_exist();

        $this->load->library('form_validation');
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
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[user.email]',
            array('is_unique' => '{field} already exist.')
        );
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('user_confirm_password', 'Password Confirmation', 'required|min_length[8]|matches[user_password]');

        if($this->form_validation->run())
        {
            $enc_password = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);
            $data = array(
                'first_name'  => $this->input->post('user_first_name'),
                'middle_name'  => $this->input->post('user_middle_name'),
                'last_name'  => $this->input->post('user_last_name'),
                'email'  => $this->input->post('user_email'),
                'password' => $enc_password
            );
            $success = $this->register_model->create_data($data);

            if($success)
            {
                // $this->session->set_flashdata('register_message', 'Registered Success!  .. redirecting');
                // $this->session->set_tempdata('register_message', 'Registered Success!  .. redirecting', 1000);
                // redirect('register', 'refresh');
                // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                redirect('login');
                // echo '<script>
                //     setTimeout(() => {
                //         redirect("login");
                //     }, 5000);
                // </script>';
            }

            
            // $register_data['success'] = $success;
            // $this->load->view('header');
		    // $this->load->view('register', $register_data);
            
            // redirect('register');
        }
        else
        {
            $this->index();
        }
    }



}


?>