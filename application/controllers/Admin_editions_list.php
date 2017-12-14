<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_editions_list extends CI_Controller {
	
	
	public function index(){
		
		$this->load->view('admin/admin_editions_list_view');
		
	}
}