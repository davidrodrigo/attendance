<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Part_list_con extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
		$this->load->model('part_list_model');
	}
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') == 'participante')
		{
			redirect(base_url().'index.php/');
		}
		$data['titulo'] = 'Bienvenido de nuevo ' .$this->session->userdata('perfil');
		$this->load->view('admin/part_list_view',$data);
	}
	
	public function cambiar_asistencia_dia3(){
		
		if($this->input->post('submit')){
			
			// $this->form_validation->set_rules('p_name', 'p_name', 'required');
			$this->form_validation->set_rules('p_active3', 'Activo', 'required');	
			$this->form_validation->set_rules('id_edi_part', 'Referencia', 'required');	
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');	
			
			if(!$this->form_validation->run()){
					
				$this->index();
				$this->load->view('admin/part_list_view');
				
			}else{
					
				$p_active3 = $this->input->post('p_active3');
				$id_edi_part = $this->input->post('id_edi_part');
				$c_ref = $this->input->post('c_ref');
				
				$nueva_activo = $this->part_list_model->asistencia3(
					$p_active3,
					$id_edi_part
				);
			
			redirect(base_url('index.php/Part_list_con/index/'.$c_ref));
			
			//$this->load->view('admin/part_list_view/"$c_ref"');
			
			}
					
		}
		
	}

	public function cambiar_asistencia_all_dia3(){
		
		$ref_curso = $this->uri->segment(3);
		
		$query = $this->db->query("SELECT activo3 FROM edi_part WHERE id_edicion='$ref_curso' ");
		foreach($query->result_array() as $row){
			
			 $activo3 = $row['activo3'];
			 
			 if($activo3 > 0){
			 	
				$data = array(
				'activo3' => 0,
				
				);
				$this->db->where('id_edicion', $ref_curso);
				$this->db->update('edi_part',$data);
					
			 }else{
			 	
				$data = array(
				'activo3' => 1,
				
				);
				$this->db->where('id_edicion', $ref_curso);
				$this->db->update('edi_part',$data);
				
			 }	
						
		}		
				
		redirect(base_url('index.php/Part_list_con/index/'.$ref_curso));
		
	}

	public function cambiar_asistencia_dia1(){
		
		if($this->input->post('submit')){
			
			// $this->form_validation->set_rules('p_name', 'p_name', 'required');
			$this->form_validation->set_rules('p_active1', 'Activo', 'required');	
			$this->form_validation->set_rules('c_ref', 'Referencia Edicion', 'required');	
			$this->form_validation->set_rules('id_edi_part', 'Referencia', 'required');
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');	
			
			if(!$this->form_validation->run()){
					
				$this->index();
				$this->load->view('admin/part_list_view/hola_mundo');
				
			}else{
					
				$p_active1 = $this->input->post('p_active1');
				$id_edi_part = $this->input->post('id_edi_part');
				$c_ref = $this->input->post('c_ref');
				
				$nueva_activo = $this->part_list_model->asistencia1(
					$p_active1,
					$id_edi_part
				);
			
			redirect(base_url('index.php/Part_list_con/index/'.$c_ref));
			
			//$this->load->view('admin/part_list_view/"$c_ref"');
			
				}
						
			}
			
		}

	public function cambiar_asistencia_all_dia1(){
		
		$ref_curso = $this->uri->segment(3);
		
		$query = $this->db->query("SELECT activo1 FROM edi_part WHERE id_edicion='$ref_curso' ");
		foreach($query->result_array() as $row){
			
			 $activo1 = $row['activo1'];
			 
			 if($activo1 > 0){
			 	
				$data = array(
				'activo1' => 0,
				
				);
				$this->db->where('id_edicion', $ref_curso);
				$this->db->update('edi_part',$data);
					
			 }else{
			 	
				$data = array(
				'activo1' => 1,
				
				);
				$this->db->where('id_edicion', $ref_curso);
				$this->db->update('edi_part',$data);
				
			 }	
						
		}		
				
		redirect(base_url('index.php/Part_list_con/index/'.$ref_curso));
		
	}

	public function cambiar_asistencia_dia2(){
		
		if($this->input->post('submit')){
			
			
			$this->form_validation->set_rules('p_active2', 'Activo', 'required');	
			$this->form_validation->set_rules('c_ref', 'Referencia', 'required');	
			$this->form_validation->set_rules('id_edi_part', 'Referencia', 'required');
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');	
			
			if(!$this->form_validation->run()){
					
				$this->index();
				$this->load->view('admin/part_list_view');
				
			}else{
					
				$p_active2 = $this->input->post('p_active2');
				$id_edi_part = $this->input->post('id_edi_part');
				$c_ref = $this->input->post('c_ref');
				
				$nueva_activo = $this->part_list_model->asistencia2(
					$p_active2,
					$id_edi_part
				);
			
			redirect(base_url('index.php/Part_list_con/index/'.$c_ref));
			
			//$this->load->view('admin/part_list_view/"$c_ref"');
			
			}
					
		}
		
	}

	public function cambiar_asistencia_all_dia2(){
		
		$ref_curso = $this->uri->segment(3);
		
		$query = $this->db->query("SELECT activo2 FROM edi_part WHERE id_edicion='$ref_curso' ");
		foreach($query->result_array() as $row){
			
			 $activo2 = $row['activo2'];
			 
			 if($activo2 > 0){
			 	
				$data = array(
				'activo2' => 0,
				
				);
				$this->db->where('id_edicion', $ref_curso);
				$this->db->update('edi_part',$data);
					
			 }else{
			 	
				$data = array(
				'activo2' => 1,
				
				);
				$this->db->where('id_edicion', $ref_curso);
				$this->db->update('edi_part',$data);
				
			 }	
						
		}		
				
		redirect(base_url('index.php/Part_list_con/index/'.$ref_curso));
		
	}

	public function agregar_participante(){
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('part_name', 'Participant Name', 'required');					
			$this->form_validation->set_rules('p_email', 'Participant Email', "valid_email|required");
			// $this->form_validation->set_rules('password', 'Participant Password','required');			
			$this->form_validation->set_rules('c_ref', 'Referencia', '');
			$this->form_validation->set_rules('comment', 'Comments', '');
			
			//validamos que se introduzcan los campos requeridos con la función de ci required
			$this->form_validation->set_message('required', 'Campo %s es obligatorio');
			//validamos el email con la función de ci valid_email
			$this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
			//comprobamos que se cumpla el mínimo de caracteres introducidos
			$this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
			//comprobamos que se cumpla el máximo de caracteres introducidos
			$this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');
			
			if(!$this->form_validation->run()){					
				$c_ref = $this->input->post('c_ref');
				redirect(base_url('index.php/Part_list_con/index/index/'.$c_ref));				
			}else{			
				$part_name = $this->input->post('part_name');
				$part_email = $this->input->post('p_email');
				
				$c_ref = $this->input->post('c_ref');
				$comment = $this->input->post('comment');
				
				$nueva_insercion = $this->part_list_model->agregar_nuevo_participante(
					$part_name,
					$part_email,					
					$c_ref,
					$comment
				);
			redirect(base_url('index.php/Part_list_con/index/'.$c_ref));			
			}
		}
	}

	public function enviar_attendance(){
		
		$ref_curso = $this->uri->segment(3);
		
		$this->db->select('ed_name')
						 ->from('edicion')
						 ->where('id_edicion', $ref_curso);
		$query = $this->db->get();
		$nombre_edicion = $query->row('ed_name');
		
		$query = $this->db->query("SELECT id_part, activo1, activo2, activo3 FROM edi_part WHERE id_edicion='$ref_curso' ");
		foreach($query->result_array() as $row){
			
			$id_part = $row['id_part'];
			$activo1 = $row['activo1'];
			$activo2 = $row['activo2'];
			$activo3 = $row['activo3'];
			
			
			
			$query = $this->db->query("SELECT p_name, p_email FROM participante WHERE id_part='$id_part' ");
			foreach($query->result_array() as $row){
				
				$p_name = $row['p_name'];
				$p_email = $row['p_email'];
				
				$this->load->library("email");
				$this->email->initialize();
			
				 $this->email->from('Admin');
				 $this->email->to($p_email);
				 
				 $this->email->subject('Attendance from '.$nombre_edicion);
				 $this->email->message('<h2>Este es un mensaje de prueba</h2>');
				 $this->email->send();
				 //con esto podemos ver el resultado
				 var_dump($this->email->print_debugger());
				
				
			}
			
			
			
			
		}
		
		// $this->load->library("email");
		// $this->email->initialize();
		
		//  $this->email->from('nombre o correo que envia');
		//  $this->email->to("para quien es");
		//  $this->email->subject('Bienvenido/a a uno-de-piera.com');
		//  $this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail</h2><hr><br> Bienvenido al blog');
		//  $this->email->send();
		//  //con esto podemos ver el resultado
		//  var_dump($this->email->print_debugger());
 }
		
		
	}
 
	
