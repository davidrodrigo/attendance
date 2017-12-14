<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Feedback_event2_model extends CI_Model {
	

	function __construct() 
	{        
	    parent::__construct();    
	}     
	
	
	public function add_event2(
					
					$id_edi_part,
					// $hecho,
					$question_12c,
					$question_13c,
					$question_14c,
					$question_15c,
					$question_16c,
					$comment_c
					){			
		
		$data = array(
				
				// 'id_edi_part' => $id_edi_part,
				// 'hecho' => $hecho,
				'12c' => 	$question_12c,
				'13c' =>	$question_13c,
				'14c' =>	$question_14c,
				'15c' =>	$question_15c,
				'16c' =>	$question_16c,
				'17c' =>	$comment_c
			);
		
		$this->db->where('id_edi_part', $id_edi_part)
				 ->update('event', $data);	
	}	
   
}