<?php 

	class Create_model extends CI_model {
		
		//Crear tabla
		// function create($table)
		// {
		  // $sql = "CREATE TABLE ".$table." (
		  // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		  // course_name VARCHAR(100) NOT NULL,
		  // course_location VARCHAR(30) NOT NULL,
		  // course_room VARCHAR(50),
		  // course_date DATE,
		  // course_days TINYINT(1),
		  // part_name VARCHAR(50) NOT NULL,
		  // part_surname VARCHAR(50) NOT NULL,
		  // part_email VARCHAR(100) NOT NULL,
		  // part_department VARCHAR(50),
		  // trainer_name VARCHAR(50),
		  // trainer_surname VARCHAR(50),
		  // trainer_email VARCHAR(100)
// 		  
		  // )";
		  // $query = $this->db->query($sql);
		  // return $query;
		// }  		
		
		public function register_course(
						$course_ref,
						$course_name,
						$course_days
					){
		
			$data = array(
				'id_curso' => $course_ref,
				'c_name' => $course_name,
				'c_days' => $course_days
				);
			//aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
			//y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
			//envíar un email, en fin, lo que deseemos hacer
			$this->db->insert('cursos',$data);
			
		}	
		
		public function register_trainer(
						$trainer_pass,
						$trainer_name,
						$trainer_email
					){
		
			$data = array(
				'password' => $trainer_pass,
				'for_name' => $trainer_name,
				'username' => $trainer_email
				);
			//aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
			//y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
			//envíar un email, en fin, lo que deseemos hacer
			$this->db->insert('formador',$data);
			
		}	
		
		
		public function register_user(
						$part_name,
						$part_email,
						$part_department,
						$part_trainer,
						$part_curso
						){
		
			$data = array(
				'p_name' => $part_name,
				'p_curso' => $part_curso,
				'p_email' => $part_email,
				'p_department' => $part_department,
				'p_trainer' => $part_trainer
				);
			//aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
			//y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
			//envíar un email, en fin, lo que deseemos hacer
			$this->db->insert('participant',$data);
			
		}
						
		public function register_edition(
						$id_edicion,
						$ed_name,
						$id_curso,
						$ed_fecha1,
						$ed_fecha2,
						$ed_fecha3,
						$ed_localization,
						$id_formador
					){
		
			$data = array(
				'id_edicion' =>	$id_edicion,
				'ed_name' => $ed_name,
				'id_curso' => $id_curso,
				'ed_fecha1' =>	$ed_fecha1,
				'ed_fecha2' =>	$ed_fecha2,
				'ed_fecha3' =>	$ed_fecha3,
				'ed_localizacion' => $ed_localization,
				'id_formador' => $id_formador
				);
			//aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
			//y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
			//envíar un email, en fin, lo que deseemos hacer
			$this->db->insert('edicion',$data);
			
		}		
						
		public function register_participant(
						$participant_pass,
						$participant_name,
						$participant_email
					){
		
			$data = array(
				'p_pass' =>	$participant_pass,
				'p_name' => $participant_name,
				'id_curso' => $participant_email
				);
			//aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
			//y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
			//envíar un email, en fin, lo que deseemos hacer
			$this->db->insert('participante',$data);
			
		}		
		
	}