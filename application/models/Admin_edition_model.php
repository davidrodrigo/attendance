<?php 

	class Admin_edition_model extends CI_model {
		
	public function edit_event(
						$id_edicion,
						$ed_name
					){
		
			$data = array(
				'id_edicion' => $id_edicion,
				'ed_name' => $ed_name
				);
			//aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
			//y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
			//envíar un email, en fin, lo que deseemos hacer
			$this->db->where('id_edicion',$id_edicion)
					 ->update('edicion',$data);
			
		}	
	
		public function edit_curso(
						$id_edicion,
						$c_name
					){
			$this->db->select('id_curso')
					 ->where('c_name',$c_name);
			$query = $this->db->get('cursos');
			$id_curso = $query->row('id_curso');
			$data = array(
				'id_curso' => $id_curso
				);
			$this->db->where('id_edicion',$id_edicion)
					 ->update('edicion',$data);			
		}
	
		public function edit_days(
						$id_edicion,
						$ed_fecha1,
						$ed_fecha2,
						$ed_fecha3
					){
			$data = array(
					'ed_fecha1' =>	$ed_fecha1,
					'ed_fecha2' =>	$ed_fecha2,
					'ed_fecha3' =>	$ed_fecha3
				);
			$this->db->where('id_edicion',$id_edicion)
					 ->update('edicion',$data);			
		}
					
		public function edit_location(
						$id_edicion,
						$ed_localizacion
					){
			$data = array(
					'ed_localizacion' => $ed_localizacion
				);
			$this->db->where('id_edicion',$id_edicion)
					 ->update('edicion',$data);			
		}
					
		public function edit_trainer(
						$id_edicion,
						$for_name
					){
			$this->db->select('id_formador')
					 ->where('for_name',$for_name);
			$query = $this->db->get('formador');
			$id_formador = $query->row('id_formador');
			$data = array(
				'id_formador' => $id_formador
				);
			$this->db->where('id_edicion',$id_edicion)
					 ->update('edicion',$data);			
		}
		
	}