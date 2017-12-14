<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_con extends CI_Controller {	
	
	public function index()
	{	
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login_view2',$data);
				break;
			case 'administrador':
				redirect(base_url().'index.php/admin');
				break;
			case '2':
				redirect(base_url().'index.php/trainer');
				break;	
			case '3':
				redirect(base_url().'index.php/suscriptor');
				break;
			default:		
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login_view2',$data);
				break;		
		}
	}

	public function new_user()
		{
			if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
			{
	            $this->form_validation->set_rules('username', 'nombre de usuario', 'required');
	            $this->form_validation->set_rules('password', 'password', 'required');
	            
				if($this->form_validation->run() == FALSE)
				{
					//$this->index();
					redirect(base_url().'index.php/Login_con/index/');
				}else{
					$username = $this->input->post('username');
					$password = sha1($this->input->post('password'));
					$check_user = $this->Login_model2->login_user($username,$password);
					if($check_user == TRUE)
					{
						$data = array(
		                'is_logued_in' 	=> 		TRUE,
		                'id_usuario' 	=> 		$check_user->id,
		                'perfil'		=>		$check_user->perfil,
		                'username' 		=> 		$check_user->username
	            		);		
						$this->session->set_userdata($data);
						redirect(base_url().'index.php/Login_con');
					}
				}
			}else{
				redirect(base_url().'index.php/Login_con');
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