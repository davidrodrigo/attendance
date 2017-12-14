<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class One_course_con extends CI_Controller {
	
	public function index(){
		
		$this->load->view('admin/one_course_view');
		
	}
}