<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_trainers extends CI_Controller {
	
	
	public function index(){
		
		$id_edicion = $this->uri->segment(3);
			
		$datos = array(
		
			'disabled_nombre' => 'disabled',	
			'visibility_nombre' => '',
			'boton_nombre' => 'form_hidden',
			
			'disabled_email' => 'disabled',	
			'visibility_email' => '',
			'boton_email' => 'form_hidden',

			'disabled_password' => 'disabled',	
			'visibility_password' => '',
			'visibility_password2' => FALSE,
			'boton_password' => 'form_hidden'
		);
		
		$this->load->view('admin/admin_trainers_view', $datos);
		
	}
	
	public function edit_nombre(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
			'disabled_nombre' => '',	
			'visibility_nombre' => 'hidden',
			'boton_nombre' => 'form_submit',
			
			'disabled_email' => 'disabled',	
			'visibility_email' => '',
			'boton_email' => 'form_hidden',

			'disabled_password' => 'disabled',	
			'visibility_password' => '',
			'visibility_password2' => FALSE,
			'boton_password' => 'form_hidden'
				
		);
		
		$this->load->view('admin/admin_trainers_view', $datos);		
	}

	public function cambiar_nombre(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('for_name', 'Course Name', 'required');
			$this->form_validation->set_rules('id_formador', 'Id Course', 'required');
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Field %s is required');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', '%s is not a valid email');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');	
			//Comprobamos que no exista esa referencia en la Base de Datos
			$this->form_validation->set_message('is_unique', 'Ref %s already exist in our Data Base');
			
			if(!$this->form_validation->run()){
					
				$id_formador = $this->input->post('id_formador');
				$this->load->view('admin/Admin_trainers/index/'.$id_formador, $datos);
				
			}else{
					
				$for_name = $this->input->post('for_name');
				$id_formador = $this->input->post('id_formador');
				$nueva_insercion = $this->Admin_trainers_model->edit_name(
						$id_formador,
						$for_name
					);			
			redirect(base_url('index.php/Admin_trainers/index/'.$id_formador, $datos));
			}					
		}		
	}

	public function edit_email(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
			'disabled_nombre' => 'disabled',	
			'visibility_nombre' => '',
			'boton_nombre' => 'form_hidden',
			
			'disabled_email' => '',	
			'visibility_email' => 'hidden',
			'boton_email' => 'form_submit',

			'disabled_password' => 'disabled',	
			'visibility_password' => '',
			'visibility_password2' => FALSE,
			'boton_password' => 'form_hidden'		
		);
		
		$this->load->view('admin/admin_trainers_view', $datos);		
	}
	
	public function cambiar_email(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('for_email', 'Course Name', 'required');
			$this->form_validation->set_rules('id_formador', 'Id Course', 'required');
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Field %s is required');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', '%s is not a valid email');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');	
			//Comprobamos que no exista esa referencia en la Base de Datos
			$this->form_validation->set_message('is_unique', 'Ref %s already exist in our Data Base');
			
			if(!$this->form_validation->run()){
					
				$id_formador = $this->input->post('id_formador');
				$this->load->view('admin/Admin_trainers/index/'.$id_formador, $datos);
				
			}else{
					
				$for_email = $this->input->post('for_email');
				$id_formador = $this->input->post('id_formador');
				
				$nueva_insercion = $this->Admin_trainers_model->edit_email(
						$id_formador,
						$for_email
					);			
			redirect(base_url('index.php/Admin_trainers/index/'.$id_formador, $datos));
			}					
		}		
	}
	
	public function edit_password(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
			'disabled_nombre' => 'disabled',	
			'visibility_nombre' => '',
			'boton_nombre' => 'form_hidden',
			
			'disabled_email' => 'disabled',	
			'visibility_email' => '',
			'boton_email' => 'form_hidden',	

			'disabled_password' => '',	
			'visibility_password' => 'hidden',
			'visibility_password2' => TRUE,
			'boton_password' => 'form_submit'		
		);
		
		$this->load->view('admin/admin_trainers_view', $datos);		
	}

	public function cambiar_password(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('for_password', 'Password', 'required');
			$this->form_validation->set_rules('id_formador', 'Id Course', 'required');
			$this->form_validation->set_rules('for_password2', 'Password2', 'required|matches[for_password]' );
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Field %s is required');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', '%s is not a valid email');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');	
			//Comprobamos que no exista esa referencia en la Base de Datos
			$this->form_validation->set_message('is_unique', 'Ref %s already exist in our Data Base');
			$this->form_validation->set_message('matches', 'Passwords not matches');
			
			if(!$this->form_validation->run()){

				$datos = array(
		
					'disabled_nombre' => 'disabled',	
					'visibility_nombre' => '',
					'boton_nombre' => 'form_hidden',
					
					'disabled_email' => 'disabled',	
					'visibility_email' => '',
					'boton_email' => 'form_hidden',	

					'disabled_password' => '',	
					'visibility_password' => 'hidden',
					'visibility_password2' => TRUE,
					'boton_password' => 'form_submit'		
				);
					
				$id_formador = $this->input->post('id_formador');
				$this->load->view('admin/Admin_trainers/index/'.$id_formador, $datos);
				
			}else{
					
				$for_password = sha1($this->input->post('for_password'));
				$id_formador = $this->input->post('id_formador');
				
				$nueva_insercion = $this->Admin_trainers_model->edit_password(
						$id_formador,
						$for_password
					);			
			redirect(base_url('index.php/Admin_trainers/index/'.$id_formador, $datos));
			}					
		}		
	}

}