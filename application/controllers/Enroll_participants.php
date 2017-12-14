<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enroll_participants extends CI_Controller {
	
	
	public function index(){
		
		// $id_part = $this->uri->segment(3);
			
		$this->load->view('admin/enroll_participants_view');
		
	}
	
	public function matricular_participante(){
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('p_name[]', 'Participant Name', 'required');
			$this->form_validation->set_rules('ed_name', 'Edition Name', 'required');
			
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
				redirect(base_url('index.php/Enroll_participantsssss/index/'));
				
			}else{
					
				$p_name = $this->input->post('p_name');
				$ed_name = $this->input->post('ed_name');
				
				$this->db->select('id_edicion')
						 ->where('ed_name',$ed_name);
				$query = $this->db->get('edicion');
				$id_edicion = $query->row('id_edicion');						
					
				$this->db->select('id_part')
							  ->where_in('p_name',$p_name);
				$query = $this->db->get('participante');
				$id_part[] = array();			
				foreach($query->result_array() as $row){
					$id_part = $row['id_part'];		
					$nueva_insercion = $this->Enroll_participants_model->matricular_participantes(
						$id_part,
						$id_edicion
					);						
				}
				
// 				
// 				
// 				
				redirect(base_url('index.php/Enroll_participants/index/'));
			}					
		}		
	}
	
}