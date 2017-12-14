<?php 

	class New_model extends CI_model {
		
		public function database(){
			
			// $this->load->database(); Se ha cargado mediante autoload
			
			$sql = $this->db->get('posts');
			
			$result = $sql->result();
			
			return $result;
		}
		
		public function create_post($ins_data){
			
			$this->db->insert('posts', $ins_data);
			
		}
		
		public function update($up_data, $id){
				
			$this->db->where('id',$id)->update('posts', $up_data);
			
		}
		
		public function delete($id){
				
			$this->db->where('id',$id)->delete('posts');
			
		}	
		
		//Crear tabla
		function create($table)
		{
		  $sql = "CREATE TABLE ".$table." (
		  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		  firstname VARCHAR(30) NOT NULL,
		  lastname VARCHAR(30) NOT NULL,
		  email VARCHAR(50),
		  reg_date TIMESTAMP
		  )";
		  $query = $this->db->query($sql);
		  return $query;
		}  
			
	}

 ?>