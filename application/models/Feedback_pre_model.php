<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Feedback_pre_model extends CI_Model {
	

	function __construct() 
	{        
	    parent::__construct();    
	}     
	
	
	public function add_pre_event(
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
					){			
		
		$data = array(
				// $ed_name,
				// $ed_fecha1,
				// $ed_location,
				// $for_name,
				'id_edi_part' => $id_edi_part,
				'hecho' => $hecho,
				'1a' => $question_1a,
				'2a' => $question_2a,
				'3a' => $question_3a,
				'4a' => $comment_a
			);
		
		$this->db->insert('pre_event',$data);
		// $this->db->select('id_part')
				 // ->from('participante')
				 // ->where('p_name', $part_name);
		// $query = $this->db->get();
		// $id_part = $query->row('id_part');
// 		
		// $datos = array(
			// 'id_part' => $id_part,
			// 'id_edicion' => $c_ref);
		// $this->db->insert('edi_part', $datos);
		
	}	
   
}