<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_participant extends CI_Controller {
	
	public function index() {
		
		$this->load->view('admin/add_participant_view');
		
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
			$this->load->view('admin/add_participant_view');
		}
		

	public function reg_process_participant(){
		
		if($this->input->post('submit')){
			
			$p_name = $this->input->post('p_name');
			$this->db->select('id_part')
					 ->from('participante')
					 ->where('p_name',$p_name);
			$query = $this->db->get();
			$id_part = $query->row('id_part');
			
			
			if($id_part > 0){
				
				$this->form_validation->set_rules('p_name', 'Participant Name', 'required');
				$this->form_validation->set_rules('p_pass', 'participant Password', 'required');
				$this->form_validation->set_rules('password2', 'Password', 'required|matches[p_pass]');
				$this->form_validation->set_rules('p_email', 'Participant Email', "valid_email|required");
				
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
				$this->form_validation->set_message('is_unique', 'Participant %s already exist in our Data Base');
				
				if(!$this->form_validation->run()){
						
					//$this->index();
					$this->load->view('admin/add_participant_view');
					
				}else{
						
					$participant_name = $this->input->post('p_name');
					$participant_pass = sha1($this->input->post('p_pass'));
					$participant_email = $this->input->post('p_email');			
					
					$nueva_insercion = $this->Create_model->register_participant(
						$participant_pass,
						$participant_name,
						$participant_email
					);
				
				redirect(base_url('index.php/Add_participant/exito_registro'));
				//$this->load->view('Create_course', $table);
				
				}
			
				
			} else {
				
				redirect(base_url('index.php/Add_participant/exito_registro/'.$id_part));
				
			}
			
			
					
		}
		
	}

	public function exito_registro(){
		
		redirect(base_url('index.php/Add_participant/index/index/exito'));
		
	}

}
		