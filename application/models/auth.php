<?php

/**
 * AZ
 */
class Auth extends CI_Model {
	
	public function register_user(){
		
		$key = md5($this->input->post('username'));
		
		$idata = array(
				'fullname' => $this->input->post('fullname'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				//'mstatus' => $this->input->post('mstatus'),
				'gender' => $this->input->post('gender'),
				'verification_key' => $key
			);
		$query = $this->db->insert('login', $idata);
		if($query){
			//send email
			$this->send_verification_email($key);
		}else{
			echo 'failed';
		}
	}
	
	public function send_verification_email($key){
		
	}
}
?>