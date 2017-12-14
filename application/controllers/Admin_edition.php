<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_edition extends CI_Controller {
	
	
	public function index(){
		
		$id_edicion = $this->uri->segment(3);
			
		$datos = array(
		
		'disabled_event' => 'disabled',	
		'disabled_days' => 'disabled',		
		'disabled_location' => 'disabled',	
		'disabled_course' => 'disabled',
		'disabled_trainer' => 'disabled',		
		'boton_event' => 'form_hidden',	
		'visibility_event' => '',	
		'boton_course' => 'form_hidden',	
		'visibility_course' => '',	
		
		'boton_days' => 'form_hidden',	
		'visibility_days' => '',	
		'boton_location' => 'form_hidden',	
		'visibility_location' => '',	
		'boton_trainer' => 'form_hidden',	
		'visibility_trainer' => '',	
		);
		
		$this->load->view('admin/admin_edition_view', $datos);
		
	}
	
	public function edit_event(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
		'disabled_event' => '',	
		'boton_event' => 'form_submit',	
		'visibility_event' => 'hidden',	
		'disabled_days' => 'disabled',		
		'disabled_location' => 'disabled',	
		
		'disabled_trainer' => 'disabled',		
		'disabled_course' => 'disabled',
		'boton_course' => 'form_hidden',	
		'visibility_course' => '',	
		'boton_days' => 'form_hidden',	
		'visibility_days' => '',	
		'boton_location' => 'form_hidden',	
		'visibility_location' => '',	
		'boton_trainer' => 'form_hidden',	
		'visibility_trainer' => ''	
				
		);
		
		$this->load->view('admin/admin_edition_view', $datos);		
	}

	public function cambiar_event(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('ed_name', 'Event Name', 'required');
			$this->form_validation->set_rules('id_edicion', 'Id Edicion', 'required');
			
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
					
				//$this->index();
				$this->load->view('admin/Admin_edition/index/');
				
			}else{
					
				$ed_name = $this->input->post('ed_name');
				$id_edicion = $this->input->post('id_edicion');
				
				$nueva_insercion = $this->Admin_edition_model->edit_event(
						$id_edicion,
						$ed_name
					);			
			redirect(base_url('index.php/Admin_edition/index/'.$id_edicion, $datos));
			}					
		}		
	}

	public function edit_course(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
		'disabled_event' => 'disabled',	
		'boton_event' => 'form_hidden',	
		'visibility_event' => '',	
		
		'disabled_course' => '',
		'boton_course' => 'form_submit',	
		'visibility_course' => 'hidden',
		'visibility_course_list' => 'hidden',	
		
		'disabled_days' => 'disabled',	
		'boton_days' => 'form_hidden',	
		'visibility_days' => '',		
		
		'disabled_location' => 'disabled',
		'boton_location' => 'form_hidden',	
		'visibility_location' => '',	
		
		'disabled_trainer' => 'disabled',		
		'boton_trainer' => 'form_hidden',	
		'visibility_trainer' => ''				
		);
		
		$this->load->view('admin/admin_edition_view', $datos);		
	}
	
	public function cambiar_curso(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('c_name', 'Course Name', 'required');
			$this->form_validation->set_rules('id_edicion', 'Id Edicion', 'required');
			
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
					
				//$this->index();
				$this->load->view('admin/Admin_edition/index/');
				
			}else{
					
				$c_name = $this->input->post('c_name');
				$id_edicion = $this->input->post('id_edicion');
				
				$nueva_insercion = $this->Admin_edition_model->edit_curso(
						$id_edicion,
						$c_name
					);			
			redirect(base_url('index.php/Admin_edition/index/'.$id_edicion, $datos));
			}					
		}		
	}
	
	
	public function edit_days(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
		'disabled_event' => 'disabled',	
		'boton_event' => 'form_hidden',	
		'visibility_event' => '',	
		
		'disabled_course' => 'disabled',
		'boton_course' => 'form_hidden',	
		'visibility_course' => '',	
		'visibility_course_list' => 'hidden',
		
		'disabled_days' => '',	
		'boton_days' => 'form_submit',	
		'visibility_days' => 'hidden',		
		
		'disabled_location' => 'disabled',
		'boton_location' => 'form_hidden',	
		'visibility_location' => '',	
		
		'disabled_trainer' => 'disabled',		
		'boton_trainer' => 'form_hidden',	
		'visibility_trainer' => ''				
		);
		
		$this->load->view('admin/admin_edition_view', $datos);		
	}
	
	public function cambiar_dias(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('dob', 'Day 1', 'required');
			$this->form_validation->set_rules('dob2', 'Day 2', '');
			$this->form_validation->set_rules('dob3', 'Day 3', '');
			$this->form_validation->set_rules('id_edicion', 'Id Edicion', 'required');
			
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
					
				//$this->index();
				$this->load->view('admin/Admin_edition/index/');
				
			}else{
					
				$ed_fecha1 = $this->input->post('dob');
				$ed_fecha2 = $this->input->post('dob2');
				$ed_fecha3 = $this->input->post('dob3');
				$id_edicion = $this->input->post('id_edicion');
				
				$nueva_insercion = $this->Admin_edition_model->edit_days(
						$id_edicion,
						$ed_fecha1,
						$ed_fecha2,
						$ed_fecha3
					);			
			redirect(base_url('index.php/Admin_edition/index/'.$id_edicion, $datos));
			}					
		}		
	}
	

	public function edit_location(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
		'disabled_event' => 'disabled',	
		'boton_event' => 'form_hidden',	
		'visibility_event' => '',	
		
		'disabled_course' => 'disabled',
		'boton_course' => 'form_hidden',	
		'visibility_course' => '',	
		'visibility_course_list' => 'hidden',
		
		'disabled_days' => 'disabled',	
		'boton_days' => 'form_hidden',	
		'visibility_days' => '',		
		
		'disabled_location' => '',
		'boton_location' => 'form_submit',	
		'visibility_location' => 'hidden',	
		
		'disabled_trainer' => 'disabled',		
		'boton_trainer' => 'form_hidden',	
		'visibility_trainer' => ''				
		);
		
		$this->load->view('admin/admin_edition_view', $datos);		
	}
	
	public function cambiar_localizacion(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('ed_localizacion', 'Event Location', 'required');
			$this->form_validation->set_rules('id_edicion', 'Id Edicion', 'required');
			
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
					
				//$this->index();
				$this->load->view('admin/Admin_edition_view');
				
			}else{
					
				$ed_localizacion = $this->input->post('ed_localizacion');
				$id_edicion = $this->input->post('id_edicion');
				
				$nueva_insercion = $this->Admin_edition_model->edit_location(
						$id_edicion,
						$ed_localizacion
					);			
			redirect(base_url('index.php/Admin_edition/index/'.$id_edicion, $datos));
			}					
		}		
	}
	

	public function edit_trainer(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
		'disabled_event' => 'disabled',	
		'boton_event' => 'form_hidden',	
		'visibility_event' => '',	
		
		'disabled_course' => 'disabled',
		'boton_course' => 'form_hidden',	
		'visibility_course' => '',	
		'visibility_course_list' => 'hidden',
		
		'disabled_days' => 'disabled',	
		'boton_days' => 'form_hidden',	
		'visibility_days' => '',		
		
		'disabled_location' => 'disabled',
		'boton_location' => 'form_hidden',	
		'visibility_location' => '',	
		
		'disabled_trainer' => '',		
		'boton_trainer' => 'form_submit',	
		'visibility_trainer' => 'hidden'				
		);
		
		$this->load->view('admin/admin_edition_view', $datos);		
	}

	public function cambiar_formador(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('for_name', 'Trainer Name', 'required');
			$this->form_validation->set_rules('id_edicion', 'Id Edicion', 'required');
			
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
					
				//$this->index();
				$this->load->view('admin/Admin_edition_view');
				
			}else{
					
				$for_name = $this->input->post('for_name');
				$id_edicion = $this->input->post('id_edicion');
				
				$nueva_insercion = $this->Admin_edition_model->edit_trainer(
						$id_edicion,
						$for_name
					);			
			redirect(base_url('index.php/Admin_edition/index/'.$id_edicion, $datos));
			}					
		}		
	}
	
}