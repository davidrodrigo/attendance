<?php 


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
    }
	
	public function index()
	{	
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login_view',$data);
				break;
			case 'administrador':
				redirect(base_url().'index.php/admin');
				break;
			case 'editor':
				redirect(base_url().'index.php/trainer');
				break;	
			case 'suscriptor':
				redirect(base_url().'index.php/suscriptor');
				break;
			default:		
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login_view',$data);
				break;		
		}
	}

public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]');
 
            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = sha1($this->input->post('password'));
				$check_user = $this->login_model2->login_user($username,$password);
				if($check_user == TRUE)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id_user' 	=> 		$check_user->id_user,
	                'id_perfil'		=>		$check_user->id_perfil,
	                'admail' 		=> 		$check_user->ad_mail
            		);		
					$this->session->set_userdata($data);
					//$this->index();
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
		$this->load->view('Login_con');
	}
}
