<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_cursos extends CI_Controller {
	
	
	public function index(){
		
		$this->load->view('admin/cursos_view');
		
	}
}