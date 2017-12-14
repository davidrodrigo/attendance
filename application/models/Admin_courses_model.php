<?php 

class Admin_courses_model extends CI_model {
		
	public function edit_course(
						$id_curso,
						$c_name
					){
		
			$data = array(
				'id_curso' => $id_curso,
				'c_name' => $c_name
				);
			$this->db->where('id_curso',$id_curso)
					 ->update('cursos',$data);
			
	}	
	
	public function edit_days(
						$id_curso,
						$c_days
					){
		
			$data = array(
				'id_curso' => $id_curso,
				'c_days' => $c_days
				);
			$this->db->where('id_curso',$id_curso)
					 ->update('cursos',$data);
			
	}		
		
}