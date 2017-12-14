<?php 

class Admin_participants_model extends CI_model {
		
	public function edit_nombre(
						$p_name,
						$id_part
					){
		
			$data = array(
				
				'p_name' => $p_name
				);
			$this->db->where('id_part', $id_part)
					 ->update('participante', $data);
			
	}	
	
	public function edit_email(
						$p_email,
						$id_part
					){
		
			$data = array(
				'p_email' => $p_email,
				'id_part' => $id_part
				);
			$this->db->where('id_part',$id_part)
					 ->update('participante',$data);
			
	}	
					
	public function edit_alt_email(
						$id_part,
						$alt_email,
						$nuevo_email	
					){
			$this->db->select('id_email')
					 ->where('email',$alt_email);
			$query = $this->db->get('emails');
			$id_email = $query->row('id_email');
						
			$data = array(
				'email' => $nuevo_email,				
				);
			
				$this->db->where('id_email',$id_email)
					 	 ->update('emails',$data);				
	}		
	
	public function enroll_part(
				$ed_name,
				$id_part,
				$id_edicion){
					
			
			$data = array(
				'id_part' =>'1',
				'id_edicion' => $id_edicion
				);	
			$this->db->insert('edi_part',$data);
			
	}		
}