<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_part_list extends CI_Controller {
	
	
	public function index(){
		
		$this->load->view('admin/admin_part_list_view');
		
	}
}