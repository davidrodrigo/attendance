<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Part_list_model extends CI_Model {
	

	function __construct() 
	{        
	    parent::__construct();    
	}     

	public function asistencia1(
						$p_active1,
						$id_edi_part	
					){
		
		if($p_active1 > 0){
			$p_active1 = 0;
		}else{
			$p_active1 = 1;
		}
		
		$data = array(
			'activo1' => $p_active1,
			
			);
		$this->db->where('id_edi_part', $id_edi_part);
		$this->db->update('edi_part',$data);
			
		}	
					
		public function asistencia2(
						$p_active2,
						$id_edi_part	
					){
		
		if($p_active2 > 0){
			$p_active2 = 0;
		}else{
			$p_active2 = 1;
		}
		
		$data = array(
			'activo2' => $p_active2,
			
			);
		$this->db->where('id_edi_part', $id_edi_part);
		$this->db->update('edi_part',$data);
			
		}	
					
		public function asistencia3(
						$p_active3,
						$id_edi_part	
					){
		
		if($p_active3 > 0){
			$p_active3 = 0;
		}else{
			$p_active3 = 1;
		}
		
		$data = array(
			'activo3' => $p_active3,
			
			);
		$this->db->where('id_edi_part', $id_edi_part);
		$this->db->update('edi_part',$data);
			
		}	
		
		public function agregar_nuevo_participante(
						$part_name,
						$part_email,
						
						$c_ref,
						$comment
						){			
			
			$data = array(
				'p_name' => $part_name,
				'p_email' => $part_email,
				
				'comentario' => $comment
				);
			//aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
			//y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
			//envíar un email, en fin, lo que deseemos hacer
			$this->db->insert('participante',$data);
			$this->db->select('id_part')
					 ->from('participante')
					 ->where('p_name', $part_name);
			$query = $this->db->get();
			$id_part = $query->row('id_part');
			
			$datos = array(
				'id_part' => $id_part,
				'id_edicion' => $c_ref);
			$this->db->insert('edi_part', $datos);
			
		}	
   
}