<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_trainer extends CI_Controller {
	
	
	
	
	public function index()
	{	
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login_trainer_view',$data);
				break;
			case 'administrador':
				redirect(base_url().'index.php/admin');
				break;
			case 'formador':
				redirect(base_url().'index.php/trainer');
				break;	
			case '3':
				redirect(base_url().'index.php/suscriptor');
				break;
			default:		
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login_trainer_view',$data);
				break;		
		}
	}

	public function new_user()
		{
			if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
			{



            $this->form_validation->set_rules('username', 'nombre de usuario', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
	   //          $this->form_validation->set_rules('username', 'User Name', 'required|vaild_email');
	   //          $this->form_validation->set_rules('password', 'Password', 'required');
	 
	 		// 	//validamos que se introduzcan los campos requeridos con la función de ci required
				// $this->form_validation->set_message('required', 'Field %s is required');
				// //validamos el email con la función de ci valid_email
				// $this->form_validation->set_message('valid_email', 'This %s is not valid');
				
	 
	            //lanzamos mensajes de error si es que los hay
	            
				if($this->form_validation->run() == FALSE)
				{
					//$this->index();
					redirect(base_url().'index.php/Login_trainer');
				}else{
					$username = $this->input->post('username');
					$password = sha1($this->input->post('password'));
					$check_user = $this->Login_trainer_model->login_user($username,$password);
					if($check_user == TRUE)
					{
						$data = array(
		                'is_logued_in' 	=> 		TRUE,
		                'id_usuario' 	=> 		$check_user->id,
		                'perfil'		=>		$check_user->perfil,
		                'username' 		=> 		$check_user->username
	            		);		
						$this->session->set_userdata($data);
						// $this->index();
						redirect(base_url().'index.php/Login_trainer');
					}
				}
			}else{
				redirect(base_url().'index.php/Login_trainer');
			}
		}
		
		public function token()
		{
			$token = md5(uniqid(rand(),true));
			$this->session->set_userdata('token',$token);
			return $token;
		}
		
		public function logout_ci()
		{
			$this->session->sess_destroy();
			//$this->index();
			redirect(base_url().'index.php/');
		}	
}