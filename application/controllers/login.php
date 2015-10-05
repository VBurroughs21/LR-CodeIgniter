<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('index');
	}
	// public function welcome()
	// {
		
	// 	$this->load->view('welcome');
	// }

	public function log()
	{
		$this->load->model('user');
		$email = $this->input->post('email');

		$log_info = array(
			'email' => $email,
			'password' => $this->input->post('password')

		);

		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
	
		if ($this->form_validation->run() === FALSE) {
			$this->view_data['errors'] = validation_errors();
			redirect(base_url(''));
		} else {
			$this->session->set_userdata('user', $this->user->get_user($email));
			$this->load->view('/welcome', $this->session->set_userdata('user'));
		}
		
	}

	public function reg()
	{
		$this->load->model('user');

		$reg_info = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'con_password' => $this->input->post('con_password')
		);

		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("con_password", "Confirm Password", "trim|required|matches[password]");
		
		if ($this->form_validation->run() === FALSE) {
			$this->view_data['errors'] = validation_errors();
			redirect(base_url(''));
		} else {
			$this->user->create($reg_info);
			redirect(base_url('login/user_page'));
		}

			
	}

	public function user_page() 
	{
		redirect(base_url('login/welcome'));
	}

	public function log_off()
	{
		session_destroy();
		redirect(base_url(''));
	}
}




