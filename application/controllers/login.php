<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('index');
	}
	
	public function welcome()
	{
		$this->load->view('welcome');
	}

	public function log()
	{
		
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$this->load->model('user');
		$user = $this->user->get_user($email);

		if ($user && $user['password'] == $password) 
		{
			
			$user = array(
				'email' => $user['email'],
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name'],
				'id' => $user['id'],
				'is_logged_on' => TRUE
			);

			$this->session->set_userdata($user);
			redirect(base_url('/login/welcome'));
		} 
		else 
		{
			$this->session->set_flashdata('login_error', "Invalid email or password");
			redirect(base_url(''));
		}
		
	}

	public function reg()
	{
		$this->load->model('user');
		$password = md5($this->input->post('password'));


		$reg_info = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'password' => $password,
			'con_password' => $this->input->post('con_password')
		);

		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("con_password", "Confirm Password", "trim|required|matches[password]");
		
		if ($this->form_validation->run() === FALSE) 
		{
			$this->view_data['errors'] = validation_errors();
			$this->session->set_flashdata('reg_error', $this->view_data['errors']);
			redirect(base_url(''));
		} 
		else 
		{
			$this->user->create($reg_info);
			$this->session->set_flashdata('registered', 'Account Created, Login.');
			redirect(base_url(' '));
		}

			
	}
	public function log_off()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}




