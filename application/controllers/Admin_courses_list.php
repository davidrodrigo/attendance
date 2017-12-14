<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_courses_list extends CI_Controller {
	
	
	public function index(){
		
		$this->load->view('admin/admin_courses_list_view');
		
	}
}