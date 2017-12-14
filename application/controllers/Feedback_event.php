<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Feedback_event extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
	}
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'suscriptor')
		{
			redirect(base_url().'index.php');
		}
		$data['titulo'] = 'Bienvenido de nuevo ' .$this->session->userdata('perfil');
		$this->load->view('admin/feedback_event_view',$data);
	}
	
	public function event_process(){
		
		if($this->input->post('submit')){
			
			// $this->form_validation->set_rules('ed_name', 'Edition Name', 'required');					
			// $this->form_validation->set_rules('ed_fecha1', 'Edition Start Date', "required");
			// $this->form_validation->set_rules('ed_location', 'Edition Location','required');			
			// $this->form_validation->set_rules('for_name', 'Trainer Name', 'required');
			$this->form_validation->set_rules('id_edi_part', 'Edition - Part ID', 'required');
			// $this->form_validation->set_rules('hecho', 'hecho', 'required');
			$this->form_validation->set_rules('5B', 'Question 5', '');
			$this->form_validation->set_rules('6B', 'Question 6', 'required');
			$this->form_validation->set_rules('7B', 'Question 7', 'required');
			$this->form_validation->set_rules('8B', 'Question 8', 'required');
			$this->form_validation->set_rules('9B', 'Question 9', 'required');
			$this->form_validation->set_rules('10B', 'Question 10', 'required');
			$this->form_validation->set_rules('comment_B', 'Question 11', '');
			
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
				redirect(base_url('index.php/Feedback_event/index/'.$id_edi_part));
				
			}else{
			
				// $ed_name = $this->input->post('ed_name');
				// $ed_fecha1 = $this->input->post('ed_fecha1');
				// $ed_location = $this->input->post('ed_location');
				// $for_name = $this->input->post('for_name');
				$id_edi_part = $this->input->post('id_edi_part');
				// $hecho = $this->input->post('hecho');
				$question_5b = $this->input->post('5B');
				$question_6b = $this->input->post('6B');
				$question_7b = $this->input->post('7B');
				$question_8b = $this->input->post('8B');
				$question_9b = $this->input->post('9B');
				$question_10b = $this->input->post('10B');
				$comment_b = $this->input->post('comment_b');
				
				$nueva_insercion = $this->Feedback_event_model->add_event(
					// $ed_name,
					// $ed_fecha1,
					// $ed_location,
					// $for_name,
					$id_edi_part,
					// $hecho,
					$question_5b,
					$question_6b,
					$question_7b,
					$question_8b,
					$question_9b,
					$question_10b,
					$comment_b
				);
			
			redirect(base_url('index.php/Feedback_event2/index/'.$id_edi_part));
			//$this->load->view('Create_course', $table);
			
			}
		}
		
	}
	
}