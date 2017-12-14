<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Feedback_event_model extends CI_Model {
	

	function __construct() 
	{        
	    parent::__construct();    
	}     
	
	
	public function add_event(
					
					$id_edi_part,
					// $hecho,
					$question_5b,
					$question_6b,
					$question_7b,
					$question_8b,
					$question_9b,
					$question_10b,
					$comment_b
					){			
		
		$data = array(
				
				'id_edi_part' => $id_edi_part,
				// 'hecho' => $hecho,
				'5b' => $question_5b,
				'6b' => $question_6b,
				'7b' => $question_7b,
				'8b' => $question_8b,
				'9b' => $question_9b,
				'10b' => $question_10b,
				'11b' => $comment_b
			);
		
		$this->db->insert('event',$data);		
	}	
   
}