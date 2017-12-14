<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Feedback_general extends CI_Controller {
	
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
		$this->load->view('admin/feedback_general_view',$data);
	}
	
	public function general_process(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('id_edi_part', 'Edition - Part ID', 'required');
			// $this->form_validation->set_rules('hecho', 'hecho', 'required');
			$this->form_validation->set_rules('18D', 'Question 18', '');
			$this->form_validation->set_rules('19D', 'Question 19', '');
			
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
				redirect(base_url('index.php/Feedback_general/index/'.$id_edi_part));
				
			}else{
			
				$id_edi_part = $this->input->post('id_edi_part');
				// $hecho = $this->input->post('hecho');
				$question_18d = $this->input->post('18D');
				$question_19d = $this->input->post('19D');
				
				$nueva_insercion = $this->Feedback_general_model->add_general(
					
					$id_edi_part,
					// $hecho,
					$question_18d,
					$question_19d
				);
			
			redirect(base_url('index.php/Feedback_finished/index/'.$id_edi_part));
			//$this->load->view('Create_course', $table);
			
			}
		}
		
	}
	
}