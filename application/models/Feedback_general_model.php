<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Feedback_general_model extends CI_Model {
	

	function __construct() 
	{        
	    parent::__construct();    
	}     
	
	
	public function add_general(
					
					$id_edi_part,
					// $hecho,
					$question_18d,
					$question_19d
					){			
		
		$data = array(
				
				'id_edi_part' =>	$id_edi_part,
					// $hecho,
				'18d' =>	$question_18d,
				'19d' =>	$question_19d
					
				
			);
		
		$this->db->insert('general',$data);
	}	
   
}