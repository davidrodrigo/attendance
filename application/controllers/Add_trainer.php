<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_trainer extends CI_Controller {
	
	public function index() {
		
		$this->load->view('admin/add_trainer_view');
		
	}
	
	//crear tabla
	public function create()
	{
	    $table = $this->input->post('table');
	    $this->Create_model->create($table);
		$this->load->view('admin/create_view');
		return $table;
	}  
	
	public function register(){
			$this->load->view('admin/create_course_view');
		}
		

	public function reg_process_trainer(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('for_name', 'Trainer Name', 'required');
			$this->form_validation->set_rules('password', 'Trainer Password', 'required');
			$this->form_validation->set_rules('password2', 'Password', 'required|matches[password]');
			$this->form_validation->set_rules('username', 'Email del Formador', "valid_email|is_unique[formador.username]");
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');	
			//Comprobamos que las contraseñas coincidan
			$this->form_validation->set_message('matches', 'Password doesn´t match');
			//Comprobar que no exista el formador
			$this->form_validation->set_message('is_unique', 'Trainer %s already exist in our Data Base');
			
			if(!$this->form_validation->run()){
					
				//$this->index();
				$this->load->view('admin/add_trainer_view');
				
			}else{
					
				$trainer_name = $this->input->post('for_name');
				$trainer_pass = sha1($this->input->post('password'));
				$trainer_email = $this->input->post('username');			
				
				$nueva_insercion = $this->Create_model->register_trainer(
					$trainer_pass,
					$trainer_name,
					$trainer_email
				);
			
			redirect(base_url('index.php/Add_trainer/exito_registro'));
			//$this->load->view('Create_course', $table);
			
			}
					
		}
		
	}

	public function exito_registro(){
		
		redirect(base_url('index.php/Add_trainer/index/exito'));
		
	}

}
		