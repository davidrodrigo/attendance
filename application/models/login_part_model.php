<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class login_part_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($username,$password)
	{

		$this->db->where('p_email',$username);
		$this->db->where('p_pass',$password);
		$query = $this->db->get('participante');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			//redirect(base_url().'index.php/Login_con','refresh');
		}
	}
}