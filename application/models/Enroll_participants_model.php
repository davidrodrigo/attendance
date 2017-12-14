<?php 

	class Enroll_participants_model extends CI_model {
		
		public function matricular_participantes(
						$id_part,
						$id_edicion
						){
			$this->db->select('id_edi_part')
					 ->where('id_edicion', $id_edicion)
					 ->where('id_part', $id_part);
			$query = $this->db->get('edi_part');
			$id_edi_part = $query->row();
			
			if(!$id_edi_part){
				$data = array(
				'id_edicion' => $id_edicion,
				'id_part' => $id_part
				);
			$this->db->insert('edi_part', $data);
			}else{
				return;
			}		
		}
	}