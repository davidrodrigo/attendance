<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_course extends CI_Controller {
	
	public function index() {
		
		$this->load->view('admin/create_course_view');
		
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
		
		
	public function reg_process_course(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('id_curso', 'Course Ref', 'required|is_unique[cursos.id_curso]');
			$this->form_validation->set_rules('c_name', 'Course Name', 'required');
			// $this->form_validation->set_rules('dob', 'Fecha', 'required');
			$this->form_validation->set_rules('c_days', 'Duracion', 'required');
			// $this->form_validation->set_rules('c_location', 'Localizacion', 'required');
			// $this->form_validation->set_rules('c_room', 'Room', '');			
			
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
				$this->load->view('admin/create_course_view');
				
			}else{
					
				$course_ref = $this->input->post('id_curso');
				$course_name = $this->input->post('c_name');
				// $course_room = $this->input->post('c_room');
				// $course_date = date('Y-m-d', strtotime($this->input->post('dob')));
				$course_days = $this->input->post('c_days');
				
				$nueva_insercion = $this->Create_model->register_course(
					$course_ref,
					$course_name,
					$course_days
				);
			
			redirect(base_url('index.php/Create_course/exito_registro'));
			//$this->load->view('Create_course', $table);
			
			}
					
		}
		
	}

	public function reg_process_trainer(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('t_ref', 'Trainer Ref', 'required|is_unique[trainer.t_ref]');
			$this->form_validation->set_rules('t_name', 'Nombre del Formador', '');
			$this->form_validation->set_rules('t_email', 'Email del Formador', "valid_email");
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');	
			
			if(!$this->form_validation->run()){
					
				//$this->index();
				$this->load->view('admin/create_course_view');
				
			}else{
					
				$trainer_ref = $this->input->post('t_ref');
				$trainer_name = $this->input->post('t_name');
				$trainer_email = $this->input->post('t_email');			
				
				$nueva_insercion = $this->Create_model->register_trainer(
					$trainer_ref,
					$trainer_name,
					$trainer_email
				);
			
			redirect(base_url('index.php/Create_course'));
			//$this->load->view('Create_course', $table);
			
			}
					
		}
		
	}
		
		
		
	public function reg_process_student(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('p_name', 'Participant Name', 'required');
			$this->form_validation->set_rules('p_curso', 'Participant Curso', 'required');
			$this->form_validation->set_rules('p_department', 'Participant Department', 'required');			
			$this->form_validation->set_rules('p_email', 'Participant Email', "valid_email");
			$this->form_validation->set_rules('p_trainer', 'Trainer', '');
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');
			
			if(!$this->form_validation->run()){					
				//$this->index();
				$this->load->view('admin/create_course_view');
				
			}else{
			
				$part_name = $this->input->post('p_name');
				$part_email = $this->input->post('p_email');
				$part_department = $this->input->post('p_department');
				$part_trainer = $this->input->post('p_trainer');
				$part_curso = $this->input->post('p_curso');
				
				$nueva_insercion = $this->Create_model->register_user(
					$part_name,
					$part_email,
					$part_department,
					$part_trainer,
					$part_curso
				);
			
			redirect(base_url('index.php/Create_course'));
			//$this->load->view('Create_course', $table);
			
			}
		}
	}

	public function exito_registro(){
		
		redirect(base_url('index.php/Create_course/index/exito'));
		
	}

}
		