<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_participants extends CI_Controller {
	
	
	public function index(){
		
		$id_part = $this->uri->segment(3);
			
		$datos = array(
		
			'disabled_nombre' => 'disabled',	
			'visibility_nombre' => '',
			'boton_nombre' => 'form_hidden',
			
			'disabled_email' => 'disabled',	
			'visibility_email' => '',
			'boton_email' => 'form_hidden',
			
			'visibility_alt_email' => 'hidden',
			'visibility_boton_email' => ''
		);
		
		$this->load->view('admin/admin_participants_view', $datos);
		
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
			
			'visibility_alt_email' => 'hidden',
			'visibility_boton_email' => ''
				
		);
		
		$this->load->view('admin/admin_participants_view', $datos);		
	}

	public function cambiar_nombre(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('p_name', 'Participant Name', 'required');
			$this->form_validation->set_rules('id_part', 'Id Participant', 'required');
			
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
				redirect(base_url('index.php/Admin_participants/index/'.$id_part, $datos));
				
			}else{
					
				$p_name = $this->input->post('p_name');
				$id_part = $this->input->post('id_part');
				$nueva_insercion = $this->Admin_participants_model->edit_nombre(
						$p_name,
						$id_part
					);			
			redirect(base_url('index.php/Admin_participants/index/'.$id_part, $datos));
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
			
			'visibility_alt_email' => 'hidden',
			'visibility_boton_email' => ''		
		);		
		$this->load->view('admin/admin_participants_view', $datos);		
	}

	public function cambiar_email(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('p_email', 'Participant Email', 'required');
			$this->form_validation->set_rules('id_part', 'Id Participant', 'required');
			
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
				redirect(base_url('index.php/Admin_participants/index/'.$id_part, $datos));
				
			}else{
					
				$p_email = $this->input->post('p_email');
				$id_part = $this->input->post('id_part');
				$nueva_insercion = $this->Admin_participants_model->edit_email(
						$p_email,
						$id_part
					);			
			redirect(base_url('index.php/Admin_participants/index/'.$id_part, $datos));
			}					
		}		
	}
	
	public function edit_alt_email(){
		//$id_edicion = $this->uri->segment(3);	
		$datos = array(
		
			'disabled_nombre' => 'disabled',	
			'visibility_nombre' => '',
			'boton_nombre' => 'form_hidden',
			
			'disabled_email' => 'disabled',	
			'visibility_email' => '',
			'boton_email' => 'form_hidden',
			
			'visibility_alt_email' => '',
			'visibility_boton_email' => 'hidden'
		);
		$this->load->view('admin/admin_participants_view', $datos);		
	}
	
	
	public function cambiar_alt_email(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('alt_email', 'Participant Email', 'required');
			$this->form_validation->set_rules('id_part', 'Id Participant', 'required');
			$this->form_validation->set_rules('nuevo_email', 'Nuevo Email', 'required|valid_email');
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
					
				$alt_email = $this->input->post('alt_email');	
				$id_part = $this->input->post('id_part');
				redirect(base_url('index.php/Admin_participantssssss/index/'.$id_part.$alt_email, $datos));
				
			}else{
				$alt_email = $this->input->post('alt_email');
				$id_part = $this->input->post('id_part');
				$nuevo_email = $this->input->post('nuevo_email');
				
				$nueva_insercion = $this->Admin_participants_model->edit_alt_email(						
						$id_part,
						$alt_email,
						$nuevo_email				
					);			
			redirect(base_url('index.php/Admin_participants/index/'.$id_part, $datos));
			}					
		}		
	}

	public function matricular_participante(){
		$this->form_validation->set_rules('ed_name', 'Participant Name', 'required');
		// $this->form_validation->set_rules('id_part', 'ID Participante', 'required');
		if(!$this->form_validation->run()){
			$ed_name = $this->input->post('ed_name');	
			$id_part = $this->input->post('id_part');
			redirect(base_url('index.php/Admin_participantssssss/index/'.$id_part, $datos));
		}else{
			$ed_name = $this->input->post('ed_name');	
			$id_part = $this->input->post('id_part');
			// $id_part = $this->input->post('id_part');
			
			$this->db->select('id_edicion')
					 ->where('ed_name',$ed_name);
			$query = $this->db->get('edicion');
			$id_edicion = $query->row('id_edicion');
			
			$nueva_insercion = $this->Admin_participants_model->enroll_part(
					$ed_name,
					$id_part,
					$id_edicion
					);
			redirect(base_url('index.php/Admin_participants/index/'.$id_part, $datos));
		}

	}

	
}