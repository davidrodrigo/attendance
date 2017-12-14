<?php 

class Admin_trainers_model extends CI_model {
		
	public function edit_name(
						$id_formador,
						$for_name
					){
		
			$data = array(
				'id_formador' => $id_formador,
				'for_name' => $for_name
				);
			$this->db->where('id_formador',$id_formador)
					 ->update('formador',$data);
			
	}	
	
	public function edit_email(
						$id_formador,
						$for_email
					){
		
			$data = array(
				'id_formador' => $id_formador,
				'username' => $for_email
				);
			$this->db->where('id_formador',$id_formador)
					 ->update('formador',$data);
			
	}	

	public function edit_password(
						$id_formador,
						$for_password
					){
		
			$data = array(
				'id_formador' => $id_formador,
				'password' => $for_password
				);
			$this->db->where('id_formador',$id_formador)
					 ->update('formador',$data);
			
	}		
		
}