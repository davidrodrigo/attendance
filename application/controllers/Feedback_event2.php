<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Feedback_event2 extends CI_Controller {
	
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
		$this->load->view('admin/feedback_event2_view',$data);
	}
	
	public function event2_process(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('id_edi_part', 'Edition - Part ID', 'required');
			// $this->form_validation->set_rules('hecho', 'hecho', 'required');
			$this->form_validation->set_rules('12C', 'Question 12', '');
			$this->form_validation->set_rules('13C', 'Question 13', 'required');
			$this->form_validation->set_rules('14C', 'Question 14', 'required');
			$this->form_validation->set_rules('15C', 'Question 15', 'required');
			$this->form_validation->set_rules('16C', 'Question 16', 'required');
			$this->form_validation->set_rules('comment_c', 'Question 17', '');
			
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
				redirect(base_url('index.php/Feedback_event2/index/'.$id_edi_part));
				
			}else{
			
				$id_edi_part = $this->input->post('id_edi_part');
				// $hecho = $this->input->post('hecho');
				$question_12c = $this->input->post('12C');
				$question_13c = $this->input->post('13C');
				$question_14c = $this->input->post('14C');
				$question_15c = $this->input->post('15C');
				$question_16c = $this->input->post('16C');
				$comment_c = $this->input->post('comment_c');
				
				$nueva_insercion = $this->Feedback_event2_model->add_event2(
					
					$id_edi_part,
					// $hecho,
					$question_12c,
					$question_13c,
					$question_14c,
					$question_15c,
					$question_16c,
					$comment_c
				);
			
			redirect(base_url('index.php/Feedback_general/index/'.$id_edi_part));
			//$this->load->view('Create_course', $table);
			
			}
		}
		
	}
	
}