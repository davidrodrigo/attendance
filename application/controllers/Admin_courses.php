<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_courses extends CI_Controller {
	
	
	public function index(){
		
		$id_edicion = $this->uri->segment(3);
			
		$datos = array(
		
			'disabled_curso' => 'disabled',	
			'visibility_curso' => '',
			'boton_curso' => 'form_hidden',
			
			'disabled_dias' => 'disabled',	
			'visibility_dias' => '',
			'boton_dias' => 'form_hidden'
		);
		
		$this->load->view('admin/admin_courses_view', $datos);
		
	}
	
	public function edit_curso(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
			'disabled_curso' => '',	
			'visibility_curso' => 'hidden',
			'boton_curso' => 'form_submit',
			
			'disabled_dias' => 'disabled',	
			'visibility_dias' => '',
			'boton_dias' => 'form_hidden'
				
		);
		
		$this->load->view('admin/admin_courses_view', $datos);		
	}

	public function cambiar_course(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('c_name', 'Course Name', 'required');
			$this->form_validation->set_rules('id_curso', 'Id Course', 'required');
			
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
				$this->load->view('admin/Admin_courses/index/');
				
			}else{
					
				$c_name = $this->input->post('c_name');
				$id_curso = $this->input->post('id_curso');
				$nueva_insercion = $this->Admin_courses_model->edit_course(
						$id_curso,
						$c_name
					);			
			redirect(base_url('index.php/Admin_courses/index/'.$id_curso, $datos));
			}					
		}		
	}

	public function edit_dias(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
			'disabled_curso' => 'disabled',	
			'visibility_curso' => '',
			'boton_curso' => 'form_hidden',
			
			'disabled_dias' => '',	
			'visibility_dias' => 'hidden',
			'boton_dias' => 'form_submit'
				
		);
		
		$this->load->view('admin/admin_courses_view', $datos);		
	}
	
	public function cambiar_dias(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('c_days', 'Course Name', 'required');
			$this->form_validation->set_rules('id_curso', 'Id Course', 'required');
			
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
				$this->load->view('admin/Admin_courses/index/');
				
			}else{
					
				$c_days = $this->input->post('c_days');
				$id_curso = $this->input->post('id_curso');
				
				$nueva_insercion = $this->Admin_courses_model->edit_days(
						$id_curso,
						$c_days
					);			
			redirect(base_url('index.php/Admin_courses/index/'.$id_curso, $datos));
			}					
		}		
	}
	
}