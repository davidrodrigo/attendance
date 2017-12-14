<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_edition extends CI_Controller {
	
	public function index() {
		
		$this->load->view('admin/create_edition_view');
		
	}
	
		
	public function elegir_curso(){
		
		if($this->input->post('submit')){
			
			$c_name = $this->input->post('c_name');
			
			$this->db->select('id_curso')
					 ->from('cursos')
					 ->where('c_name',$c_name);
			$query = $this->db->get();
			$id_curso = $query->row('id_curso');
			
			redirect(base_url('index.php/Create_edition/index/'.$id_curso));
		}
	}
	
		
	public function reg_process_edition(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('id_edicion', 'Edition Ref', 'required|is_unique[edicion.id_edicion]');
			$this->form_validation->set_rules('ed_name', 'Course Name', 'required');
			$this->form_validation->set_rules('id_curso', 'Course Ref', 'required');			
			$this->form_validation->set_rules('dob', 'Fecha', 'required');
			$this->form_validation->set_rules('dob2', 'Fecha', '');
			$this->form_validation->set_rules('dob3', 'Fecha', '');
			$this->form_validation->set_rules('ed_localization', 'Localization', 'required');
			$this->form_validation->set_rules('for_name', 'Trainer Name', 'required');
			
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
				$this->load->view('admin/create_edition_view/index');
				
			}else{
					
				$id_edicion = $this->input->post('id_edicion');
				$ed_name = $this->input->post('ed_name');
				$id_curso = $this->input->post('id_curso');
				$ed_fecha1 = date('Y-m-d', strtotime($this->input->post('dob')));
				$ed_fecha2 = date('Y-m-d', strtotime($this->input->post('dob2')));
				$ed_fecha3 = date('Y-m-d', strtotime($this->input->post('dob3')));
				$ed_localization = $this->input->post('ed_localization');
				
				$for_name = $this->input->post('for_name');
				$this->db->select('id_formador')
					 ->from('formador')
					 ->where('for_name',$for_name);
				$query = $this->db->get();
				$id_formador = $query->row('id_formador');
				
				$nueva_insercion = $this->Create_model->register_edition(
						$id_edicion,
						$ed_name,
						$id_curso,
						$ed_fecha1,
						$ed_fecha2,
						$ed_fecha3,
						$ed_localization,
						$id_formador
					);
			
			redirect(base_url('index.php/Create_edition/exito_registro'));
			//$this->load->view('Create_course', $table);
			
			}
					
		}
		
	}

	

	public function exito_registro(){
		
		redirect(base_url('index.php/Create_edition/index/index/exito'));
		
	}

}
		