<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Feedback_pre extends CI_Controller {
	
	// public function __construct() {
		// parent::__construct();
		// $this->load->library(array('session','form_validation'));
		// $this->load->helper(array('url','form'));
		// $this->load->database('default');
	// }
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'suscriptor')
		{
			redirect(base_url().'index.php');
		}
		$data['titulo'] = 'Bienvenido de nuevo ' .$this->session->userdata('perfil');
		$this->load->view('admin/feedback_pre_view',$data);
	}
	
	public function pre_event_process(){
		
		if($this->input->post('submit')){
			
			// $this->form_validation->set_rules('ed_name', 'Edition Name', 'required');					
			// $this->form_validation->set_rules('ed_fecha1', 'Edition Start Date', "required");
			// $this->form_validation->set_rules('ed_location', 'Edition Location','required');			
			// $this->form_validation->set_rules('for_name', 'Trainer Name', 'required');
			$this->form_validation->set_rules('id_edi_part', 'Edition - Part ID', 'required');
			$this->form_validation->set_rules('hecho', 'hecho', 'required');
			$this->form_validation->set_rules('1A', 'Question 1', 'required');
			$this->form_validation->set_rules('2A', 'Question 2', 'required');
			$this->form_validation->set_rules('3A', 'Question 3', 'required');
			$this->form_validation->set_rules('comment_a', 'Question 5', '');
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');
			
			if(!$this->form_validation->run()){
					
				$id_edi_part = $this->input->post('id_edi_part');
				redirect(base_url('index.php/Feedback_pre/index/'.$id_edi_part));
				
			}else{
			
				// $ed_name = $this->input->post('ed_name');
				// $ed_fecha1 = $this->input->post('ed_fecha1');
				// $ed_location = $this->input->post('ed_location');
				// $for_name = $this->input->post('for_name');
				$id_edi_part = $this->input->post('id_edi_part');
				$hecho = $this->input->post('hecho');
				$question_1a = $this->input->post('1A');
				$question_2a = $this->input->post('2A');
				$question_3a = $this->input->post('3A');
				$comment_a = $this->input->post('comment_a');
				
				$nueva_insercion = $this->Feedback_pre_model->add_pre_event(
					// $ed_name,
					// $ed_fecha1,
					// $ed_location,
					// $for_name,
					$id_edi_part,
					$hecho,
					$question_1a,
					$question_2a,
					$question_3a,
					$comment_a
				);
			
			redirect(base_url('index.php/Feedback_event/index/'.$id_edi_part));
			//$this->load->view('Create_course', $table);
			
			}
		}
		
	}
	
}