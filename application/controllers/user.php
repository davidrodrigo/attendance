<?php 
	/**
	* 
	*/
	
	class User extends CI_Controller{
		
		public function index(){
			//$this->load->view('register');
			echo 'From User controller';
		}
		
		public function register(){
			$this->load->view('register');
		}
		
		public function register_process(){
			$this->form_validation->set_rules('fullname', 'Full Name', 'required');
			$this->form_validation->set_rules('username', 'User Name', 'required|min_length[4]|max_length[12]|is_unique[login.username]');
			$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[login.email]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
			
			if($this->form_validation->run() == FALSE){
				$this->load->view('register');
			}else{
				echo "no errors, insert data into database";
				$this->load->model('auth');
				$this->auth->register_user();
			}
		}
		
	}	

 